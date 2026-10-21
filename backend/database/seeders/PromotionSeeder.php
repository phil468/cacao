<?php

namespace Database\Seeders;

use App\Models\Promotion;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PromotionSeeder extends Seeder
{
    public function run(): void
    {
        foreach (['promotions.view', 'promotions.manage'] as $name) {
            $permission = Permission::firstOrCreate(['name' => $name, 'guard_name' => 'web']);
            Role::where(['name' => 'administrator', 'guard_name' => 'web'])->first()?->givePermissionTo($permission);
        }
        app(PermissionRegistrar::class)->forgetCachedPermissions();
        Promotion::firstOrCreate(['slug' => 'aniversario-2026'], [
            'name' => 'Aniversario Cacao del Perú 2026',
            'draw_at' => '2026-10-28 00:00:00',
            'minimum_amount' => 2000, 'amount_per_code' => 2000,
            'is_active' => false, 'legal_reviewed' => false,
            'terms_content' => implode("\n\n", array_map(fn (string $heading): string => $heading.': [PENDIENTE DE REVISIÓN LEGAL]', ['Organizador', 'Vigencia', 'Ámbito', 'Requisitos', 'Mecánica', 'Obtención de códigos', 'Premios', 'Fecha del sorteo', 'Selección de ganadores', 'Contacto de ganadores', 'Entrega', 'Plazos', 'Códigos inválidos', 'Fraude', 'Protección de datos', 'Disposiciones generales'])),
            'privacy_content' => 'Responsable, finalidad, conservación, ejercicio de derechos, contacto y tratamiento de datos personales: [PENDIENTE DE REVISIÓN LEGAL]. El consentimiento comercial es opcional y separado de la aceptación de los términos.',
        ]);
    }
}
