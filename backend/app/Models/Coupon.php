<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * @property string $code
 * @property string $type
 * @property int $value
 * @property int|null $minimum_amount
 * @property int|null $maximum_discount_amount
 * @property int|null $usage_limit
 * @property int $usage_count
 * @property bool $is_active
 * @property bool $once_per_customer
 * @property Carbon|null $starts_at
 * @property Carbon|null $ends_at
 */
class Coupon extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    protected function casts(): array
    {
        return ['starts_at' => 'datetime', 'ends_at' => 'datetime', 'is_active' => 'boolean', 'once_per_customer' => 'boolean'];
    }
}
