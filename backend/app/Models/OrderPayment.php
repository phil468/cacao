<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $amount
 * @property int|null $cash_received_amount
 * @property int|null $change_amount
 * @property string|null $proof_path
 * @property bool $proof_missing
 * @property-read PaymentMethod $paymentMethod
 */
class OrderPayment extends Model
{
    protected $guarded = [];

    protected function casts(): array
    {
        return ['amount' => 'integer', 'cash_received_amount' => 'integer', 'change_amount' => 'integer', 'proof_missing' => 'boolean'];
    }

    /** @return BelongsTo<PaymentMethod, $this> */
    public function paymentMethod(): BelongsTo
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    /** @return BelongsTo<Order, $this> */
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
