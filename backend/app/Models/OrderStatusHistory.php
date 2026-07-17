<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * @property string|null $note
 * @property Carbon $created_at
 * @property-read OrderStatus $status
 */
class OrderStatusHistory extends Model
{
    protected $guarded = [];

    /** @return BelongsTo<OrderStatus, $this> */
    public function status(): BelongsTo
    {
        return $this->belongsTo(OrderStatus::class, 'order_status_id');
    }
}
