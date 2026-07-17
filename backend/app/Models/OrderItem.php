<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $order_id
 * @property int|null $product_variant_id
 * @property string $product_name
 * @property string $variant_name
 * @property string $sku
 * @property int $quantity
 * @property int $returned_quantity
 */
class OrderItem extends Model
{
    protected $guarded = [];
}
