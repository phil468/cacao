<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DeliveryRateResource\Pages;
use App\Models\DeliveryRate;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class DeliveryRateResource extends AdminResource
{
    protected static ?string $viewPermission = 'settings.manage';

    protected static ?string $managePermission = 'settings.manage';

    protected static ?string $model = DeliveryRate::class;

    protected static ?string $modelLabel = 'tarifa de entrega';

    protected static ?string $pluralModelLabel = 'tarifas de entrega';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Select::make('delivery_zone_id')->relationship('deliveryZone', 'name')->label('Zona')->required()->searchable()->preload(),
            TextInput::make('amount')->label('Costo (céntimos)')->numeric()->required()->minValue(0)->helperText('Ejemplo: S/ 12.50 se registra como 1250.'),
            TextInput::make('free_from_amount')->label('Gratis desde (céntimos)')->numeric()->minValue(0),
            Toggle::make('is_active')->label('Activa')->default(true),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('deliveryZone.name')->label('Zona')->searchable(),
            TextColumn::make('amount')->label('Costo')->formatStateUsing(fn (int $state): string => 'S/ '.number_format($state / 100, 2)),
            TextColumn::make('free_from_amount')->label('Gratis desde')->formatStateUsing(fn (?int $state): string => $state === null ? '—' : 'S/ '.number_format($state / 100, 2)),
            IconColumn::make('is_active')->label('Activa')->boolean(),
        ])->recordActions([EditAction::make()]);
    }

    public static function getPages(): array
    {
        return ['index' => Pages\ListDeliveryRates::route('/'), 'create' => Pages\CreateDeliveryRate::route('/create'), 'edit' => Pages\EditDeliveryRate::route('/{record}/edit')];
    }
}
