<?php

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductVariant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Validation\ValidationException;

uses(RefreshDatabase::class);

it('rejects an image variant that belongs to another product', function (): void {
    $category = Category::create(['name' => 'Chocolate', 'slug' => 'chocolate']);
    $firstProduct = Product::create(['category_id' => $category->id, 'name' => 'Chocolate 60%', 'slug' => 'chocolate-60']);
    $secondProduct = Product::create(['category_id' => $category->id, 'name' => 'Chocolate 70%', 'slug' => 'chocolate-70']);
    $otherVariant = ProductVariant::create([
        'product_id' => $secondProduct->id,
        'name' => 'Café',
        'sku' => 'CH70-CAFE',
        'weight_grams' => 45,
        'price_amount' => 1400,
        'stock' => 1,
    ]);

    expect(fn () => ProductImage::create([
        'product_id' => $firstProduct->id,
        'product_variant_id' => $otherVariant->id,
        'path' => 'products/example.jpg',
    ]))->toThrow(ValidationException::class, 'La variante seleccionada no pertenece al producto indicado.');
});
