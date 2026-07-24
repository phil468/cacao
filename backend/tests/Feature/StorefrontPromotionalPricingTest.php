<?php

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductVariant;

it('highlights a valid promotional price in catalog and product pages', function () {
    $category = Category::create([
        'name' => 'Grageas',
        'slug' => 'grageas',
        'is_active' => true,
    ]);
    $product = Product::create([
        'category_id' => $category->id,
        'name' => 'Grageas 60%',
        'slug' => 'grageas-60-promotion',
        'is_active' => true,
    ]);
    ProductVariant::create([
        'product_id' => $product->id,
        'name' => 'Almendra',
        'sku' => 'PROMO-GR60-ALM',
        'weight_grams' => 50,
        'price_amount' => 1000,
        'promotional_price_amount' => 800,
        'stock' => 10,
        'is_active' => true,
    ]);

    foreach (['/catalogo', '/producto/grageas-60-promotion'] as $path) {
        $this->get($path)
            ->assertOk()
            ->assertSee('Oferta')
            ->assertSee('S/ 10.00')
            ->assertSee('S/ 8.00')
            ->assertSee('has-promotion');
    }
});

it('does not present an invalid promotional price as an offer', function () {
    $category = Category::create([
        'name' => 'Chocolates',
        'slug' => 'chocolates',
        'is_active' => true,
    ]);
    $product = Product::create([
        'category_id' => $category->id,
        'name' => 'Chocolate 70%',
        'slug' => 'chocolate-70-without-promotion',
        'is_active' => true,
    ]);
    ProductVariant::create([
        'product_id' => $product->id,
        'name' => 'Bitter',
        'sku' => 'NO-PROMO-CH70',
        'weight_grams' => 45,
        'price_amount' => 1400,
        'promotional_price_amount' => 1500,
        'stock' => 3,
        'is_active' => true,
    ]);

    foreach (['/catalogo', '/producto/chocolate-70-without-promotion'] as $path) {
        $this->get($path)
            ->assertOk()
            ->assertDontSee('Oferta')
            ->assertSee('S/ 14.00')
            ->assertDontSee('S/ 15.00');
    }
});
