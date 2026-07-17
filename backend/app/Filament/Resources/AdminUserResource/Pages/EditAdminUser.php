<?php

namespace App\Filament\Resources\AdminUserResource\Pages;

use App\Filament\Resources\AdminUserResource;
use App\Models\User;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Validation\ValidationException;

class EditAdminUser extends EditRecord
{
    protected static string $resource = AdminUserResource::class;

    /** @param array<string, mixed> $data */
    protected function mutateFormDataBeforeSave(array $data): array
    {
        if ($this->record instanceof User && auth()->id() === $this->record->id && ! ($data['is_active'] ?? false)) {
            throw ValidationException::withMessages(['is_active' => 'No puedes desactivar tu propio usuario.']);
        }

        return $data;
    }

    protected function afterSave(): void
    {
        if ($this->record instanceof User && ! $this->record->hasRole('administrator')) {
            $this->record->assignRole('administrator');
        }
    }
}
