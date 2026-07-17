<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RoleResource\Pages;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Spatie\Permission\Models\Role;

class RoleResource extends AdminResource
{
    protected static ?string $viewPermission = 'roles.manage';

    protected static ?string $managePermission = 'roles.manage';

    protected static ?string $model = Role::class;

    protected static ?string $modelLabel = 'rol';

    protected static ?string $pluralModelLabel = 'roles';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('name')->label('Nombre interno')->required()->unique(ignoreRecord: true)
                ->disabled(fn (?Role $record): bool => $record !== null && in_array($record->name, ['administrator', 'customer'], true))
                ->dehydrated(),
            TextInput::make('guard_name')->default('web')->disabled()->dehydrated(),
            Select::make('permissions')->label('Permisos')->relationship('permissions', 'name')
                ->multiple()->preload()->searchable()->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('name')->label('Nombre')->searchable(),
            TextColumn::make('permissions.name')->label('Permisos')->badge()->limitList(4),
            TextColumn::make('users_count')->counts('users')->label('Usuarios'),
        ])->recordActions([EditAction::make()]);
    }

    public static function getPages(): array
    {
        return ['index' => Pages\ListRoles::route('/'), 'create' => Pages\CreateRole::route('/create'), 'edit' => Pages\EditRole::route('/{record}/edit')];
    }
}
