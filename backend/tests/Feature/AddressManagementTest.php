<?php

use App\Models\Address;
use App\Models\User;
use Database\Seeders\DatabaseSeeder;

it('creates a first customer address as the default address', function () {
    $this->seed(DatabaseSeeder::class);
    $customer = User::create(['name' => 'Cliente', 'email' => 'address@example.com', 'phone' => '999999999', 'password' => 'secretsecret', 'is_active' => true]);
    $customer->assignRole('customer');

    $this->actingAs($customer)->post('/mi-cuenta/direcciones', addressPayload())->assertRedirect();

    $this->assertDatabaseHas('addresses', ['user_id' => $customer->id, 'label' => 'Casa', 'district' => 'Ica', 'is_default' => true, 'latitude' => -14.0678, 'longitude' => -75.7286]);
});

it('does not allow a customer to edit another customer address', function () {
    $owner = User::create(['name' => 'Propietario', 'email' => 'owner@example.com', 'password' => 'secretsecret', 'is_active' => true]);
    $intruder = User::create(['name' => 'Otro', 'email' => 'other@example.com', 'password' => 'secretsecret', 'is_active' => true]);
    $address = Address::create([...addressPayload(), 'user_id' => $owner->id, 'is_default' => true]);

    $this->actingAs($intruder)->put("/mi-cuenta/direcciones/{$address->id}", addressPayload())->assertForbidden();
});

/** @return array<string, mixed> */
function addressPayload(): array
{
    return ['label' => 'Casa', 'recipient_name' => 'Cliente', 'phone' => '999999999', 'line_one' => 'Av. Principal 123', 'district' => 'Ica', 'province' => 'Ica', 'department' => 'Ica', 'latitude' => -14.0678, 'longitude' => -75.7286];
}
