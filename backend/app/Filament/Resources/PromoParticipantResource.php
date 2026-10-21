<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PromoParticipantResource\Pages;
use App\Models\PromoParticipant;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class PromoParticipantResource extends PromotionAdminResource
{
    protected static ?string $model = PromoParticipant::class;

    protected static ?string $modelLabel = 'participante';

    protected static ?string $pluralModelLabel = 'participantes';

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
            TextColumn::make('promotion.name')->label('Promoción'), TextColumn::make('full_name')->label('Nombre')->searchable(),
            TextColumn::make('email')->label('Correo')->searchable(), TextColumn::make('phone')->label('Celular'),
            TextColumn::make('codes_count')->label('Códigos registrados')->counts(['codes' => fn ($query) => $query->where('status', 'registered')]),
            TextColumn::make('terms_accepted_at')->label('Aceptó términos')->dateTime()->timezone('America/Lima'),
            IconColumn::make('marketing_consent')->label('Consentimiento comercial')->boolean(),
            TextColumn::make('marketing_consent_at')->label('Fecha del consentimiento')->dateTime()->timezone('America/Lima'),
        ])->filters([SelectFilter::make('promotion_id')->label('Promoción')->relationship('promotion', 'name')]);
    }

    public static function getPages(): array
    {
        return ['index' => Pages\ListPromoParticipants::route('/')];
    }
}
