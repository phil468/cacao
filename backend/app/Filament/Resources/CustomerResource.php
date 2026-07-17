<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CustomerResource\Pages;
use App\Models\User;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class CustomerResource extends AdminResource
{
    protected static ?string $viewPermission = 'customers.manage';

    protected static ?string $managePermission = 'customers.manage';

    protected static ?string $model = User::class;

    protected static ?string $modelLabel = 'cliente';

    protected static ?string $pluralModelLabel = 'clientes';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->whereHas('roles', fn (Builder $query): Builder => $query->where('name', 'customer'));
    }

    public static function form(Schema $schema): Schema
    {
        return $schema->components([TextInput::make('name')->label('Nombre')->required(), TextInput::make('email')->label('Correo')->email()->required()->unique(ignoreRecord: true), TextInput::make('phone')->label('Teléfono'), Toggle::make('is_active')->label('Activo')]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([TextColumn::make('name')->label('Nombre')->searchable(), TextColumn::make('email')->label('Correo')->searchable(), TextColumn::make('phone')->label('Teléfono'), TextColumn::make('orders_count')->counts('orders')->label('Pedidos'), IconColumn::make('is_active')->label('Activo')->boolean(), TextColumn::make('created_at')->label('Registro')->date('d/m/Y')])->recordActions([EditAction::make()]);
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function getPages(): array
    {
        return ['index' => Pages\ListCustomers::route('/'), 'edit' => Pages\EditCustomer::route('/{record}/edit')];
    }
}
