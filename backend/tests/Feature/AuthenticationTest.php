<?php

use App\Models\User;
use Spatie\Permission\Models\Role;

it('registers a mobile customer and returns a sanctum token', function () {
    Role::create(['name' => 'customer', 'guard_name' => 'web']);
    $this->postJson('/api/v1/auth/register', ['name' => 'Ana', 'email' => 'ana@example.com', 'password' => 'very-secret', 'password_confirmation' => 'very-secret'])->assertCreated()->assertJsonStructure(['token', 'user' => ['id', 'email']]);
    expect(User::first()->hasRole('customer'))->toBeTrue();
});
