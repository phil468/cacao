<?php

use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('creates a production administrator without a command-line password', function () {
    $this->seed(DatabaseSeeder::class);

    $this->artisan('admin:create', ['email' => 'owner@cacaodelperu.com'])
        ->expectsQuestion('Nombre completo', 'Propietario Cacao')
        ->expectsQuestion('Teléfono (opcional)', '905775538')
        ->expectsQuestion('Contraseña', 'StrongPassword!2026')
        ->expectsQuestion('Confirmar contraseña', 'StrongPassword!2026')
        ->expectsOutput('Administrador creado correctamente.')
        ->assertSuccessful();

    $administrator = User::where('email', 'owner@cacaodelperu.com')->firstOrFail();
    expect($administrator->hasRole('administrator'))->toBeTrue()
        ->and($administrator->is_active)->toBeTrue();
});
