<?php

namespace App\Services\Messaging;

use Google\Auth\Credentials\ServiceAccountCredentials;
use Illuminate\Support\Facades\Http;
use RuntimeException;

class FcmPushSender
{
    public function send(string $token, string $title, string $body, string $route, string $channelId): ?string
    {
        $projectId = config('services.fcm.project_id');
        $credentialsPath = config('services.fcm.credentials');
        if (blank($projectId) || blank($credentialsPath)) {
            return null;
        }

        $credentials = new ServiceAccountCredentials('https://www.googleapis.com/auth/firebase.messaging', $credentialsPath);
        $authToken = $credentials->fetchAuthToken()['access_token'] ?? null;
        if (! $authToken) {
            throw new RuntimeException('FCM access token could not be generated.');
        }

        $response = Http::withToken($authToken)->post("https://fcm.googleapis.com/v1/projects/{$projectId}/messages:send", [
            'message' => [
                'token' => $token,
                'notification' => ['title' => $title, 'body' => $body],
                'data' => ['route' => $route],
                'android' => ['notification' => ['channel_id' => $channelId]],
            ],
        ])->throw()->json();

        return $response['name'] ?? null;
    }
}
