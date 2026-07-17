<?php

namespace App\Jobs;

use App\Models\NotificationDelivery;
use App\Models\PushCampaign;
use App\Models\PushDevice;
use App\Services\Messaging\FcmPushSender;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Throwable;

class SendPushCampaign implements ShouldQueue
{
    use Queueable;

    public function __construct(public int $campaignId) {}

    public function handle(FcmPushSender $push): void
    {
        $campaign = PushCampaign::findOrFail($this->campaignId);
        PushDevice::where('promotions_enabled', true)->eachById(function (PushDevice $device) use ($campaign, $push): void {
            $delivery = NotificationDelivery::firstOrCreate([
                'push_campaign_id' => $campaign->id,
                'event' => "campaign.{$campaign->id}",
                'channel' => "push:{$device->id}",
            ], ['destination' => $device->token]);
            if ($delivery->status === 'sent') {
                return;
            }

            try {
                $providerId = $push->send($device->token, $campaign->title, $campaign->body, $campaign->route, 'promotions');
                $delivery->update(['status' => $providerId ? 'sent' : 'disabled', 'provider_message_id' => $providerId, 'sent_at' => $providerId ? now() : null]);
            } catch (Throwable $exception) {
                $delivery->update(['status' => 'failed', 'error' => str($exception->getMessage())->limit(1000)]);
            }
        });
        $campaign->update(['sent_at' => now()]);
    }
}
