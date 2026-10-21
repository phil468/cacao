<?php

namespace App\Services;

use App\Contracts\PaymentGateway;
use App\Jobs\SendOrderCustomerNotifications;
use App\Jobs\SendTelegramOrderNotification;
use App\Models\Coupon;
use App\Models\DeliveryRate;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\PaymentMethod;
use App\Models\PickupLocation;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class CheckoutService
{
    public function __construct(private PaymentGateway $payments, private CouponPricingService $couponPricing, private OrderLineService $orderLines) {}

    /**
     * @param  array<int, array{variant_id: int, quantity: int}>  $requestedItems
     * @param  array<string, mixed>  $address
     * @param  array<string, mixed>|null  $marketingAttribution
     */
    public function checkout(User $user, array $requestedItems, array $address, int $paymentMethodId, ?int $deliveryRateId, ?string $couponCode = null, ?string $proofPath = null, bool $whatsAppOptIn = false, ?array $marketingAttribution = null, string $fulfillmentType = 'delivery', ?int $pickupLocationId = null, ?string $billingDocumentType = null, ?string $billingDocumentNumber = null): Order
    {
        return DB::transaction(function () use ($user, $requestedItems, $address, $paymentMethodId, $deliveryRateId, $couponCode, $proofPath, $whatsAppOptIn, $marketingAttribution, $fulfillmentType, $pickupLocationId, $billingDocumentType, $billingDocumentNumber): Order {
            $lines = $this->orderLines->prepare($requestedItems);
            $subtotal = array_sum(array_column($lines, 3));

            $coupon = $couponCode ? Coupon::where('code', strtoupper($couponCode))->lockForUpdate()->first() : null;
            $discount = $this->couponPricing->discount($coupon, $subtotal, filled($couponCode), $user);
            $customerDocumentNumber = $address['document_number'] ?? null;
            unset($address['document_number']);
            $pickupLocation = null;
            if ($fulfillmentType === 'pickup') {
                $pickupLocation = PickupLocation::available()->lockForUpdate()->find($pickupLocationId);
                if (! $pickupLocation) {
                    throw ValidationException::withMessages(['pickup_location_id' => 'El punto de recojo seleccionado ya no está disponible.']);
                }
                $delivery = 0;
                $address = ['recipient_name' => $address['recipient_name'], 'phone' => $address['phone']];
            } else {
                $rate = DeliveryRate::where('is_active', true)->with('deliveryZone')->findOrFail($deliveryRateId);
                $district = Str::lower(Str::ascii(trim((string) $address['district'])));
                $rateMatchesAddress = $rate->deliveryZone->is_active && collect($rate->deliveryZone->districts)->contains(fn (string $candidate): bool => Str::lower(Str::ascii(trim($candidate))) === $district);
                if (! $rateMatchesAddress) {
                    throw ValidationException::withMessages(['delivery_rate_id' => 'La tarifa de entrega no corresponde al distrito indicado.']);
                }
                $delivery = $rate->free_from_amount !== null && $subtotal - $discount >= $rate->free_from_amount ? 0 : $rate->amount;
            }
            $method = PaymentMethod::where('is_active', true)->where('is_available_online', true)->find($paymentMethodId);
            if (! $method) {
                throw ValidationException::withMessages(['payment_method_id' => 'El método de pago no está disponible para compras en línea.']);
            }
            $status = OrderStatus::where('code', $proofPath ? 'payment_review' : 'pending_payment')->firstOrFail();

            $order = Order::create([
                'number' => (string) Str::uuid(), 'user_id' => $user->id, 'order_status_id' => $status->id,
                'payment_method_id' => $method->id, 'customer_name' => $user->name, 'customer_email' => $user->email,
                'customer_phone' => $user->phone ?? $address['phone'],
                'customer_document_number' => $customerDocumentNumber,
                'delivery_address' => $address,
                'billing_document_type' => $billingDocumentType,
                'billing_document_number' => $billingDocumentNumber,
                'fulfillment_type' => $fulfillmentType,
                'pickup_location_id' => $pickupLocation?->id,
                'pickup_location_snapshot' => $pickupLocation?->snapshot(),
                'subtotal_amount' => $subtotal, 'discount_amount' => $discount, 'delivery_amount' => $delivery,
                'total_amount' => $subtotal - $discount + $delivery, 'coupon_code' => $coupon?->code,
                'payment_proof_path' => $proofPath,
                'whatsapp_consent_at' => $whatsAppOptIn ? now() : null,
                'marketing_attribution' => $marketingAttribution,
            ]);

            $this->orderLines->commit($order, $lines, $user);

            if ($coupon) {
                $coupon->increment('usage_count');
            }

            $order->statusHistories()->create(['order_status_id' => $status->id, 'actor_id' => $user->id, 'note' => 'Pedido creado']);
            $this->payments->createPayment($order, $method, $proofPath);
            if (config('services.telegram.enabled') && ! app()->environment('testing') && filled(config('services.telegram.bot_token')) && filled(config('services.telegram.chat_id'))) {
                SendTelegramOrderNotification::dispatch($order->id)->afterCommit();
            }
            SendOrderCustomerNotifications::dispatch($order->id, 'order.created')->afterCommit();

            return $order->load('items', 'status', 'paymentMethod');
        }, 5);
    }
}
