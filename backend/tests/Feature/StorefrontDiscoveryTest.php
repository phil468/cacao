<?php

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductVariant;

it('shows featured photos without hover and offers clear discovery links', function () {
    $category = Category::create(['name' => 'Chocolates', 'slug' => 'chocolates', 'is_active' => true]);
    $product = Product::create(['category_id' => $category->id, 'name' => 'Chocolate de origen', 'slug' => 'discovery-chocolate', 'is_active' => true, 'is_featured' => true]);
    ProductVariant::create(['product_id' => $product->id, 'name' => 'Bitter', 'sku' => 'DISCOVERY-70', 'weight_grams' => 50, 'price_amount' => 1400, 'stock' => 5, 'is_active' => true]);
    ProductImage::create(['product_id' => $product->id, 'path' => 'products/discovery.webp', 'is_primary' => true, 'sort_order' => 1]);

    $this->get('/')->assertOk()
        ->assertSee('store-featured-image', false)
        ->assertSee('products/discovery.webp', false)
        ->assertDontSee('hover-product-image', false)
        ->assertSee('Ver presentaciones')
        ->assertSee('store-search-input', false)
        ->assertSee('store-cart', false)
        ->assertSee('Saltar al contenido');
});

it('keeps catalog filters expanded when a search is applied', function () {
    $this->get('/catalogo?q=cacao&availability=in_stock')->assertOk()
        ->assertSee('class="store-filter-panel"  open', false)
        ->assertSee('value="cacao"', false)
        ->assertSee('presentaciones encontradas')
        ->assertSee('Limpiar');
});

it('safely renders unexpected search query shapes on the home page', function () {
    $this->get('/catalogo')->assertOk()->assertSee('store-search-input', false);
    // Home query strings are not catalog filters and must remain safe to render.
    $this->get('/?q[]=unexpected')->assertOk();
});
