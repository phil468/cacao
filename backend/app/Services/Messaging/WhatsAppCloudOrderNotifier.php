<?php

namespace App\Services\Messaging;

use App\Models\Order;
use Illuminate\Support\Facades\Http;

class WhatsAppCloudOrderNotifier
{
    public function send(Order $order): ?string
    {
        $token = config('services.whatsapp_cloud.access_token');
        $phoneNumberId = config('services.whatsapp_cloud.phone_number_id');
        $version = config('services.whatsapp_cloud.graph_version');
        if (blank($token) || blank($phoneNumberId) || blank($version)) {
            return null;
        }

        $response = Http::withToken($token)->timeout(12)->post("https://graph.facebook.com/{$version}/{$phoneNumberId}/messages", [
            'messaging_product' => 'whatsapp',
            'to' => preg_replace('/\D+/', '', $order->customer_phone),
            'type' => 'template',
            'template' => [
                'name' => config('services.whatsapp_cloud.order_template'),
                'language' => ['code' => 'es'],
                'components' => [['type' => 'body', 'parameters' => [
                    ['type' => 'text', 'text' => $order->customer_name],
                    ['type' => 'text', 'text' => $order->number],
                    ['type' => 'text', 'text' => $order->status->name],
                    ['type' => 'text', 'text' => number_format($order->total_amount / 100, 2)],
                ]]],
            ],
        ])->throw()->json();

        return data_get($response, 'messages.0.id');
    }
}
