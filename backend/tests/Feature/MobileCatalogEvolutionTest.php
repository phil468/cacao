<?php

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\User;
use Laravel\Sanctum\Sanctum;

it('filters mobile catalog variants by cacao availability and flavor', function () {
    $category = Category::create(['name' => 'Chocolates', 'slug' => 'chocolates', 'is_active' => true]);
    $product = Product::create(['category_id' => $category->id, 'name' => 'Chocolate 70%', 'slug' => 'chocolate-70', 'is_active' => true]);
    ProductVariant::create(['product_id' => $product->id, 'name' => 'Café', 'sku' => 'CH70-CAFE', 'cacao_percentage' => 70, 'weight_grams' => 45, 'price_amount' => 1400, 'stock' => 3, 'is_active' => true]);
    ProductVariant::create(['product_id' => $product->id, 'name' => 'Maní', 'sku' => 'CH70-MANI', 'cacao_percentage' => 70, 'weight_grams' => 45, 'price_amount' => 1400, 'stock' => 0, 'is_active' => true]);

    $this->getJson('/api/v1/products?search=Caf&cacao=70&available=1')
        ->assertOk()
        ->assertJsonCount(1, 'data')
        ->assertJsonCount(1, 'data.0.variants')
        ->assertJsonPath('data.0.variants.0.sku', 'CH70-CAFE');

    $this->getJson('/api/v1/products?search=Chocolate%2070&available=1')
        ->assertOk()
        ->assertJsonCount(1, 'data')
        ->assertJsonCount(1, 'data.0.variants')
        ->assertJsonPath('data.0.variants.0.sku', 'CH70-CAFE');
});

it('synchronizes favorite variants for the authenticated customer', function () {
    $user = User::create([
        'name' => 'Cliente Favoritos',
        'email' => 'favoritos@example.test',
        'phone' => '999999999',
        'password' => 'ChangeMe123!',
        'is_active' => true,
    ]);
    $category = Category::create(['name' => 'Grageas', 'slug' => 'grageas', 'is_active' => true]);
    $product = Product::create(['category_id' => $category->id, 'name' => 'Grageas 60%', 'slug' => 'grageas-60', 'is_active' => true]);
    $variant = ProductVariant::create(['product_id' => $product->id, 'name' => 'Almendra', 'sku' => 'GR60-ALM', 'cacao_percentage' => 60, 'weight_grams' => 50, 'price_amount' => 1000, 'stock' => 7, 'is_active' => true]);
    Sanctum::actingAs($user);

    $this->putJson("/api/v1/favorites/{$variant->id}")->assertCreated();
    $this->putJson("/api/v1/favorites/{$variant->id}")->assertCreated();
    $this->getJson('/api/v1/favorites')->assertOk()->assertExactJson(['data' => [$variant->id]]);
    $this->deleteJson("/api/v1/favorites/{$variant->id}")->assertNoContent();
    $this->assertDatabaseMissing('favorites', ['user_id' => $user->id, 'product_variant_id' => $variant->id]);
});
