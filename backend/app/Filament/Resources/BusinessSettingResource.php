<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BusinessSettingResource\Pages;
use App\Models\BusinessSetting;
use Filament\Actions\EditAction;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class BusinessSettingResource extends AdminResource
{
    protected static ?string $viewPermission = 'settings.manage';

    protected static ?string $managePermission = 'settings.manage';

    protected static ?string $model = BusinessSetting::class;

    protected static ?string $modelLabel = 'configuración';

    protected static ?string $pluralModelLabel = 'configuración general';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('key')->label('Clave')->required()->unique(ignoreRecord: true)
                ->helperText('Identificador interno en inglés, por ejemplo: business.contact.'),
            KeyValue::make('value')->label('Valores')->keyLabel('Campo')->valueLabel('Valor')
                ->addActionLabel('Agregar valor')->reorderable()->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('key')->label('Clave')->searchable()->sortable(),
            TextColumn::make('updated_at')->label('Última actualización')->dateTime('d/m/Y H:i')->sortable(),
        ])->recordActions([EditAction::make()]);
    }

    public static function getPages(): array
    {
        return ['index' => Pages\ListBusinessSettings::route('/'), 'create' => Pages\CreateBusinessSetting::route('/create'), 'edit' => Pages\EditBusinessSetting::route('/{record}/edit')];
    }
}
