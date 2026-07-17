<?php

namespace App\Jobs;

use App\Models\Order;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Throwable;

class SendTelegramOrderNotification implements ShouldQueue
{
    use Queueable;

    public int $tries = 3;

    /** @var array<int, int> */
    public array $backoff = [30, 120, 300];

    public function __construct(public int $orderId) {}

    public function handle(): void
    {
        $token = config('services.telegram.bot_token');
        $chatId = config('services.telegram.chat_id');
        if (blank($token) || blank($chatId)) {
            return;
        }

        $order = Order::with('status', 'paymentMethod', 'items')->findOrFail($this->orderId);
        $message = implode("\n", [
            '🍫 <b>Nuevo pedido en Cacao del Perú</b>',
            '<b>Número:</b> '.e($order->number),
            '<b>Cliente:</b> '.e($order->customer_name),
            '<b>Total:</b> S/ '.number_format($order->total_amount / 100, 2),
            '<b>Pago:</b> '.e($order->paymentMethod->name),
            '<b>Estado:</b> '.e($order->status->name),
            '<b>Productos:</b> '.$order->items->sum('quantity'),
            '<b>Distrito:</b> '.e((string) ($order->delivery_address['district'] ?? 'No indicado')),
            url("/admin/orders/{$order->id}/edit"),
        ]);

        Http::timeout(8)->retry(2, 500)->post("https://api.telegram.org/bot{$token}/sendMessage", ['chat_id' => $chatId, 'text' => $message, 'parse_mode' => 'HTML', 'disable_web_page_preview' => true])->throw();
    }

    public function failed(?Throwable $exception): void
    {
        Log::error('Telegram order notification failed.', ['order_id' => $this->orderId, 'exception' => $exception?->getMessage()]);
    }
}
