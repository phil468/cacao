<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProductController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $q = Product::where('is_active', true)->with(['category', 'images', 'variants' => fn ($q) => $q->where('is_active', true)]);
        if (request('search')) {
            $q->where(fn ($x) => $x->where('name', 'like', '%'.request('search').'%')->orWhere('description', 'like', '%'.request('search').'%'));
        }if (request('category')) {
            $q->whereHas('category', fn ($x) => $x->where('slug', request('category')));
        }

        return ProductResource::collection($q->paginate(20));
    }

    public function show(string $slug): ProductResource
    {
        return new ProductResource(Product::where(['slug' => $slug, 'is_active' => true])->with(['category', 'images', 'variants' => fn ($q) => $q->where('is_active', true)])->firstOrFail());
    }
}
