<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $code
 * @property string $name
 * @property bool $is_terminal
 * @property int $sort_order
 */
class OrderStatus extends Model
{
    protected $guarded = [];
}
