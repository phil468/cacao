<?php

use App\Http\Controllers\Api\V1\AddressController;
use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\CheckoutController;
use App\Http\Controllers\Api\V1\CheckoutQuoteController;
use App\Http\Controllers\Api\V1\CommerceOptionsController;
use App\Http\Controllers\Api\V1\ProductController;
use App\Http\Controllers\Api\V1\PushDeviceController;
use App\Http\Controllers\WhatsAppWebhookController;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('webhooks/whatsapp', [WhatsAppWebhookController::class, 'verify']);
Route::post('webhooks/whatsapp', [WhatsAppWebhookController::class, 'handle']);

Route::prefix('v1')->group(function () {
    Route::middleware('throttle:auth')->group(function () {
        Route::post('auth/register', [AuthController::class, 'register']);
        Route::post('auth/login', [AuthController::class, 'login']);
    });
    Route::middleware('throttle:api')->group(function () {
        Route::get('products', [ProductController::class, 'index']);
        Route::get('products/{slug}', [ProductController::class, 'show']);
    });
    Route::middleware(['auth:sanctum', 'throttle:sensitive'])->group(function () {
        Route::post('auth/logout', [AuthController::class, 'logout']);
        Route::apiResource('addresses', AddressController::class)->except('show');
        Route::patch('addresses/{address}/default', [AddressController::class, 'makeDefault']);
        Route::get('commerce-options', CommerceOptionsController::class);
        Route::post('checkout/quote', CheckoutQuoteController::class);
        Route::post('checkout', CheckoutController::class);
        Route::post('push-devices', [PushDeviceController::class, 'store']);
        Route::delete('push-devices', [PushDeviceController::class, 'destroy']);
        Route::get('orders', fn (Request $r) => OrderResource::collection($r->user()->orders()->with('status', 'paymentMethod')->latest()->paginate()));
        Route::get('orders/{order}', function (Request $r, Order $order) {
            abort_unless($order->user_id === $r->user()->id, 403);

            return new OrderResource($order->load('items', 'status', 'paymentMethod', 'statusHistories.status'));
        });
    });
});
