<?php

use App\Models\PushDevice;
use App\Models\User;
use Laravel\Sanctum\Sanctum;

it('requires authentication to register a push device', function () {
    $this->postJson('/api/v1/push-devices', [])->assertUnauthorized();
});

it('registers push preferences for the authenticated customer', function () {
    $user = User::create([
        'name' => 'Cliente Push',
        'email' => 'push@example.test',
        'phone' => '999999999',
        'password' => 'password',
        'is_active' => true,
    ]);
    Sanctum::actingAs($user);

    $this->postJson('/api/v1/push-devices', [
        'token' => 'test-fcm-token',
        'platform' => 'android',
        'order_updates_enabled' => true,
        'promotions_enabled' => false,
    ])->assertCreated()->assertJsonPath('data.user_id', $user->id);

    expect(PushDevice::query()->first())
        ->user_id->toBe($user->id)
        ->order_updates_enabled->toBeTrue()
        ->promotions_enabled->toBeFalse();
});
