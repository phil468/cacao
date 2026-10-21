<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PromotionAuditLogResource\Pages\ListPromotionAuditLogs;
use App\Models\PromotionAuditLog;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class PromotionAuditLogResource extends PromotionAdminResource
{
    protected static ?string $model = PromotionAuditLog::class;

    protected static ?string $modelLabel = 'evento de auditoría';

    protected static ?string $pluralModelLabel = 'auditoría de promociones';

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
            TextColumn::make('promotion_id')->label('Promoción'), TextColumn::make('actor_id')->label('Administrador'),
            TextColumn::make('event')->label('Evento')->formatStateUsing(fn (string $state): string => [
                'batch.generated' => 'Lote generado', 'batch.disabled' => 'Lote desactivado', 'code.invalidated' => 'Código invalidado',
                'code.delivered' => 'Entrega registrada', 'batch.exported.csv' => 'Exportación CSV', 'batch.exported.pdf' => 'Exportación PDF',
            ][$state] ?? $state),
            TextColumn::make('context')->label('Detalle')->formatStateUsing(fn ($state): string => is_array($state) ? json_encode($state, JSON_UNESCAPED_UNICODE | JSON_THROW_ON_ERROR) : (string) $state)->wrap(),
            TextColumn::make('created_at')->label('Fecha')->dateTime()->timezone('America/Lima'),
        ])->defaultSort('id', 'desc');
    }

    public static function getPages(): array
    {
        return ['index' => ListPromotionAuditLogs::route('/')];
    }
}
