<?php

namespace App\Services;

use App\Models\InventoryLocation;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\PickupLocation;
use App\Models\ProductVariant;
use App\Models\PromoCode;
use App\Models\User;
use App\Services\Promotions\PromotionService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class PointOfSaleService
{
    public function __construct(private OrderLineService $lines) {}

    /** @return array<string, string> */
    public static function operationRules(): array
    {
        return ['is_historical' => 'sometimes|boolean', 'sold_on' => 'required_if:is_historical,true|prohibited_unless:is_historical,true|date_format:Y-m-d|before:'.now()->toDateString(),
            'historical_reason' => 'required_if:is_historical,true|prohibited_unless:is_historical,true|string|min:5|max:1000',
            'items.*.unit_price_amount' => 'required_if:is_historical,true|prohibited_unless:is_historical,true|integer|min:0|max:1000000000'];
    }

    /** @param array<array-key, mixed> $items */
    public function preview(array $items, int $discount): string
    {
        $subtotal = 0;
        foreach ($items as $item) {
            if (! is_array($item) || ! is_numeric($item['variant_id'] ?? null) || ! is_numeric($item['quantity'] ?? null)) {
                continue;
            }
            $variant = ProductVariant::find((int) $item['variant_id']);
            if ($variant) {
                $subtotal += $variant->currentPriceAmount() * max(0, min(1000, (int) $item['quantity']));
            }
        }

        return 'Subtotal S/ '.number_format($subtotal / 100, 2).' · Descuento S/ '.number_format(max(0, $discount) / 100, 2)
            .' · Total S/ '.number_format(max(0, $subtotal - $discount) / 100, 2).' (se revalidará al guardar)';
    }

    /** @param array<string, mixed> $data */
    public function sell(array $data, User $cashier): Order
    {
        abort_unless(app(PosAccess::class)->allowed($cashier), 403);
        $data = validator($data, [
            ...PosSettlementService::rules(),
            ...self::operationRules(),
            'pos_submission_id' => ['required', 'uuid'], 'pickup_location_id' => ['required', 'integer'],
            'inventory_location_id' => ['sometimes', 'integer'],
            'customer_name' => ['required', 'string', 'max:120'], 'customer_email' => ['nullable', 'email', 'max:255'],
            'customer_phone' => ['nullable', 'string', 'max:30'], 'sale_reference' => ['nullable', 'string', 'max:80'],
            'payment_confirmed' => ['accepted'],
            'promo_codes' => ['sometimes', 'array', 'max:100'], 'promo_codes.*' => ['string', 'regex:/^[ABCDEFGHJKMNPQRSTUVWXYZ23456789]{6}$/', 'distinct'],
            'items' => ['required', 'array', 'min:1', 'max:100'], 'items.*.variant_id' => ['required', 'integer', 'distinct'],
            'items.*.quantity' => ['required', 'integer', 'min:1', 'max:1000'],
        ], ['payment_confirmed.accepted' => 'Confirma que el pago fue recibido antes de registrar la venta.'])->validate();

        return DB::transaction(function () use ($data, $cashier): Order {
            // A cashier lock serializes duplicate submissions before the unique idempotency key is inserted.
            User::whereKey($cashier->id)->lockForUpdate()->firstOrFail();
            $existing = Order::where('pos_submission_id', $data['pos_submission_id'])->first();
            if ($existing) {
                abort_unless($existing->cashier_id === $cashier->id, 403);

                return $existing;
            }
            $location = PickupLocation::available()->lockForUpdate()->find($data['pickup_location_id']);
            $stockLocationId = $data['inventory_location_id'] ?? InventoryLocation::where('pickup_location_id', $data['pickup_location_id'])->value('id');
            $stockLocation = app(PosAccess::class)->location($cashier, (int) $stockLocationId);
            $stockLocation = InventoryLocation::whereKey($stockLocation->id)->where('is_active', true)->lockForUpdate()->firstOrFail();
            if ($stockLocation->pickup_location_id !== (int) $data['pickup_location_id']) {
                abort(403);
            }
            if (! $location) {
                throw ValidationException::withMessages(['payment_method_id' => 'El punto de venta o método de pago ya no está disponible.']);
            }
            $historical = (bool) ($data['is_historical'] ?? false);
            abort_if(! $cashier->can('orders.manage') && ((int) ($data['discount_amount'] ?? 0) > 0 || (int) ($data['discount_percentage'] ?? 0) > 0), 403);
            if ($historical) {
                abort_unless($cashier->hasRole('administrator') && $cashier->can('orders.manage'), 403);
                if (! empty($data['promo_codes'])) {
                    throw ValidationException::withMessages(['promo_codes' => 'Una regularización histórica no habilita nuevos cupones.']);
                }
            }
            $shiftId = $historical ? null : app(CashShiftService::class)->forSale($stockLocation, $cashier);
            $proofDisk = 'local';
            $lines = $historical ? $this->lines->prepareHistorical($data['items']) : $this->lines->prepare($data['items'], $stockLocation);
            $subtotal = array_sum(array_column($lines, 3));
            $settlement = app(PosSettlementService::class)->prepare($data, $subtotal, $cashier);
            $firstPayment = $settlement['payments'][0];
            $proofMissing = in_array(true, array_column($settlement['payments'], 'proof_missing'), true);
            $status = OrderStatus::where('code', 'delivered')->firstOrFail();
            $order = Order::create([
                'number' => (string) Str::uuid(), 'user_id' => null, 'sales_channel' => 'pos',
                'cashier_id' => $cashier->id, 'sale_reference' => $data['sale_reference'] ?? null,
                'inventory_location_id' => $stockLocation->id, 'payment_proof_disk' => $proofDisk,
                'payment_proof_missing' => $proofMissing,
                'pos_submission_id' => $data['pos_submission_id'], 'payment_confirmed_at' => $historical ? null : now(),
                'is_historical' => $historical, 'sold_on' => $historical ? $data['sold_on'] : now()->toDateString(),
                'historical_reason' => $historical ? trim($data['historical_reason']) : null, 'cash_shift_id' => $shiftId,
                'customer_name' => $data['customer_name'], 'customer_email' => $data['customer_email'] ?? '', 'customer_phone' => $data['customer_phone'] ?? '',
                'order_status_id' => $status->id, 'payment_method_id' => $firstPayment['payment_method_id'], 'payment_proof_path' => $firstPayment['proof_path'],
                'fulfillment_type' => 'pickup', 'pickup_location_id' => $location->id, 'pickup_location_snapshot' => $location->snapshot(),
                'delivery_address' => [], 'subtotal_amount' => $subtotal, 'discount_amount' => $settlement['discount'],
                'pos_discount_type' => $settlement['type'], 'pos_discount_basis_points' => $settlement['basis_points'],
                'delivery_amount' => 0, 'total_amount' => $subtotal - $settlement['discount'],
            ]);
            $order->posPayments()->createMany($settlement['payments']);
            $this->lines->commit($order, $lines, $cashier, ! $historical);
            $order->statusHistories()->create(['order_status_id' => $status->id, 'actor_id' => $cashier->id,
                'note' => ($historical ? 'Regularización histórica sin movimiento de stock ni caja actual. Fecha: '.$data['sold_on'].'. Motivo: '.$data['historical_reason'] : 'Venta presencial: pago recibido y productos entregados.').($proofMissing ? ' Sin imagen de respaldo: el vendedor declaró que no se tomó imagen.' : '')]);
            foreach ($data['promo_codes'] ?? [] as $value) {
                $code = PromoCode::where('code', $value)->firstOrFail();
                app(PromotionService::class)->recordDelivery($code, $order, $cashier);
            }

            return $order->load('items', 'status', 'paymentMethod');
        }, 5);
    }
}
