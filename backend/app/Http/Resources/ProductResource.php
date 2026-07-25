<?php

namespace App\Http\Resources;

use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Product */
class ProductResource extends JsonResource
{
    /** @return array<string, mixed> */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'short_description' => $this->short_description,
            'description' => $this->description,
            'is_featured' => $this->is_featured,
            'category' => $this->category?->only(['id', 'name', 'slug']),
            'images' => $this->images->map->only(['id', 'product_variant_id', 'path', 'alt_text', 'is_primary']),
            'variants' => $this->variants->map(fn (ProductVariant $variant): array => [
                'id' => $variant->id,
                'name' => $variant->name,
                'sku' => $variant->sku,
                'cacao_percentage' => $variant->cacao_percentage,
                'weight_grams' => $variant->weight_grams,
                'price_amount' => $variant->price_amount,
                'promotional_price_amount' => $variant->promotional_price_amount,
                'stock' => $variant->stock,
                'image' => $this->images
                    ->where('product_variant_id', $variant->id)
                    ->sortBy([['is_primary', 'desc'], ['sort_order', 'asc']])
                    ->first()?->only(['id', 'path', 'alt_text', 'is_primary']),
            ]),
        ];
    }
}
