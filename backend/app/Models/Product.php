<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property int|null $category_id
 * @property string $name
 * @property string $slug
 * @property string|null $short_description
 * @property string|null $description
 * @property bool $is_active
 * @property bool $is_featured
 * @property-read Category|null $category
 * @property-read Collection<int, ProductVariant> $variants
 * @property-read Collection<int, ProductImage> $images
 */
class Product extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    protected function casts(): array
    {
        return ['is_active' => 'boolean', 'is_featured' => 'boolean'];
    }

    /** @return BelongsTo<Category, $this> */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /** @return HasMany<ProductVariant, $this> */
    public function variants(): HasMany
    {
        return $this->hasMany(ProductVariant::class);
    }

    /** @return HasMany<ProductImage, $this> */
    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }
}
