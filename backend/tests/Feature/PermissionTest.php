<?php

use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

it('grants admin permissions through roles', function () {
    $p = Permission::create(['name' => 'orders.manage', 'guard_name' => 'web']);
    $r = Role::create(['name' => 'administrator', 'guard_name' => 'web']);
    $r->givePermissionTo($p);
    $u = User::create(['name' => 'Admin', 'email' => 'a@example.com', 'password' => 'secretsecret']);
    $u->assignRole($r);
    expect($u->can('orders.manage'))->toBeTrue();
});
