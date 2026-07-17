<?php

namespace App\Services;

use App\Models\Coupon;
use App\Models\Order;
use App\Models\User;
use Illuminate\Validation\ValidationException;

class CouponPricingService
{
    public function discount(?Coupon $coupon, int $subtotal, bool $couponWasRequested = false, ?User $user = null): int
    {
        if (! $coupon) {
            if ($couponWasRequested) {
                $this->invalid('El cupón ingresado no existe.');
            }

            return 0;
        }

        if (! $coupon->is_active) {
            $this->invalid('Este cupón no está activo.');
        }
        if ($coupon->starts_at?->isFuture()) {
            $this->invalid('Este cupón todavía no está vigente.');
        }
        if ($coupon->ends_at?->isPast()) {
            $this->invalid('Este cupón ha vencido.');
        }
        if ($coupon->usage_limit !== null && $coupon->usage_count >= $coupon->usage_limit) {
            $this->invalid('Este cupón alcanzó su límite de usos.');
        }
        if ($coupon->once_per_customer && $user && $this->wasUsedBy($coupon, $user)) {
            $this->invalid('Ya utilizaste este cupón. Solo se permite un uso por cliente.');
        }
        if ($coupon->minimum_amount !== null && $subtotal < $coupon->minimum_amount) {
            $minimum = number_format($coupon->minimum_amount / 100, 2);
            $this->invalid("Este cupón requiere una compra mínima de S/ {$minimum}.");
        }

        $amount = $coupon->type === 'percentage' ? intdiv($subtotal * $coupon->value, 100) : $coupon->value;
        if ($coupon->maximum_discount_amount !== null) {
            $amount = min($amount, $coupon->maximum_discount_amount);
        }

        return min($amount, $subtotal);
    }

    private function wasUsedBy(Coupon $coupon, User $user): bool
    {
        return Order::query()
            ->where('user_id', $user->id)
            ->where('coupon_code', $coupon->code)
            ->whereHas('status', fn ($query) => $query->where('code', '!=', 'cancelled'))
            ->exists();
    }

    private function invalid(string $message): never
    {
        throw ValidationException::withMessages(['coupon_code' => $message]);
    }
}
