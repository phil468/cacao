<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PushCampaignResource\Pages;
use App\Jobs\SendPushCampaign;
use App\Models\PushCampaign;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

class PushCampaignResource extends AdminResource
{
    protected static ?string $viewPermission = 'content.manage';

    protected static ?string $managePermission = 'content.manage';

    protected static ?string $model = PushCampaign::class;

    protected static ?string $modelLabel = 'campaña push';

    protected static ?string $pluralModelLabel = 'campañas push';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('title')->label('Título')->required()->maxLength(120),
            Textarea::make('body')->label('Mensaje')->required()->maxLength(500)->columnSpanFull(),
            TextInput::make('route')->label('Ruta en la app')->default('/catalog')->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('title')->label('Título')->searchable(),
            TextColumn::make('sent_at')->label('Enviada')->dateTime('d/m/Y H:i')->placeholder('Pendiente'),
            TextColumn::make('created_at')->label('Creada')->dateTime('d/m/Y H:i'),
        ])->recordActions([
            Action::make('send')->label('Enviar')->requiresConfirmation()->visible(fn (PushCampaign $record): bool => $record->sent_at === null)->action(function (PushCampaign $record): void {
                $record->update(['created_by' => Auth::id()]);
                SendPushCampaign::dispatch($record->id);
            }),
            EditAction::make(),
        ]);
    }

    public static function getPages(): array
    {
        return ['index' => Pages\ListPushCampaigns::route('/'), 'create' => Pages\CreatePushCampaign::route('/create'), 'edit' => Pages\EditPushCampaign::route('/{record}/edit')];
    }
}
