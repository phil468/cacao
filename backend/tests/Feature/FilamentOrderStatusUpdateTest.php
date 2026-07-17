<?php

use App\Filament\Resources\OrderResource\Pages\EditOrder;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\PaymentMethod;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;

uses(RefreshDatabase::class);

it('records status history when Filament has already mutated the model attribute', function (): void {
    $review = OrderStatus::create(['code' => 'payment_review', 'name' => 'Pago en revisión']);
    $preparing = OrderStatus::create(['code' => 'preparing', 'name' => 'En preparación']);
    $paymentMethod = PaymentMethod::create([
        'name' => 'Yape',
        'code' => 'yape',
        'instructions' => 'Enviar constancia.',
        'is_active' => true,
        'requires_proof' => true,
    ]);
    $order = Order::create([
        'number' => (string) Str::uuid(),
        'order_status_id' => $review->id,
        'payment_method_id' => $paymentMethod->id,
        'customer_name' => 'Cliente Demo',
        'customer_email' => 'cliente@example.test',
        'customer_phone' => '51900000000',
        'delivery_address' => ['address_line' => 'Ica'],
        'subtotal_amount' => 1000,
        'discount_amount' => 0,
        'delivery_amount' => 0,
        'total_amount' => 1000,
    ]);

    $order->setAttribute('order_status_id', $preparing->id);

    $page = (new ReflectionClass(EditOrder::class))->newInstanceWithoutConstructor();
    $method = new ReflectionMethod(EditOrder::class, 'handleRecordUpdate');
    $updatedOrder = $method->invoke($page, $order, ['order_status_id' => $preparing->id]);

    expect($updatedOrder->status->code)->toBe('preparing')
        ->and($updatedOrder->statusHistories()->count())->toBe(1)
        ->and($updatedOrder->statusHistories()->first()->order_status_id)->toBe($preparing->id);
});
