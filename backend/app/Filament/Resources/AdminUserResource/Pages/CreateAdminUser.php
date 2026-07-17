<?php

namespace App\Filament\Resources\AdminUserResource\Pages;

use App\Filament\Resources\AdminUserResource;
use App\Models\User;
use Filament\Resources\Pages\CreateRecord;

class CreateAdminUser extends CreateRecord
{
    protected static string $resource = AdminUserResource::class;

    protected function afterCreate(): void
    {
        if ($this->record instanceof User && ! $this->record->hasRole('administrator')) {
            $this->record->assignRole('administrator');
        }
    }
}
