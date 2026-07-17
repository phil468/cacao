<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DeliveryZoneResource\Pages;
use App\Models\DeliveryZone;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class DeliveryZoneResource extends AdminResource
{
    protected static ?string $viewPermission = 'settings.manage';

    protected static ?string $managePermission = 'settings.manage';

    protected static ?string $model = DeliveryZone::class;

    protected static ?string $modelLabel = 'zona de entrega';

    protected static ?string $pluralModelLabel = 'zonas de entrega';

    public static function form(Schema $s): Schema
    {
        return $s->components([TextInput::make('name')->label('Nombre')->required(), TagsInput::make('districts')->label('Distritos')->required(), Toggle::make('is_active')->label('Activa')]);
    }

    public static function table(Table $t): Table
    {
        return $t->columns([TextColumn::make('name')->label('Nombre'), TextColumn::make('districts')->label('Distritos')->formatStateUsing(function (mixed $state): string {
            if (is_array($state)) {
                return implode(', ', $state);
            }

            $decoded = is_string($state) ? json_decode($state, true) : null;

            return is_array($decoded) ? implode(', ', $decoded) : (string) $state;
        })->wrap(), TextColumn::make('rates_count')->counts('rates')->label('Tarifas'), IconColumn::make('is_active')->label('Activa')->boolean()])->recordActions([EditAction::make()]);
    }

    public static function getPages(): array
    {
        return ['index' => Pages\ListDeliveryZones::route('/'), 'create' => Pages\CreateDeliveryZone::route('/create'), 'edit' => Pages\EditDeliveryZone::route('/{record}/edit')];
    }
}
