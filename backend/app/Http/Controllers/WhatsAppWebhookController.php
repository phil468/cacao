<?php

namespace App\Http\Controllers;

use App\Models\NotificationDelivery;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class WhatsAppWebhookController extends Controller
{
    public function verify(Request $request): Response
    {
        abort_unless($request->query('hub_mode') === 'subscribe' && hash_equals((string) config('services.whatsapp_cloud.webhook_verify_token'), (string) $request->query('hub_verify_token')), 403);

        return response((string) $request->query('hub_challenge'), 200)->header('Content-Type', 'text/plain');
    }

    public function handle(Request $request): Response
    {
        $secret = (string) config('services.whatsapp_cloud.app_secret');
        $signature = (string) $request->header('X-Hub-Signature-256');
        abort_if($secret === '' || ! hash_equals('sha256='.hash_hmac('sha256', $request->getContent(), $secret), $signature), 403);

        foreach (data_get($request->json()->all(), 'entry', []) as $entry) {
            foreach (data_get($entry, 'changes', []) as $change) {
                foreach (data_get($change, 'value.statuses', []) as $status) {
                    NotificationDelivery::where('provider_message_id', data_get($status, 'id'))->update([
                        'status' => match (data_get($status, 'status')) {
                            'sent', 'delivered', 'read' => 'sent',
                            'failed' => 'failed',
                            default => 'pending',
                        },
                        'error' => data_get($status, 'errors.0.title'),
                    ]);
                }
            }
        }

        return response('EVENT_RECEIVED');
    }
}
