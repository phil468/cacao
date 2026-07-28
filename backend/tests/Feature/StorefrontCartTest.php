<?php

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductVariant;

it('adds an available variant to the session cart using the server price', function () {
    $category = Category::create(['name' => 'Chocolates', 'slug' => 'chocolates', 'is_active' => true]);
    $product = Product::create(['category_id' => $category->id, 'name' => 'Chocolate 70%', 'slug' => 'chocolate-70', 'is_active' => true]);
    $variant = ProductVariant::create(['product_id' => $product->id, 'name' => 'Pecana', 'sku' => 'TEST-CH70-PEC', 'cacao_percentage' => 70, 'weight_grams' => 45, 'cost_amount' => 500, 'price_amount' => 1400, 'stock' => 3, 'is_active' => true]);
    ProductImage::create([
        'product_id' => $product->id,
        'product_variant_id' => $variant->id,
        'path' => 'products/pecana.webp',
        'alt_text' => 'Chocolate con pecana',
        'sort_order' => 1,
    ]);

    $this->post('/carrito', ['variant_id' => $variant->id, 'quantity' => 2])
        ->assertRedirect('/producto/chocolate-70#variant-'.$variant->id)
        ->assertSessionHas('storefront_cart.'.$variant->id, 2);

    $this->get('/carrito')
        ->assertOk()
        ->assertSee('S/ 28.00')
        ->assertSee('Pecana')
        ->assertSee('storage/products/pecana.webp', false)
        ->assertSee('Chocolate con pecana');
});

it('never places more units in the cart than current stock', function () {
    $category = Category::create(['name' => 'Grageas', 'slug' => 'grageas', 'is_active' => true]);
    $product = Product::create(['category_id' => $category->id, 'name' => 'Grageas 60% 50 g', 'slug' => 'grageas-60', 'is_active' => true]);
    $variant = ProductVariant::create(['product_id' => $product->id, 'name' => 'Café', 'sku' => 'TEST-GR60-CAF', 'cacao_percentage' => 60, 'weight_grams' => 50, 'cost_amount' => 450, 'price_amount' => 1000, 'stock' => 1, 'is_active' => true]);

    $this->post('/carrito', ['variant_id' => $variant->id, 'quantity' => 10])
        ->assertSessionHas('storefront_cart.'.$variant->id, 1);
});
