<?php

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductVariant;

it('renders the first variant image by default and exposes the remaining images as a hover carousel', function () {
    $category = Category::create([
        'name' => 'Chocolates',
        'slug' => 'chocolates',
        'is_active' => true,
    ]);
    $product = Product::create([
        'category_id' => $category->id,
        'name' => 'Chocolate 70%',
        'slug' => 'chocolate-70',
        'is_active' => true,
    ]);
    $variant = ProductVariant::create([
        'product_id' => $product->id,
        'name' => 'Café',
        'sku' => 'CH70-CAFE',
        'weight_grams' => 45,
        'price_amount' => 1400,
        'stock' => 3,
        'is_active' => true,
    ]);
    ProductImage::create([
        'product_id' => $product->id,
        'product_variant_id' => $variant->id,
        'path' => 'products/cafe-secondary.webp',
        'sort_order' => 20,
    ]);
    ProductImage::create([
        'product_id' => $product->id,
        'product_variant_id' => $variant->id,
        'path' => 'products/cafe-cover.webp',
        'sort_order' => 10,
    ]);

    $this->get('/catalogo')
        ->assertOk()
        ->assertSee('data-variant-card-carousel', false)
        ->assertSeeInOrder([
            'variant-card-slide is-active',
            'products/cafe-cover.webp',
            'products/cafe-secondary.webp',
            '2 imágenes',
        ], false);
});
