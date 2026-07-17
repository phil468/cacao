<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $number
 * @property int|null $user_id
 * @property int $order_status_id
 * @property int $payment_method_id
 * @property string $customer_name
 * @property string $customer_email
 * @property string $customer_phone
 * @property int $subtotal_amount
 * @property int $discount_amount
 * @property int $delivery_amount
 * @property int $total_amount
 * @property string|null $coupon_code
 * @property array<string, mixed> $delivery_address
 * @property Carbon $created_at
 * @property-read OrderStatus $status
 * @property-read PaymentMethod $paymentMethod
 */
class Order extends Model
{
    protected $guarded = [];

    protected function casts(): array
    {
        return ['delivery_address' => 'array', 'whatsapp_consent_at' => 'datetime'];
    }

    /** @return HasMany<OrderItem, $this> */
    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    /** @return BelongsTo<OrderStatus, $this> */
    public function status(): BelongsTo
    {
        return $this->belongsTo(OrderStatus::class, 'order_status_id');
    }

    /** @return BelongsTo<PaymentMethod, $this> */
    public function paymentMethod(): BelongsTo
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    /** @return BelongsTo<User, $this> */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /** @return HasMany<OrderStatusHistory, $this> */
    public function statusHistories(): HasMany
    {
        return $this->hasMany(OrderStatusHistory::class);
    }

    /** @return HasMany<OrderReturn, $this> */
    public function returns(): HasMany
    {
        return $this->hasMany(OrderReturn::class);
    }
}
