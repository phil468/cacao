<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/** @property int $id
 * @property int $promotion_id
 * @property int|null $batch_id
 * @property int|null $participant_id
 * @property int|null $order_id
 * @property string $code
 * @property string $status
 * @property string $activation_mode
 * @property Carbon|null $activated_at
 * @property Carbon $generated_at
 * @property Carbon|null $registered_at
 * @property Carbon|null $delivered_at
 * @property-read PromoCodeBatch|null $batch
 */
class PromoCode extends Model
{
    protected $guarded = [];

    protected function casts(): array
    {
        return ['activated_at' => 'datetime', 'generated_at' => 'datetime', 'registered_at' => 'datetime', 'delivered_at' => 'datetime'];
    }

    public function setCodeAttribute(string $value): void
    {
        $this->attributes['code'] = strtoupper(trim($value));
    }

    /** @return BelongsTo<Promotion, $this> */
    public function promotion(): BelongsTo
    {
        return $this->belongsTo(Promotion::class);
    }

    /** @return BelongsTo<PromoCodeBatch, $this> */
    public function batch(): BelongsTo
    {
        return $this->belongsTo(PromoCodeBatch::class, 'batch_id');
    }

    /** @return BelongsTo<PromoParticipant, $this> */
    public function participant(): BelongsTo
    {
        return $this->belongsTo(PromoParticipant::class, 'participant_id');
    }

    /** @return BelongsTo<Order, $this> */
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
