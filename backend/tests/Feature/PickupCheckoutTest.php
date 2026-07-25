<?php

use App\Models\Category;
use App\Models\OrderStatus;
use App\Models\PaymentMethod;
use App\Models\PickupLocation;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\User;
use Laravel\Sanctum\Sanctum;

it('creates a pickup order with no delivery charge and a location snapshot', function () {
    $user = User::create(['name' => 'Cliente', 'email' => 'pickup@example.com', 'password' => 'secretsecret', 'phone' => '999999999']);
    Sanctum::actingAs($user);
    $category = Category::create(['name' => 'Chocolates', 'slug' => 'chocolates']);
    $product = Product::create(['category_id' => $category->id, 'name' => 'Chocolate 70%', 'slug' => 'chocolate-70']);
    $variant = ProductVariant::create([
        'product_id' => $product->id,
        'name' => 'Café',
        'sku' => 'CH70-CAFE',
        'weight_grams' => 45,
        'price_amount' => 1400,
        'stock' => 3,
    ]);
    $method = PaymentMethod::create(['code' => 'transfer', 'name' => 'Transferencia']);
    OrderStatus::create(['code' => 'pending_payment', 'name' => 'Pendiente']);
    $location = PickupLocation::create([
        'name' => 'Feria de Ica',
        'address_line' => 'Plaza de Armas',
        'district' => 'Ica',
        'province' => 'Ica',
        'department' => 'Ica',
        'starts_at' => now()->subHour(),
        'ends_at' => now()->addDay(),
    ]);

    $response = $this->postJson('/api/v1/checkout', [
        'items' => [['variant_id' => $variant->id, 'quantity' => 2]],
        'fulfillment_type' => 'pickup',
        'pickup_location_id' => $location->id,
        'address' => ['recipient_name' => 'Cliente', 'phone' => '999999999'],
        'payment_method_id' => $method->id,
    ]);

    $response->assertCreated()
        ->assertJsonPath('data.fulfillment_type', 'pickup')
        ->assertJsonPath('data.delivery_amount', 0)
        ->assertJsonPath('data.total_amount', 2800)
        ->assertJsonPath('data.pickup_location.name', 'Feria de Ica');

    $this->assertDatabaseHas('orders', [
        'fulfillment_type' => 'pickup',
        'pickup_location_id' => $location->id,
        'delivery_amount' => 0,
    ]);
});

it('does not expose or accept inactive or expired pickup locations', function () {
    $user = User::create(['name' => 'Cliente', 'email' => 'expired@example.com', 'password' => 'secretsecret', 'phone' => '999999999']);
    Sanctum::actingAs($user);
    $location = PickupLocation::create([
        'name' => 'Feria terminada',
        'address_line' => 'Plaza de Armas',
        'district' => 'Ica',
        'province' => 'Ica',
        'department' => 'Ica',
        'starts_at' => now()->subDays(2),
        'ends_at' => now()->subDay(),
    ]);

    $this->getJson('/api/v1/commerce-options')
        ->assertOk()
        ->assertJsonMissing(['id' => $location->id]);
});
