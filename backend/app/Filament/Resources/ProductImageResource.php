<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductImageResource\Pages;
use App\Models\ProductImage;
use App\Models\ProductVariant;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProductImageResource extends AdminResource
{
    protected static ?string $viewPermission = 'catalog.view';

    protected static ?string $managePermission = 'catalog.manage';

    protected static ?string $model = ProductImage::class;

    protected static ?string $modelLabel = 'imagen';

    protected static ?string $pluralModelLabel = 'imágenes de producto';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Select::make('product_id')->relationship('product', 'name')->label('Producto')->required()->searchable()->preload()->live()
                ->afterStateUpdated(fn (Set $set) => $set('product_variant_id', null)),
            Select::make('product_variant_id')->label('Variante')
                ->options(fn (Get $get): array => ProductVariant::query()->where('product_id', $get('product_id'))->orderBy('name')->pluck('name', 'id')->all())
                ->searchable()->preload()->disabled(fn (Get $get): bool => blank($get('product_id')))
                ->helperText('Opcional. Solo se muestran las variantes del producto seleccionado. Déjalo vacío para una imagen general de la colección.'),
            FileUpload::make('path')->label('Imagen')->image()->imageEditor()->disk('public')->directory('products')->visibility('public')->required(),
            TextInput::make('alt_text')->label('Texto alternativo')->maxLength(255),
            TextInput::make('sort_order')->label('Orden')->numeric()->default(0),
            Toggle::make('is_primary')->label('Imagen principal'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([ImageColumn::make('path')->label('Imagen')->disk('public')->square(), TextColumn::make('product.name')->label('Producto')->searchable(), TextColumn::make('variant.name')->label('Variante')->placeholder('Todas'), IconColumn::make('is_primary')->label('Principal')->boolean(), TextColumn::make('sort_order')->label('Orden')])->recordActions([EditAction::make()])->toolbarActions([BulkActionGroup::make([DeleteBulkAction::make()])]);
    }

    public static function getPages(): array
    {
        return ['index' => Pages\ListProductImages::route('/'), 'create' => Pages\CreateProductImage::route('/create'), 'edit' => Pages\EditProductImage::route('/{record}/edit')];
    }
}
