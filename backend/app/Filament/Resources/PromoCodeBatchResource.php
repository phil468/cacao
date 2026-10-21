<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PromoCodeBatchResource\Pages;
use App\Models\PromoCodeBatch;
use App\Services\Promotions\PromotionExportService;
use App\Services\Promotions\PromotionService;
use Filament\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class PromoCodeBatchResource extends PromotionAdminResource
{
    protected static ?string $model = PromoCodeBatch::class;

    protected static ?string $modelLabel = 'lote';

    protected static ?string $pluralModelLabel = 'lotes de códigos';

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canEdit(Model $record): bool
    {
        return false;
    }

    public static function form(Schema $schema): Schema
    {
        return $schema;
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('promotion.name')->label('Promoción'), TextColumn::make('name')->label('Lote')->searchable(),
            TextColumn::make('quantity')->label('Cantidad'), TextColumn::make('status')->label('Estado')->badge()->formatStateUsing(fn (string $state): string => $state === 'active' ? 'Activo' : 'Deshabilitado'), TextColumn::make('created_at')->label('Generado')->dateTime()->timezone('America/Lima'),
        ])->filters([SelectFilter::make('promotion_id')->label('Promoción')->relationship('promotion', 'name')])->recordActions([
            Action::make('disable')->label('Desactivar lote')->requiresConfirmation()->modalDescription('Los códigos disponibles se invalidarán. Se conservarán los registros; el lote quedará excluido del universo del sorteo.')
                ->visible(fn (PromoCodeBatch $record): bool => static::canManage() && $record->status === 'active')
                ->action(fn (PromoCodeBatch $record) => app(PromotionService::class)->disableBatch($record, auth()->user())),
            Action::make('csv')->label('Exportar CSV')->visible(fn (): bool => static::canManage())->action(fn (PromoCodeBatch $record) => app(PromotionExportService::class)->csv($record, auth()->user())),
            Action::make('print')->label('Exportar cupones para impresión')->visible(fn (): bool => static::canManage())
                ->schema([Select::make('side')->label('Cara')->options(['front' => 'Frente', 'back' => 'Reverso (espejado para doble cara)'])->default('front')->required(), TextInput::make('part')->label('Parte de impresión')->numeric()->integer()->minValue(1)->default(1)->required()->helperText('Cada parte contiene hasta 150 cupones. Exporta frente y reverso de la misma parte antes de entregar o registrar códigos.')])
                ->action(function (PromoCodeBatch $record, array $data) {
                    $bytes = app(PromotionExportService::class)->pdf($record, auth()->user(), $data['side'], (int) $data['part']);

                    return response()->streamDownload(fn () => print ($bytes), 'cupones-'.$record->id.'-'.$data['part'].'-'.$data['side'].'.pdf', ['Content-Type' => 'application/pdf', 'Cache-Control' => 'private, no-store']);
                }),
        ])->defaultSort('id', 'desc');
    }

    public static function getPages(): array
    {
        return ['index' => Pages\ListPromoCodeBatches::route('/')];
    }
}
