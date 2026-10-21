<?php

namespace App\Filament\Resources\PointOfSaleResource\Pages;

use App\Filament\Resources\PointOfSaleResource;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPointOfSales extends ListRecords
{
    protected static string $resource = PointOfSaleResource::class;

    protected function getHeaderActions(): array
    {
        return [Action::make('pos')->label('Abrir caja móvil')->url('/pos'), CreateAction::make()->label('Formulario anterior')];
    }
}
