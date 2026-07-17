<?php

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderStatus;
use App\Models\PaymentMethod;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\User;
use App\Services\OrderReturnService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

uses(RefreshDatabase::class);

function returnFixture(string $statusCode = 'delivered', int $quantity = 3): array
{
    $user = User::create([
        'name' => 'Return Administrator',
        'email' => Str::uuid().'@example.test',
        'password' => Hash::make('password'),
    ]);
    $product = Product::create(['name' => 'Chocolate 70%', 'slug' => 'return-chocolate-70', 'is_active' => true]);
    $variant = ProductVariant::create([
        'product_id' => $product->id,
        'name' => 'Café',
        'sku' => 'RETURN-CH70-CAFE',
        'weight_grams' => 45,
        'price_amount' => 1400,
        'stock' => 2,
        'is_active' => true,
    ]);
    $status = OrderStatus::create(['code' => $statusCode, 'name' => ucfirst($statusCode), 'is_terminal' => $statusCode === 'delivered']);
    $payment = PaymentMethod::create(['code' => 'return-yape', 'name' => 'Yape', 'is_active' => true]);
    $order = Order::create([
        'number' => (string) Str::uuid(),
        'user_id' => $user->id,
        'order_status_id' => $status->id,
        'payment_method_id' => $payment->id,
        'customer_name' => $user->name,
        'customer_email' => $user->email,
        'customer_phone' => '999999999',
        'delivery_address' => ['district' => 'Ica'],
        'subtotal_amount' => 4200,
        'discount_amount' => 0,
        'delivery_amount' => 0,
        'total_amount' => 4200,
    ]);
    $item = OrderItem::create([
        'order_id' => $order->id,
        'product_variant_id' => $variant->id,
        'product_name' => $product->name,
        'variant_name' => $variant->name,
        'sku' => $variant->sku,
        'unit_price_amount' => 1400,
        'quantity' => $quantity,
        'line_total_amount' => 1400 * $quantity,
    ]);

    return compact('user', 'variant', 'order', 'item');
}

it('restocks a partial customer return and records its audit trail', function () {
    ['user' => $user, 'variant' => $variant, 'order' => $order, 'item' => $item] = returnFixture();

    $return = app(OrderReturnService::class)->process($order, [$item->id => 2], 'Una caja llegó dañada.', $user);

    expect($variant->fresh()->stock)->toBe(4)
        ->and($item->fresh()->returned_quantity)->toBe(2)
        ->and($return->items)->toHaveCount(1);
    $this->assertDatabaseHas('inventory_movements', [
        'order_id' => $order->id,
        'order_return_id' => $return->id,
        'type' => 'customer_return',
        'quantity_delta' => 2,
        'balance_after' => 4,
    ]);
});

it('allows multiple partial returns without exceeding the purchased quantity', function () {
    ['user' => $user, 'variant' => $variant, 'order' => $order, 'item' => $item] = returnFixture();
    $service = app(OrderReturnService::class);

    $service->process($order, [$item->id => 1], 'Primera devolución.', $user);
    $service->process($order, [$item->id => 2], 'Segunda devolución.', $user);

    expect($variant->fresh()->stock)->toBe(5)
        ->and($item->fresh()->returned_quantity)->toBe(3);

    try {
        $service->process($order, [$item->id => 1], 'Intento duplicado.', $user);
        $this->fail('The return should have been rejected.');
    } catch (ValidationException $exception) {
        expect($exception->errors())->toHaveKey('items');
    }

    expect($variant->fresh()->stock)->toBe(5);
});

it('rejects returns before an order is shipped', function () {
    ['user' => $user, 'variant' => $variant, 'order' => $order, 'item' => $item] = returnFixture('preparing');

    try {
        app(OrderReturnService::class)->process($order, [$item->id => 1], 'No corresponde.', $user);
        $this->fail('The return should have been rejected.');
    } catch (ValidationException $exception) {
        expect($exception->errors())->toHaveKey('items');
    }

    expect($variant->fresh()->stock)->toBe(2)
        ->and($item->fresh()->returned_quantity)->toBe(0);
    $this->assertDatabaseCount('order_returns', 0);
});
