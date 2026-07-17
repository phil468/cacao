<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AdminUserResource\Pages;
use App\Models\User;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class AdminUserResource extends AdminResource
{
    protected static ?string $viewPermission = 'roles.manage';

    protected static ?string $managePermission = 'roles.manage';

    protected static ?string $model = User::class;

    protected static ?string $modelLabel = 'usuario administrativo';

    protected static ?string $pluralModelLabel = 'usuarios administrativos';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->whereHas('roles', fn (Builder $query): Builder => $query->where('name', 'administrator'));
    }

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('name')->label('Nombre')->required()->maxLength(120),
            TextInput::make('email')->label('Correo')->email()->required()->unique(ignoreRecord: true),
            TextInput::make('phone')->label('Teléfono')->tel()->maxLength(30),
            TextInput::make('password')->label('Contraseña')->password()->revealable()
                ->required(fn (string $operation): bool => $operation === 'create')
                ->minLength(12)->dehydrated(fn (?string $state): bool => filled($state)),
            Select::make('roles')->label('Roles')->relationship('roles', 'name')
                ->multiple()->preload()->searchable()->required(),
            Toggle::make('is_active')->label('Activo')->default(true),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('name')->label('Nombre')->searchable()->sortable(),
            TextColumn::make('email')->label('Correo')->searchable(),
            TextColumn::make('roles.name')->label('Roles')->badge(),
            IconColumn::make('is_active')->label('Activo')->boolean(),
            TextColumn::make('created_at')->label('Creado')->dateTime('d/m/Y H:i')->sortable(),
        ])->recordActions([EditAction::make()]);
    }

    public static function getPages(): array
    {
        return ['index' => Pages\ListAdminUsers::route('/'), 'create' => Pages\CreateAdminUser::route('/create'), 'edit' => Pages\EditAdminUser::route('/{record}/edit')];
    }
}
