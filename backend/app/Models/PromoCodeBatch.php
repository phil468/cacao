<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/** @property int $id
 * @property int $promotion_id
 * @property string $name
 * @property string $status
 * @property-read Promotion $promotion
 */
class PromoCodeBatch extends Model
{
    protected $guarded = [];

    /** @return BelongsTo<Promotion, $this> */
    public function promotion(): BelongsTo
    {
        return $this->belongsTo(Promotion::class);
    }

    /** @return HasMany<PromoCode, $this> */
    public function codes(): HasMany
    {
        return $this->hasMany(PromoCode::class, 'batch_id');
    }
}
