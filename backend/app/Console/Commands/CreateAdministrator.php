<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Spatie\Permission\Models\Role;

class CreateAdministrator extends Command
{
    protected $signature = 'admin:create {email? : Administrator email address}';

    protected $description = 'Create or promote a production administrator interactively';

    public function handle(): int
    {
        $email = (string) ($this->argument('email') ?: $this->ask('Correo electrónico'));
        $name = (string) $this->ask('Nombre completo');
        $phone = (string) $this->ask('Teléfono (opcional)', '');
        $password = (string) $this->secret('Contraseña');
        $confirmation = (string) $this->secret('Confirmar contraseña');
        $validator = Validator::make(
            compact('email', 'name', 'phone', 'password', 'confirmation'),
            [
                'email' => ['required', 'email:rfc', 'max:255'],
                'name' => ['required', 'string', 'max:255'],
                'phone' => ['nullable', 'string', 'max:30'],
                'password' => ['required', 'same:confirmation', Password::min(12)->mixedCase()->numbers()->symbols()],
            ],
        );

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                $this->error($error);
            }

            return self::FAILURE;
        }

        $role = Role::where(['name' => 'administrator', 'guard_name' => 'web'])->first();
        if (! $role) {
            $this->error('Primero ejecuta: php artisan db:seed --force');

            return self::FAILURE;
        }

        $user = User::withTrashed()->where('email', $email)->first();
        if ($user?->trashed()) {
            $user->restore();
        }
        $user ??= new User;
        $user->fill([
            'name' => $name,
            'email' => $email,
            'phone' => $phone !== '' ? $phone : null,
            'password' => Hash::make($password),
            'is_active' => true,
            'email_verified_at' => now(),
        ]);
        $user->save();
        $user->syncRoles([$role]);

        $this->info('Administrador creado correctamente.');

        return self::SUCCESS;
    }
}
