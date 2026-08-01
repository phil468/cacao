<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CatalogController extends Controller
{
    public function index(Request $request, ?Category $category = null): View
    {
        $filters = $request->validate([
            'q' => ['nullable', 'string', 'max:100'],
            'category' => ['nullable', 'string', 'max:255'],
            'cacao' => ['nullable', 'integer', 'in:60,70,80,100'],
            'min_price' => ['nullable', 'numeric', 'min:0', 'max:10000'],
            'max_price' => ['nullable', 'numeric', 'min:0', 'max:10000'],
            'availability' => ['nullable', 'in:in_stock'],
        ]);

        $categorySlug = $category instanceof Category ? $category->slug : ($filters['category'] ?? null);
        $variants = ProductVariant::query()->where('is_active', true)
            ->whereHas('product', fn ($query) => $query->where('is_active', true))
            ->with(['product.category', 'product.images', 'images'])
            ->when($filters['q'] ?? null, fn ($query, string $value) => $query->where(function ($nested) use ($value): void {
                $nested->where('name', 'like', "%{$value}%")->orWhere('sku', 'like', "%{$value}%")
                    ->orWhereHas('product', fn ($productQuery) => $productQuery->where('name', 'like', "%{$value}%")->orWhere('short_description', 'like', "%{$value}%"));
            }))
            ->when($categorySlug, fn ($query, string $slug) => $query->whereHas('product.category', fn ($categoryQuery) => $categoryQuery->where('slug', $slug)->where('is_active', true)))
            ->when($filters['cacao'] ?? null, fn ($query, int $value) => $query->where('cacao_percentage', $value))
            ->when($filters['min_price'] ?? null, fn ($query, $value) => $query->whereRaw('(CASE WHEN promotional_price_amount IS NOT NULL AND promotional_price_amount < price_amount THEN promotional_price_amount ELSE price_amount END) >= ?', [(int) round(((float) $value) * 100)]))
            ->when($filters['max_price'] ?? null, fn ($query, $value) => $query->whereRaw('(CASE WHEN promotional_price_amount IS NOT NULL AND promotional_price_amount < price_amount THEN promotional_price_amount ELSE price_amount END) <= ?', [(int) round(((float) $value) * 100)]))
            ->when(($filters['availability'] ?? null) === 'in_stock', fn ($query) => $query->where('stock', '>', 0))
            ->orderBy('product_id')->orderBy('name')
            ->paginate(15)->withQueryString();

        return view('catalog', [
            'variants' => $variants,
            'categories' => Category::query()->where('is_active', true)->orderBy('sort_order')->orderBy('name')->get(),
            'selectedCategory' => $categorySlug,
            'seoTitle' => $category
                ? $category->name.' en Ica | Cacao del Perú'
                : 'Catálogo de chocolates peruanos | Cacao del Perú',
            'seoDescription' => $category
                ? 'Compra '.$category->name.' en Ica. Revisa sabores, presentaciones, precios y stock disponible para delivery o recojo.'
                : 'Explora chocolates peruanos, grageas, cacao y café disponibles en Ica. Compara sabores, porcentajes, precios y stock.',
            'seoCanonical' => $category ? route('category', $category) : route('catalog'),
            'seoRobots' => $request->query() === [] ? 'index,follow,max-image-preview:large' : 'noindex,follow,max-image-preview:large',
        ]);
    }
}
