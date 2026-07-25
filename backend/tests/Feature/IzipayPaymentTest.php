<?php

use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\PaymentMethod;
use App\Models\PaymentTransaction;
use App\Models\User;
use App\Services\Payments\IzipayService;
use Illuminate\Support\Facades\Queue;
use Illuminate\Validation\ValidationException;

it('validates Izipay signatures and processes an approved payment idempotently', function () {
    Queue::fake();
    config([
        'services.izipay.enabled' => true,
        'services.izipay.hash_key' => 'test-hash-key',
    ]);
    $user = User::create(['name' => 'Cliente', 'email' => 'izipay@example.com', 'password' => 'secretsecret', 'phone' => '999999999']);
    $pending = OrderStatus::create(['code' => 'pending_payment', 'name' => 'Pendiente']);
    $preparing = OrderStatus::create(['code' => 'preparing', 'name' => 'En preparación']);
    $method = PaymentMethod::create(['code' => 'izipay', 'name' => 'Tarjeta', 'provider' => 'izipay']);
    $order = Order::create([
        'number' => 'ORDER-IZIPAY-1',
        'user_id' => $user->id,
        'order_status_id' => $pending->id,
        'payment_method_id' => $method->id,
        'customer_name' => $user->name,
        'customer_email' => $user->email,
        'customer_phone' => $user->phone,
        'delivery_address' => [],
        'subtotal_amount' => 1600,
        'discount_amount' => 0,
        'delivery_amount' => 500,
        'total_amount' => 2100,
    ]);
    $transaction = PaymentTransaction::create([
        'order_id' => $order->id,
        'provider' => 'izipay',
        'transaction_id' => 'TX-123',
        'amount' => 2100,
        'currency' => 'PEN',
    ]);
    $payload = json_encode([
        'code' => '00',
        'transactionId' => 'TX-123',
        'response' => ['order' => [[
            'amount' => '21.00',
            'currency' => 'PEN',
            'orderNumber' => 'TX-123',
            'uniqueId' => 'IZI-456',
        ]]],
    ], JSON_THROW_ON_ERROR);
    $notification = [
        'payloadHttp' => $payload,
        'signature' => base64_encode(hash_hmac('sha256', $payload, 'test-hash-key', true)),
        'transactionId' => 'TX-123',
    ];

    $service = app(IzipayService::class);
    $service->processNotification($notification);
    $service->processNotification($notification);

    expect($transaction->fresh()->status)->toBe('approved')
        ->and($transaction->fresh()->provider_reference)->toBe('IZI-456')
        ->and($order->fresh()->order_status_id)->toBe($preparing->id)
        ->and($order->statusHistories()->where('order_status_id', $preparing->id)->count())->toBe(1);
});

it('rejects an Izipay notification with a modified signature', function () {
    config(['services.izipay.hash_key' => 'test-hash-key']);

    app(IzipayService::class)->processNotification([
        'payloadHttp' => '{"code":"00"}',
        'signature' => 'invalid',
        'transactionId' => 'TX-INVALID',
    ]);
})->throws(ValidationException::class);
