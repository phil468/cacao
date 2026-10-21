<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PromotionResource\Pages;
use App\Models\Promotion;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PromotionResource extends PromotionAdminResource
{
    protected static ?string $model = Promotion::class;

    protected static ?string $modelLabel = 'promoción';

    protected static ?string $pluralModelLabel = 'promociones';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('name')->label('Nombre')->required()->maxLength(255),
            TextInput::make('slug')->label('Identificador')->required()->regex('/^[a-z0-9-]+$/')->unique(ignoreRecord: true),
            DateTimePicker::make('starts_at')->label('Inicio (hora de Perú)')->timezone('America/Lima')->required(),
            DateTimePicker::make('ends_at')->label('Cierre de registros (hora de Perú)')->timezone('America/Lima')->required()->after('starts_at'),
            DateTimePicker::make('draw_at')->label('Sorteo (hora de Perú)')->timezone('America/Lima')->required()->afterOrEqual('ends_at'),
            TextInput::make('minimum_amount')->label('Compra mínima (céntimos)')->numeric()->integer()->minValue(1)->default(2000)->required(),
            TextInput::make('amount_per_code')->label('Importe por código (céntimos)')->numeric()->integer()->minValue(1)->default(2000)->required(),
            Textarea::make('terms_content')->label('Términos y Condiciones')->rows(16)->required()->columnSpanFull(),
            Textarea::make('privacy_content')->label('Política de Privacidad')->rows(10)->required()->columnSpanFull(),
            Toggle::make('legal_reviewed')->label('Textos legales revisados y aprobados')->helperText('Completa los datos pendientes antes de habilitar registros.'),
            Toggle::make('is_active')->label('Campaña activa'),
            Toggle::make('retention_hold')->label('Suspender anonimización por reclamo u obligación legal')->helperText('Documenta el motivo y retira esta suspensión cuando ya no sea necesaria. No habilita publicidad.'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([TextColumn::make('name')->label('Nombre'), TextColumn::make('starts_at')->label('Inicio')->dateTime()->timezone('America/Lima'), TextColumn::make('ends_at')->label('Cierre')->dateTime()->timezone('America/Lima'), TextColumn::make('draw_at')->label('Sorteo')->dateTime()->timezone('America/Lima'), IconColumn::make('is_active')->label('Activa')->boolean()])->recordActions([EditAction::make()]);
    }

    public static function getPages(): array
    {
        return ['index' => Pages\ListPromotions::route('/'), 'create' => Pages\CreatePromotion::route('/create'), 'edit' => Pages\EditPromotion::route('/{record}/edit')];
    }
}
