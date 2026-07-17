<?php

use App\Models\Category;
use App\Models\Coupon;
use App\Models\DeliveryRate;
use App\Models\DeliveryZone;
use App\Models\PaymentMethod;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\User;
use Laravel\Sanctum\Sanctum;

it('manages the authenticated customer addresses through the API', function () {
    $customer = User::create(['name' => 'Cliente API', 'email' => 'api-address@example.com', 'password' => 'secretsecret', 'is_active' => true]);
    Sanctum::actingAs($customer);

    $response = $this->postJson('/api/v1/addresses', apiAddressPayload())->assertCreated()->assertJsonPath('data.is_default', true);
    $addressId = $response->json('data.id');
    $this->getJson('/api/v1/addresses')->assertOk()->assertJsonCount(1, 'data');
    $this->putJson("/api/v1/addresses/{$addressId}", [...apiAddressPayload(), 'label' => 'Oficina'])->assertOk()->assertJsonPath('data.label', 'Oficina');
});

it('returns mobile commerce options and an authoritative checkout quote', function () {
    $customer = User::create(['name' => 'Cliente API', 'email' => 'api-quote@example.com', 'password' => 'secretsecret', 'is_active' => true]);
    Sanctum::actingAs($customer);
    $category = Category::create(['name' => 'Chocolate', 'slug' => 'api-chocolate', 'is_active' => true]);
    $product = Product::create(['category_id' => $category->id, 'name' => 'Chocolate 70', 'slug' => 'api-chocolate-70', 'is_active' => true]);
    $variant = ProductVariant::create(['product_id' => $product->id, 'name' => 'Pecana', 'sku' => 'API-CH70-PEC', 'weight_grams' => 45, 'price_amount' => 1400, 'stock' => 5, 'is_active' => true]);
    $zone = DeliveryZone::create(['name' => 'Provincia de Ica', 'districts' => ['Ica', 'Parcona'], 'is_active' => true]);
    $rate = DeliveryRate::create(['delivery_zone_id' => $zone->id, 'amount' => 500, 'free_from_amount' => 10000, 'is_active' => true]);
    PaymentMethod::create(['code' => 'yape', 'name' => 'Yape', 'requires_proof' => true, 'is_active' => true]);
    Coupon::create(['code' => 'MOVIL10', 'type' => 'percentage', 'value' => 10, 'usage_count' => 0, 'is_active' => true]);

    $this->getJson('/api/v1/commerce-options')->assertOk()->assertJsonPath('data.delivery_rates.0.id', $rate->id)->assertJsonPath('data.payment_methods.0.requires_proof', true);
    $this->postJson('/api/v1/checkout/quote', ['items' => [['variant_id' => $variant->id, 'quantity' => 2]], 'district' => 'ica', 'coupon_code' => 'movil10'])
        ->assertOk()->assertJsonPath('data.subtotal_amount', 2800)->assertJsonPath('data.discount_amount', 280)->assertJsonPath('data.delivery_amount', 500)->assertJsonPath('data.total_amount', 3020)->assertJsonPath('data.delivery_rate_id', $rate->id);
});

/** @return array<string, mixed> */
function apiAddressPayload(): array
{
    return ['label' => 'Casa', 'recipient_name' => 'Cliente API', 'phone' => '999999999', 'line_one' => 'Av. Principal 123', 'district' => 'Ica', 'province' => 'Ica', 'department' => 'Ica'];
}
