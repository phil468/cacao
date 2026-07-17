<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BannerResource\Pages;
use App\Models\Banner;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class BannerResource extends AdminResource
{
    protected static ?string $viewPermission = 'content.manage';

    protected static ?string $managePermission = 'content.manage';

    protected static ?string $model = Banner::class;

    protected static ?string $modelLabel = 'banner';

    protected static ?string $pluralModelLabel = 'banners';

    public static function form(Schema $s): Schema
    {
        return $s->components([
            TextInput::make('title')->label('Título')->required(),
            Textarea::make('body')->label('Texto'),
            FileUpload::make('image_path')
                ->label('Imagen')
                ->image()
                ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                ->maxSize(8192)
                ->helperText('Formatos JPG, PNG o WebP. Máximo 8 MB. Recomendado: 1920 × 800 px. La imagen se mostrará completa, sin recortes.')
                ->imageEditor()
                ->disk('public')
                ->directory('banners')
                ->required(),
            TextInput::make('button_label')->label('Texto del botón'),
            TextInput::make('button_url')->label('Enlace'),
            DateTimePicker::make('starts_at')->label('Inicio'),
            DateTimePicker::make('ends_at')->label('Fin'),
            TextInput::make('sort_order')->label('Orden')->numeric()->default(0),
            Toggle::make('is_active')->label('Activo'),
        ]);
    }

    public static function table(Table $t): Table
    {
        return $t->columns([ImageColumn::make('image_path')->label('Imagen')->disk('public'), TextColumn::make('title')->label('Título')->searchable(), IconColumn::make('is_active')->label('Activo')->boolean(), TextColumn::make('sort_order')->label('Orden')])->recordActions([EditAction::make(), DeleteAction::make()]);
    }

    public static function getPages(): array
    {
        return ['index' => Pages\ListBanners::route('/'), 'create' => Pages\CreateBanner::route('/create'), 'edit' => Pages\EditBanner::route('/{record}/edit')];
    }
}
