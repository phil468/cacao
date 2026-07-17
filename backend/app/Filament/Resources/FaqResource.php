<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FaqResource\Pages;
use App\Models\Faq;
use Filament\Actions\EditAction;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class FaqResource extends AdminResource
{
    protected static ?string $viewPermission = 'content.manage';

    protected static ?string $managePermission = 'content.manage';

    protected static ?string $model = Faq::class;

    protected static ?string $modelLabel = 'pregunta frecuente';

    protected static ?string $pluralModelLabel = 'preguntas frecuentes';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('question')->label('Pregunta')->required()->maxLength(255),
            RichEditor::make('answer')->label('Respuesta')->required()->columnSpanFull(),
            TextInput::make('sort_order')->label('Orden')->numeric()->default(0)->required(),
            Toggle::make('is_active')->label('Activa')->default(true),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('question')->label('Pregunta')->searchable()->wrap(),
            TextColumn::make('sort_order')->label('Orden')->sortable(),
            IconColumn::make('is_active')->label('Activa')->boolean(),
        ])->defaultSort('sort_order')->recordActions([EditAction::make()]);
    }

    public static function getPages(): array
    {
        return ['index' => Pages\ListFaqs::route('/'), 'create' => Pages\CreateFaq::route('/create'), 'edit' => Pages\EditFaq::route('/{record}/edit')];
    }
}
