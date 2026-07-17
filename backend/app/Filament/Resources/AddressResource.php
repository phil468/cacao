<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AddressResource\Pages;
use App\Models\Address;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class AddressResource extends AdminResource
{
    protected static ?string $viewPermission = 'customers.manage';

    protected static ?string $managePermission = 'customers.manage';

    protected static ?string $model = Address::class;

    protected static ?string $modelLabel = 'dirección';

    protected static ?string $pluralModelLabel = 'direcciones';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Select::make('user_id')->relationship('user', 'name')->label('Cliente')->required()->searchable()->preload(),
            TextInput::make('label')->label('Etiqueta')->required(),
            TextInput::make('recipient_name')->label('Destinatario')->required(),
            TextInput::make('phone')->label('Teléfono')->required(),
            TextInput::make('line_one')->label('Dirección')->required()->columnSpanFull(),
            TextInput::make('line_two')->label('Interior / complemento')->columnSpanFull(),
            TextInput::make('district')->label('Distrito')->required(),
            TextInput::make('province')->label('Provincia')->required(),
            TextInput::make('department')->label('Departamento')->required(),
            Textarea::make('reference')->label('Referencia')->columnSpanFull(),
            Toggle::make('is_default')->label('Predeterminada'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('user.name')->label('Cliente')->searchable(),
            TextColumn::make('label')->label('Etiqueta'),
            TextColumn::make('line_one')->label('Dirección')->limit(45)->searchable(),
            TextColumn::make('district')->label('Distrito')->searchable(),
            IconColumn::make('is_default')->label('Principal')->boolean(),
        ])->recordActions([EditAction::make()]);
    }

    public static function getPages(): array
    {
        return ['index' => Pages\ListAddresses::route('/'), 'create' => Pages\CreateAddress::route('/create'), 'edit' => Pages\EditAddress::route('/{record}/edit')];
    }
}
