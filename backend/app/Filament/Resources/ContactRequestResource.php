<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactRequestResource\Pages;
use App\Models\ContactRequest;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ContactRequestResource extends AdminResource
{
    protected static ?string $viewPermission = 'content.manage';

    protected static ?string $managePermission = 'content.manage';

    protected static ?string $model = ContactRequest::class;

    protected static ?string $modelLabel = 'solicitud de contacto';

    protected static ?string $pluralModelLabel = 'solicitudes de contacto';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('name')->label('Nombre')->disabled(),
            TextInput::make('email')->label('Correo')->disabled(),
            TextInput::make('phone')->label('Teléfono')->disabled(),
            TextInput::make('subject')->label('Asunto')->disabled(),
            Textarea::make('message')->label('Mensaje')->disabled()->columnSpanFull(),
            Select::make('status')->label('Estado')->options(['new' => 'Nueva', 'in_progress' => 'En atención', 'resolved' => 'Resuelta'])->required(),
            Textarea::make('internal_note')->label('Nota interna')->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('name')->label('Nombre')->searchable(),
            TextColumn::make('subject')->label('Asunto')->searchable()->limit(45),
            TextColumn::make('status')->label('Estado')->badge()->formatStateUsing(fn (string $state): string => match ($state) {
                'new' => 'Nueva', 'in_progress' => 'En atención', 'resolved' => 'Resuelta', default => $state
            }),
            TextColumn::make('created_at')->label('Recibida')->dateTime('d/m/Y H:i')->sortable(),
        ])->defaultSort('created_at', 'desc')->recordActions([EditAction::make()]);
    }

    public static function getPages(): array
    {
        return ['index' => Pages\ListContactRequests::route('/'), 'edit' => Pages\EditContactRequest::route('/{record}/edit')];
    }
}
