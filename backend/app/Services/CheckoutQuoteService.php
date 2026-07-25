<?php

namespace App\Services;

use App\Models\Coupon;
use App\Models\DeliveryRate;
use App\Models\PickupLocation;
use App\Models\ProductVariant;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class CheckoutQuoteService
{
    public function __construct(private CouponPricingService $couponPricing) {}

    /**
     * @param  array<int, array{variant_id: int, quantity: int}>  $items
     * @return array{subtotal_amount: int, discount_amount: int, delivery_amount: int, total_amount: int, coupon_code: ?string, delivery_rate_id: ?int, pickup_location_id: ?int}
     */
    public function quote(array $items, ?string $district, ?string $couponCode = null, ?User $user = null, string $fulfillmentType = 'delivery', ?int $pickupLocationId = null): array
    {
        $variants = ProductVariant::with('product')->whereIn('id', collect($items)->pluck('variant_id'))->get()->keyBy('id');
        $subtotal = 0;
        foreach ($items as $item) {
            $variant = $variants->get($item['variant_id']);
            if (! $variant || ! $variant->is_active || ! $variant->product->is_active || $item['quantity'] < 1 || $variant->stock < $item['quantity']) {
                throw ValidationException::withMessages(['items' => 'Uno de los productos no tiene stock suficiente.']);
            }
            $subtotal += $variant->currentPriceAmount() * $item['quantity'];
        }
        if ($subtotal === 0) {
            throw ValidationException::withMessages(['items' => 'El carrito está vacío.']);
        }

        $normalizedCode = filled($couponCode) ? strtoupper(trim((string) $couponCode)) : null;
        $coupon = $normalizedCode ? Coupon::where('code', $normalizedCode)->first() : null;
        $discount = $this->couponPricing->discount($coupon, $subtotal, $normalizedCode !== null, $user);
        $rate = null;
        $pickupLocation = null;
        if ($fulfillmentType === 'pickup') {
            $pickupLocation = PickupLocation::available()->find($pickupLocationId);
            if (! $pickupLocation) {
                throw ValidationException::withMessages(['pickup_location_id' => 'El punto de recojo seleccionado ya no está disponible.']);
            }
            $delivery = 0;
        } else {
            $rate = $this->resolveRate((string) $district);
            $delivery = $rate->free_from_amount !== null && $subtotal - $discount >= $rate->free_from_amount ? 0 : $rate->amount;
        }

        return [
            'subtotal_amount' => $subtotal,
            'discount_amount' => $discount,
            'delivery_amount' => $delivery,
            'total_amount' => $subtotal - $discount + $delivery,
            'coupon_code' => $coupon?->code,
            'delivery_rate_id' => $rate?->id,
            'pickup_location_id' => $pickupLocation?->id,
        ];
    }

    private function resolveRate(string $district): DeliveryRate
    {
        $normalized = Str::lower(Str::ascii(trim($district)));
        $rate = DeliveryRate::where('is_active', true)->with('deliveryZone')->get()->first(fn (DeliveryRate $rate): bool => $rate->deliveryZone->is_active && collect($rate->deliveryZone->districts)->contains(fn (string $candidate): bool => Str::lower(Str::ascii(trim($candidate))) === $normalized));
        if (! $rate) {
            throw ValidationException::withMessages(['district' => 'No tenemos una tarifa de entrega activa para este distrito.']);
        }

        return $rate;
    }
}
