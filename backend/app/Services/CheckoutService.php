<?php

namespace App\Services;

use App\Contracts\PaymentGateway;
use App\Jobs\SendOrderCustomerNotifications;
use App\Jobs\SendTelegramOrderNotification;
use App\Models\Coupon;
use App\Models\DeliveryRate;
use App\Models\InventoryMovement;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\PaymentMethod;
use App\Models\ProductVariant;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\ConflictHttpException;

class CheckoutService
{
    public function __construct(private PaymentGateway $payments, private CouponPricingService $couponPricing) {}

    /**
     * @param  array<int, array{variant_id: int, quantity: int}>  $requestedItems
     * @param  array<string, mixed>  $address
     */
    public function checkout(User $user, array $requestedItems, array $address, int $paymentMethodId, int $deliveryRateId, ?string $couponCode = null, ?string $proofPath = null, bool $whatsAppOptIn = false): Order
    {
        return DB::transaction(function () use ($user, $requestedItems, $address, $paymentMethodId, $deliveryRateId, $couponCode, $proofPath, $whatsAppOptIn): Order {
            $variants = ProductVariant::with('product')
                ->whereIn('id', collect($requestedItems)->pluck('variant_id'))
                ->lockForUpdate()
                ->get()
                ->keyBy('id');
            $lines = [];
            $subtotal = 0;

            foreach ($requestedItems as $requested) {
                $quantity = $requested['quantity'];
                $variant = $variants->get($requested['variant_id']);

                if (! $variant || ! $variant->is_active || ! $variant->product->is_active || $quantity < 1 || $variant->stock < $quantity) {
                    throw new ConflictHttpException('Uno de los productos no tiene stock suficiente.');
                }

                $unitPrice = $variant->currentPriceAmount();
                $lineTotal = $unitPrice * $quantity;
                $subtotal += $lineTotal;
                $lines[] = [$variant, $quantity, $unitPrice, $lineTotal];
            }

            $coupon = $couponCode ? Coupon::where('code', strtoupper($couponCode))->lockForUpdate()->first() : null;
            $discount = $this->couponPricing->discount($coupon, $subtotal, filled($couponCode), $user);
            $rate = DeliveryRate::where('is_active', true)->with('deliveryZone')->findOrFail($deliveryRateId);
            $district = Str::lower(Str::ascii(trim((string) $address['district'])));
            $rateMatchesAddress = $rate->deliveryZone->is_active && collect($rate->deliveryZone->districts)->contains(fn (string $candidate): bool => Str::lower(Str::ascii(trim($candidate))) === $district);
            if (! $rateMatchesAddress) {
                throw ValidationException::withMessages(['delivery_rate_id' => 'La tarifa de entrega no corresponde al distrito indicado.']);
            }
            $delivery = $rate->free_from_amount !== null && $subtotal - $discount >= $rate->free_from_amount ? 0 : $rate->amount;
            $method = PaymentMethod::where('is_active', true)->findOrFail($paymentMethodId);
            $status = OrderStatus::where('code', $proofPath ? 'payment_review' : 'pending_payment')->firstOrFail();

            $order = Order::create([
                'number' => (string) Str::uuid(), 'user_id' => $user->id, 'order_status_id' => $status->id,
                'payment_method_id' => $method->id, 'customer_name' => $user->name, 'customer_email' => $user->email,
                'customer_phone' => $user->phone ?? $address['phone'], 'delivery_address' => $address,
                'subtotal_amount' => $subtotal, 'discount_amount' => $discount, 'delivery_amount' => $delivery,
                'total_amount' => $subtotal - $discount + $delivery, 'coupon_code' => $coupon?->code,
                'payment_proof_path' => $proofPath,
                'whatsapp_consent_at' => $whatsAppOptIn ? now() : null,
            ]);

            foreach ($lines as [$variant, $quantity, $unitPrice, $lineTotal]) {
                $order->items()->create([
                    'product_variant_id' => $variant->id, 'product_name' => $variant->product->name,
                    'variant_name' => $variant->name, 'sku' => $variant->sku,
                    'description' => $variant->product->short_description, 'unit_price_amount' => $unitPrice,
                    'quantity' => $quantity, 'line_total_amount' => $lineTotal,
                ]);
                $variant->decrement('stock', $quantity);
                $variant->refresh();
                InventoryMovement::create([
                    'product_variant_id' => $variant->id, 'order_id' => $order->id, 'actor_id' => $user->id,
                    'type' => 'sale', 'quantity_delta' => -$quantity, 'balance_after' => $variant->stock,
                    'reason' => 'Order '.$order->number,
                ]);
            }

            if ($coupon) {
                $coupon->increment('usage_count');
            }

            $order->statusHistories()->create(['order_status_id' => $status->id, 'actor_id' => $user->id, 'note' => 'Pedido creado']);
            $this->payments->createPayment($order, $method, $proofPath);
            if (filled(config('services.telegram.bot_token')) && filled(config('services.telegram.chat_id'))) {
                SendTelegramOrderNotification::dispatch($order->id)->afterCommit();
            }
            SendOrderCustomerNotifications::dispatch($order->id, 'order.created')->afterCommit();

            return $order->load('items', 'status');
        }, 5);
    }
}
