<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PermissionResource\Pages;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Spatie\Permission\Models\Permission;

class PermissionResource extends AdminResource
{
    protected static ?string $viewPermission = 'roles.manage';

    protected static ?string $managePermission = 'roles.manage';

    protected static ?string $model = Permission::class;

    protected static ?string $modelLabel = 'permiso';

    protected static ?string $pluralModelLabel = 'permisos';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('name')->label('Nombre interno')->required()->unique(ignoreRecord: true)
                ->helperText('Usa nombres en inglés con el formato modulo.accion.'),
            TextInput::make('guard_name')->default('web')->disabled()->dehydrated(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('name')->label('Nombre')->searchable()->sortable(),
            TextColumn::make('roles_count')->counts('roles')->label('Roles'),
        ])->recordActions([EditAction::make()]);
    }

    public static function getPages(): array
    {
        return ['index' => Pages\ListPermissions::route('/'), 'create' => Pages\CreatePermission::route('/create'), 'edit' => Pages\EditPermission::route('/{record}/edit')];
    }
}
