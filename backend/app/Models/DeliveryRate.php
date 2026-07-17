<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $delivery_zone_id
 * @property int $amount
 * @property int|null $free_from_amount
 * @property bool $is_active
 * @property-read DeliveryZone $deliveryZone
 */
class DeliveryRate extends Model
{
    protected $guarded = [];

    /** @return BelongsTo<DeliveryZone, $this> */
    public function deliveryZone(): BelongsTo
    {
        return $this->belongsTo(DeliveryZone::class);
    }
}
