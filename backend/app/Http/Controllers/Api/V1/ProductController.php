<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProductController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $variantFilter = function (Builder $query): void {
            $query->where('is_active', true);
            if (request()->filled('cacao')) {
                $query->where('cacao_percentage', (int) request('cacao'));
            }
            if (request()->boolean('available')) {
                $query->where('stock', '>', 0);
            }
            if (request()->boolean('promotional')) {
                $query->whereNotNull('promotional_price_amount')
                    ->whereColumn('promotional_price_amount', '<', 'price_amount');
            }
            if (request()->filled('search')) {
                $search = '%'.request('search').'%';
                $query->where(fn (Builder $variant) => $variant
                    ->where('name', 'like', $search)
                    ->orWhere('sku', 'like', $search)
                    ->orWhereHas('product', fn (Builder $product) => $product
                        ->where('name', 'like', $search)
                        ->orWhere('description', 'like', $search)));
            }
        };

        $q = Product::where('is_active', true)
            ->with([
                'category',
                'images',
                'variants' => function (Relation $relation) use ($variantFilter): void {
                    $variantFilter($relation->getQuery());
                },
            ])
            ->whereHas('variants', $variantFilter);
        if (request('category')) {
            $q->whereHas('category', fn ($x) => $x->where('slug', request('category')));
        }
        if (request()->boolean('featured')) {
            $q->where('is_featured', true);
        }

        return ProductResource::collection($q->paginate(20));
    }

    public function show(string $slug): ProductResource
    {
        return new ProductResource(Product::where(['slug' => $slug, 'is_active' => true])->with(['category', 'images', 'variants' => fn ($q) => $q->where('is_active', true)])->firstOrFail());
    }
}
