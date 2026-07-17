<?php

use Database\Seeders\DatabaseSeeder;

it('registers a storefront customer and keeps the session cart', function () {
    $this->seed(DatabaseSeeder::class);

    $this->withSession(['storefront_cart' => [123 => 2]])->post('/registro', [
        'name' => 'Cliente Web', 'email' => 'web@example.com', 'phone' => '999111222',
        'password' => 'secret123', 'password_confirmation' => 'secret123',
    ])->assertRedirect('/checkout')->assertSessionHas('storefront_cart.123', 2);

    $this->assertAuthenticated();
    $this->assertDatabaseHas('users', ['email' => 'web@example.com']);
});

it('requires authentication before opening checkout', function () {
    $this->withSession(['storefront_cart' => [1 => 1]])->get('/checkout')->assertRedirect('/ingresar');
});

it('shows a Spanish validation message for a short password', function () {
    $this->post('/registro', ['name' => 'Cliente', 'email' => 'short@example.com', 'phone' => '999999999', 'password' => '123', 'password_confirmation' => '123'])
        ->assertSessionHasErrors(['password' => 'La contraseña debe tener al menos 8 caracteres.']);
});

it('handles missing Google credentials without an exception', function () {
    config(['services.google.client_id' => null, 'services.google.client_secret' => null]);

    $this->get('/auth/google')->assertRedirect('/ingresar')->assertSessionHasErrors('google');
});
