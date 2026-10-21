<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PosAccessSeeder extends Seeder
{
    public function run(): void
    {
        $permission = Permission::firstOrCreate(['name' => 'pos.sell', 'guard_name' => 'web']);
        Role::firstOrCreate(['name' => 'seller', 'guard_name' => 'web'])->givePermissionTo($permission);
        Role::where(['name' => 'administrator', 'guard_name' => 'web'])->first()?->givePermissionTo($permission);
        app(PermissionRegistrar::class)->forgetCachedPermissions();
    }
}
