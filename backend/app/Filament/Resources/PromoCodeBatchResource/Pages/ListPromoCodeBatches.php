<?php

namespace App\Filament\Resources\PromoCodeBatchResource\Pages;

use App\Filament\Resources\PromoCodeBatchResource;
use App\Models\Promotion;
use App\Services\Promotions\PromotionService;
use Filament\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;

class ListPromoCodeBatches extends ListRecords
{
    protected static string $resource = PromoCodeBatchResource::class;

    protected function getHeaderActions(): array
    {
        return [Action::make('generate')->label('Generar lote de códigos')->modalSubmitActionLabel('GENERAR CÓDIGOS')
            ->visible(fn (): bool => auth()->user()?->can('promotions.manage') ?? false)
            ->schema([
                Select::make('promotion_id')->label('Promoción')->options(fn (): array => Promotion::pluck('name', 'id')->all())->required(),
                TextInput::make('name')->label('Nombre del lote')->required()->maxLength(120),
                TextInput::make('quantity')->label('Cantidad')->numeric()->integer()->minValue(1)->maxValue(5000)->required()->helperText('Hasta 5000 códigos. El PDF se descarga en partes de 150 cupones.'),
            ])->action(function (array $data): void {
                app(PromotionService::class)->generateBatch(Promotion::findOrFail($data['promotion_id']), $data['name'], (int) $data['quantity'], auth()->user());
                Notification::make()->title('Lote generado')->success()->send();
            })];
    }
}
