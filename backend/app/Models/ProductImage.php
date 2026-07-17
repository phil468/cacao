<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Validation\ValidationException;

/**
 * @property int $id
 * @property int $product_id
 * @property int|null $product_variant_id
 * @property string $path
 * @property string|null $alt_text
 * @property bool $is_primary
 * @property int $sort_order
 */
class ProductImage extends Model
{
    protected $guarded = [];

    protected static function booted(): void
    {
        static::saving(function (ProductImage $image): void {
            if ($image->product_variant_id === null) {
                return;
            }

            $belongsToProduct = ProductVariant::query()
                ->whereKey($image->product_variant_id)
                ->where('product_id', $image->product_id)
                ->exists();

            if (! $belongsToProduct) {
                throw ValidationException::withMessages([
                    'product_variant_id' => 'La variante seleccionada no pertenece al producto indicado.',
                ]);
            }
        });

        static::saved(function (ProductImage $image): void {
            if ($image->is_primary) {
                static::query()->where('product_id', $image->product_id)->whereKeyNot($image->id)->update(['is_primary' => false]);
            }
        });
    }

    protected function casts(): array
    {
        return ['is_primary' => 'boolean'];
    }

    /** @return BelongsTo<Product, $this> */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /** @return BelongsTo<ProductVariant, $this> */
    public function variant(): BelongsTo
    {
        return $this->belongsTo(ProductVariant::class, 'product_variant_id');
    }
}
