<?php

use App\Models\Category;
use App\Models\Coupon;
use App\Models\DeliveryRate;
use App\Models\DeliveryZone;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\PaymentMethod;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\User;
use App\Services\OrderStatusService;
use Illuminate\Http\UploadedFile;
use Laravel\Sanctum\Sanctum;

function checkoutFixture(int $stock = 3): array
{
    $user = User::create(['name' => 'Client', 'email' => 'c@example.com', 'password' => 'secretsecret', 'phone' => '999']);
    Sanctum::actingAs($user);
    $category = Category::create(['name' => 'C', 'slug' => 'c']);
    $product = Product::create(['category_id' => $category->id, 'name' => 'Bar', 'slug' => 'bar']);
    $variant = ProductVariant::create(['product_id' => $product->id, 'name' => '80 g', 'sku' => 'SKU1', 'weight_grams' => 80, 'price_amount' => 2000, 'promotional_price_amount' => 1500, 'stock' => $stock]);
    OrderStatus::create(['code' => 'pending_payment', 'name' => 'Pendiente']);
    $method = PaymentMethod::create(['code' => 'transfer', 'name' => 'Transferencia']);
    $zone = DeliveryZone::create(['name' => 'Lima', 'districts' => ['Lima']]);
    $rate = DeliveryRate::create(['delivery_zone_id' => $zone->id, 'amount' => 1000]);

    return [$variant, $method, $rate];
}

function checkoutPayload(ProductVariant $variant, PaymentMethod $method, DeliveryRate $rate, int $quantity): array
{
    return ['items' => [['variant_id' => $variant->id, 'quantity' => $quantity]], 'address' => ['recipient_name' => 'Client', 'phone' => '999', 'document_number' => '12345678', 'line_one' => 'Calle 1', 'district' => 'Lima', 'province' => 'Lima', 'department' => 'Lima'], 'payment_method_id' => $method->id, 'delivery_rate_id' => $rate->id];
}

it('calculates authoritative totals snapshots items and decrements stock', function () {
    [$variant, $method, $rate] = checkoutFixture();
    $this->postJson('/api/v1/checkout', checkoutPayload($variant, $method, $rate, 2))
        ->assertCreated()->assertJsonPath('data.total_amount', 4000)->assertJsonPath('data.items.0.sku', 'SKU1');
    expect($variant->fresh()->stock)->toBe(1);
    $this->assertDatabaseHas('orders', ['customer_document_number' => '12345678']);
});

it('rejects overselling without changing stock', function () {
    [$variant, $method, $rate] = checkoutFixture(1);
    $this->postJson('/api/v1/checkout', checkoutPayload($variant, $method, $rate, 2))
        ->assertConflict()->assertJsonPath('message', 'Uno de los productos no tiene stock suficiente.');
    expect($variant->fresh()->stock)->toBe(1);
});

it('requires payment proof before changing stock when the method requires it', function () {
    [$variant, $method, $rate] = checkoutFixture();
    $method->update(['requires_proof' => true]);

    $this->postJson('/api/v1/checkout', checkoutPayload($variant, $method, $rate, 1))
        ->assertUnprocessable()
        ->assertJsonValidationErrors('payment_proof');

    expect($variant->fresh()->stock)->toBe(3);
});

it('restores stock once when an order is cancelled', function () {
    [$variant, $method, $rate] = checkoutFixture();
    $this->postJson('/api/v1/checkout', checkoutPayload($variant, $method, $rate, 2))->assertCreated();
    $order = Order::latest('id')->firstOrFail();
    $cancelled = OrderStatus::create(['code' => 'cancelled', 'name' => 'Cancelado', 'is_terminal' => true]);

    app(OrderStatusService::class)->transition($order, $cancelled);
    app(OrderStatusService::class)->transition($order->fresh(), $cancelled);

    expect($variant->fresh()->stock)->toBe(3);
    $this->assertDatabaseCount('inventory_movements', 2);
    $this->assertDatabaseHas('inventory_movements', ['order_id' => $order->id, 'type' => 'order_cancellation', 'quantity_delta' => 2, 'balance_after' => 3]);
});

it('starts an order in payment review when a proof is uploaded', function () {
    [$variant, $method, $rate] = checkoutFixture();
    $method->update(['requires_proof' => true]);
    OrderStatus::create(['code' => 'payment_review', 'name' => 'Pago en revisión']);
    $payload = checkoutPayload($variant, $method, $rate, 1);
    $payload['payment_proof'] = UploadedFile::fake()->create('proof.jpg', 10, 'image/jpeg');

    $this->post('/api/v1/checkout', $payload)
        ->assertCreated()
        ->assertJsonPath('data.status.code', 'payment_review');

    $this->assertDatabaseHas('orders', ['order_status_id' => OrderStatus::where('code', 'payment_review')->value('id')]);
});

it('previews and applies the same coupon totals before checkout', function () {
    [$variant, $method, $rate] = checkoutFixture();
    $customer = User::where('email', 'c@example.com')->firstOrFail();
    $this->actingAs($customer);
    Coupon::create(['code' => 'CACAO10', 'type' => 'percentage', 'value' => 10, 'usage_count' => 0, 'is_active' => true]);

    $this->withSession(['storefront_cart' => [$variant->id => 2]])->postJson('/checkout/resumen', ['district' => 'Lima', 'coupon_code' => 'cacao10'])
        ->assertOk()->assertJson(['subtotal_amount' => 3000, 'discount_amount' => 300, 'delivery_amount' => 1000, 'total_amount' => 3700, 'coupon_code' => 'CACAO10']);
});

it('rejects an unknown coupon instead of silently ignoring it', function () {
    [$variant, $method, $rate] = checkoutFixture();

    $this->postJson('/api/v1/checkout', [...checkoutPayload($variant, $method, $rate, 1), 'coupon_code' => 'DOES-NOT-EXIST'])
        ->assertUnprocessable()->assertJsonValidationErrors('coupon_code');

    expect($variant->fresh()->stock)->toBe(3);
});

it('allows a once-per-customer coupon only once for the same customer', function () {
    [$variant, $method, $rate] = checkoutFixture(4);
    Coupon::create(['code' => 'UNAVEZ', 'type' => 'fixed', 'value' => 200, 'usage_count' => 0, 'once_per_customer' => true, 'is_active' => true]);
    $payload = [...checkoutPayload($variant, $method, $rate, 1), 'coupon_code' => 'UNAVEZ'];

    $this->postJson('/api/v1/checkout', $payload)->assertCreated();
    $this->postJson('/api/v1/checkout', $payload)
        ->assertUnprocessable()
        ->assertJsonValidationErrors('coupon_code')
        ->assertJsonPath('errors.coupon_code.0', 'Ya utilizaste este cupón. Solo se permite un uso por cliente.');

    expect($variant->fresh()->stock)->toBe(3)
        ->and(Coupon::where('code', 'UNAVEZ')->value('usage_count'))->toBe(1);
});

it('allows another customer to use a once-per-customer coupon', function () {
    [$variant, $method, $rate] = checkoutFixture(4);
    Coupon::create(['code' => 'CLIENTE1', 'type' => 'fixed', 'value' => 200, 'usage_count' => 0, 'once_per_customer' => true, 'is_active' => true]);
    $payload = [...checkoutPayload($variant, $method, $rate, 1), 'coupon_code' => 'CLIENTE1'];
    $this->postJson('/api/v1/checkout', $payload)->assertCreated();

    $otherCustomer = User::create(['name' => 'Other', 'email' => 'other@example.com', 'password' => 'secretsecret', 'phone' => '998']);
    Sanctum::actingAs($otherCustomer);
    $this->postJson('/api/v1/checkout', $payload)->assertCreated();

    expect(Coupon::where('code', 'CLIENTE1')->value('usage_count'))->toBe(2);
});

it('releases once-per-customer coupon eligibility when the order is cancelled', function () {
    [$variant, $method, $rate] = checkoutFixture(4);
    Coupon::create(['code' => 'REUTILIZA', 'type' => 'fixed', 'value' => 200, 'usage_count' => 0, 'once_per_customer' => true, 'is_active' => true]);
    $payload = [...checkoutPayload($variant, $method, $rate, 1), 'coupon_code' => 'REUTILIZA'];
    $this->postJson('/api/v1/checkout', $payload)->assertCreated();

    $cancelled = OrderStatus::create(['code' => 'cancelled', 'name' => 'Cancelado', 'is_terminal' => true]);
    app(OrderStatusService::class)->transition(Order::latest('id')->firstOrFail(), $cancelled);

    $this->postJson('/api/v1/checkout', $payload)->assertCreated();
    expect(Coupon::where('code', 'REUTILIZA')->value('usage_count'))->toBe(1);
});

it('rejects a reused once-per-customer coupon during checkout preview', function () {
    [$variant, $method, $rate] = checkoutFixture(4);
    $customer = User::where('email', 'c@example.com')->firstOrFail();
    $this->actingAs($customer);
    Coupon::create(['code' => 'PREVIEW1', 'type' => 'fixed', 'value' => 200, 'usage_count' => 0, 'once_per_customer' => true, 'is_active' => true]);
    $this->postJson('/api/v1/checkout', [...checkoutPayload($variant, $method, $rate, 1), 'coupon_code' => 'PREVIEW1'])->assertCreated();

    $this->withSession(['storefront_cart' => [$variant->id => 1]])->postJson('/checkout/resumen', ['district' => 'Lima', 'coupon_code' => 'PREVIEW1'])
        ->assertUnprocessable()
        ->assertJsonValidationErrors('coupon_code');
});
