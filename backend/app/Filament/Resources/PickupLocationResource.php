<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PickupLocationResource\Pages;
use App\Models\PickupLocation;
use App\Support\IcaDistricts;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PickupLocationResource extends AdminResource
{
    protected static ?string $viewPermission = 'settings.manage';

    protected static ?string $managePermission = 'settings.manage';

    protected static ?string $model = PickupLocation::class;

    protected static ?string $modelLabel = 'punto de recojo';

    protected static ?string $pluralModelLabel = 'puntos de recojo';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('name')->label('Nombre del local o feria')->required()->maxLength(255),
            TextInput::make('address_line')->label('Dirección')->required()->maxLength(255),
            TextInput::make('reference')->label('Referencia')->maxLength(255),
            Select::make('district')->label('Distrito')->options(collect(IcaDistricts::all())->mapWithKeys(fn (string $district): array => [$district => $district])->all())->searchable()->required(),
            TextInput::make('province')->label('Provincia')->default('Ica')->required(),
            TextInput::make('department')->label('Departamento')->default('Ica')->required(),
            DateTimePicker::make('starts_at')->label('Disponible desde')->seconds(false)->native(false),
            DateTimePicker::make('ends_at')->label('Disponible hasta')->seconds(false)->native(false)->after('starts_at'),
            TextInput::make('latitude')->label('Latitud')->numeric(),
            TextInput::make('longitude')->label('Longitud')->numeric(),
            Textarea::make('instructions')->label('Indicaciones para el recojo')->columnSpanFull(),
            Toggle::make('is_active')->label('Activo')->default(true),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('name')->label('Local o feria')->searchable(),
            TextColumn::make('district')->label('Distrito'),
            TextColumn::make('starts_at')->label('Desde')->dateTime('d/m/Y H:i'),
            TextColumn::make('ends_at')->label('Hasta')->dateTime('d/m/Y H:i'),
            IconColumn::make('is_active')->label('Activo')->boolean(),
        ])->recordActions([EditAction::make()]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPickupLocations::route('/'),
            'create' => Pages\CreatePickupLocation::route('/create'),
            'edit' => Pages\EditPickupLocation::route('/{record}/edit'),
        ];
    }
}
