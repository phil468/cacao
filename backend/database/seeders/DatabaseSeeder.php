<?php

namespace Database\Seeders;

use App\Models\BusinessSetting;
use App\Models\DeliveryRate;
use App\Models\DeliveryZone;
use App\Models\OrderStatus;
use App\Models\PaymentMethod;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = collect(['catalog.view', 'catalog.manage', 'inventory.manage', 'orders.view', 'orders.manage', 'customers.manage', 'content.manage', 'settings.manage', 'roles.manage'])->map(fn ($p) => Permission::firstOrCreate(['name' => $p, 'guard_name' => 'web']));
        $admin = Role::firstOrCreate(['name' => 'administrator', 'guard_name' => 'web']);
        $admin->syncPermissions($permissions);
        Role::firstOrCreate(['name' => 'customer', 'guard_name' => 'web']);
        BusinessSetting::firstOrCreate(['key' => 'business.identity'], ['value' => ['name' => 'Cacao del Perú', 'legal_name' => '', 'ruc' => '', 'timezone' => 'America/Lima', 'currency' => 'PEN']]);
        BusinessSetting::firstOrCreate(['key' => 'business.contact'], ['value' => ['email' => '', 'phone' => '51905775538', 'address' => 'Ica, Perú']]);
        BusinessSetting::firstOrCreate(['key' => 'business.storefront'], ['value' => ['carousel_interval_seconds' => 7]]);
        if (app()->environment(['local', 'testing'])) {
            $u = User::firstOrCreate(['email' => 'admin@cacaodelperu.test'], ['name' => 'Administrador Demo', 'phone' => '999999999', 'password' => Hash::make('ChangeMe123!'), 'email_verified_at' => now()]);
            $u->assignRole($admin);
        }foreach ([['pending_payment', 'Pendiente de pago', false], ['payment_review', 'Pago en revisión', false], ['preparing', 'En preparación', false], ['shipped', 'En camino', false], ['delivered', 'Entregado', true], ['cancelled', 'Cancelado', true]] as $i => $s) {
            OrderStatus::firstOrCreate(['code' => $s[0]], ['name' => $s[1], 'is_terminal' => $s[2], 'sort_order' => $i]);
        }foreach ([['transfer', 'Transferencia bancaria', true], ['yape', 'Yape', true], ['plin', 'Plin', true]] as $m) {
            PaymentMethod::updateOrCreate(['code' => $m[0]], ['name' => $m[1], 'requires_proof' => $m[2], 'instructions' => 'Configura las instrucciones desde el panel.', 'is_active' => true]);
        }DeliveryZone::where('name', 'Lima Metropolitana')->update(['is_active' => false]);
        DeliveryRate::whereHas('deliveryZone', fn ($query) => $query->where('name', 'Lima Metropolitana'))->update(['is_active' => false]);
        $this->call(ProductCatalogSeeder::class);
        $icaZone = DeliveryZone::updateOrCreate(['name' => 'Provincia de Ica'], ['districts' => ['Ica', 'La Tinguiña', 'Los Aquijes', 'Ocucaje', 'Pachacútec', 'Parcona', 'Pueblo Nuevo', 'Salas', 'San José de los Molinos', 'San Juan Bautista', 'Santiago', 'Subtanjalla', 'Tate', 'Yauca del Rosario'], 'is_active' => true]);
        DeliveryRate::firstOrCreate(['delivery_zone_id' => $icaZone->id], ['amount' => 0, 'free_from_amount' => null, 'is_active' => false]);
        $this->call(CurrentInventorySeeder::class);
    }
}
