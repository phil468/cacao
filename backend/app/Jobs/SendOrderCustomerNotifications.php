<?php

namespace App\Jobs;

use App\Models\NotificationDelivery;
use App\Models\Order;
use App\Services\Messaging\FcmPushSender;
use App\Services\Messaging\WhatsAppCloudOrderNotifier;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;
use Throwable;

class SendOrderCustomerNotifications implements ShouldQueue
{
    use Queueable;

    public int $tries = 3;

    public function __construct(public int $orderId, public string $event) {}

    public function handle(WhatsAppCloudOrderNotifier $whatsApp, FcmPushSender $push): void
    {
        $order = Order::with('status', 'user.pushDevices')->findOrFail($this->orderId);
        $subject = "Pedido {$order->number}: {$order->status->name}";
        $body = "Hola {$order->customer_name}. Tu pedido {$order->number} está en estado: {$order->status->name}. Total: S/ ".number_format($order->total_amount / 100, 2).'.';

        $this->deliver($order, 'email', $order->customer_email, function () use ($order, $subject, $body): string {
            Mail::raw($body, fn ($message) => $message->to($order->customer_email)->subject($subject));

            return 'mail';
        });

        if ($order->whatsapp_consent_at !== null) {
            $this->deliver($order, 'whatsapp', $order->customer_phone, fn (): ?string => $whatsApp->send($order));
        }

        foreach ($order->user?->pushDevices()->where('order_updates_enabled', true)->get() ?? [] as $device) {
            $this->deliver($order, "push:{$device->id}", $device->token, fn (): ?string => $push->send($device->token, 'Actualización de tu pedido', $body, "/orders/{$order->id}", 'orders'));
        }
    }

    private function deliver(Order $order, string $channel, string $destination, callable $callback): void
    {
        $delivery = NotificationDelivery::firstOrCreate(['order_id' => $order->id, 'event' => $this->event, 'channel' => $channel], ['destination' => $destination]);
        if ($delivery->status === 'sent') {
            return;
        }

        try {
            $providerId = $callback();
            $delivery->update(['status' => $providerId === null ? 'disabled' : 'sent', 'provider_message_id' => $providerId, 'sent_at' => $providerId === null ? null : now(), 'error' => null]);
        } catch (Throwable $exception) {
            $delivery->update(['status' => 'failed', 'error' => str($exception->getMessage())->limit(1000)]);
            throw $exception;
        }
    }
}
