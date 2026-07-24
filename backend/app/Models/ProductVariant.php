<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property int $product_id
 * @property string $name
 * @property string $sku
 * @property int|null $cacao_percentage
 * @property int $weight_grams
 * @property int $price_amount
 * @property int|null $cost_amount
 * @property int|null $promotional_price_amount
 * @property int $stock
 * @property int $low_stock_threshold
 * @property bool $is_active
 * @property-read Product $product
 */
class ProductVariant extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    protected function casts(): array
    {
        return ['is_active' => 'boolean'];
    }

    /** @return BelongsTo<Product, $this> */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /** @return HasMany<ProductImage, $this> */
    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }

    public function currentPriceAmount(): int
    {
        return $this->hasActivePromotion() ? (int) $this->promotional_price_amount : (int) $this->price_amount;
    }

    public function hasActivePromotion(): bool
    {
        return $this->promotional_price_amount !== null
            && $this->promotional_price_amount > 0
            && $this->promotional_price_amount < $this->price_amount;
    }
}
