<?php

use App\Models\User;
use Database\Seeders\DatabaseSeeder;

it('allows an administrator to render the core management resources', function () {
    $this->seed(DatabaseSeeder::class);
    $administrator = User::where('email', 'admin@cacaodelperu.test')->firstOrFail();

    $this->actingAs($administrator)->get('/admin/categories')->assertOk();
    $this->actingAs($administrator)->get('/admin/products')->assertOk();
    $this->actingAs($administrator)->get('/admin/product-variants')->assertOk();
    $this->actingAs($administrator)->get('/admin/inventory-movements')->assertOk();
    $this->actingAs($administrator)->get('/admin/orders')->assertOk();
    $this->actingAs($administrator)->get('/admin/delivery-zones')->assertOk();
    $this->actingAs($administrator)->get('/admin/push-campaigns')->assertOk();
});

it('prevents a customer from accessing the administration panel', function () {
    $this->seed(DatabaseSeeder::class);
    $customer = User::create([
        'name' => 'Cliente',
        'email' => 'cliente@example.com',
        'password' => 'secretsecret',
        'is_active' => true,
    ]);
    $customer->assignRole('customer');

    $this->actingAs($customer)->get('/admin')->assertForbidden();
});
