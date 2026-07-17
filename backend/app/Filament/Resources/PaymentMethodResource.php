<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PaymentMethodResource\Pages;
use App\Models\PaymentMethod;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PaymentMethodResource extends AdminResource
{
    protected static ?string $viewPermission = 'settings.manage';

    protected static ?string $managePermission = 'settings.manage';

    protected static ?string $model = PaymentMethod::class;

    protected static ?string $modelLabel = 'método de pago';

    protected static ?string $pluralModelLabel = 'métodos de pago';

    public static function form(Schema $s): Schema
    {
        return $s->components([
            TextInput::make('code')->label('Código')->required()->unique(ignoreRecord: true),
            TextInput::make('name')->label('Nombre')->required(),
            Textarea::make('instructions')->label('Instrucciones')->columnSpanFull(),
            FileUpload::make('image_path')->label('Imagen o código QR')->image()->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])->maxSize(4096)->disk('public')->directory('payment-methods')->imageEditor()->helperText('Opcional. JPG, PNG o WebP; máximo 4 MB.'),
            Toggle::make('requires_proof')->label('Requiere constancia'),
            Toggle::make('is_active')->label('Activo'),
        ]);
    }

    public static function table(Table $t): Table
    {
        return $t->columns([TextColumn::make('name')->label('Nombre'), TextColumn::make('code')->label('Código'), IconColumn::make('requires_proof')->label('Constancia')->boolean(), IconColumn::make('is_active')->label('Activo')->boolean()])->recordActions([EditAction::make()]);
    }

    public static function getPages(): array
    {
        return ['index' => Pages\ListPaymentMethods::route('/'), 'edit' => Pages\EditPaymentMethod::route('/{record}/edit')];
    }
}
