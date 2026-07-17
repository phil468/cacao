<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductVariantResource\Pages;
use App\Models\ProductVariant;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProductVariantResource extends AdminResource
{
    protected static ?string $viewPermission = 'catalog.view';

    protected static ?string $managePermission = 'catalog.manage';

    protected static ?string $model = ProductVariant::class;

    protected static ?string $modelLabel = 'variante';

    protected static ?string $pluralModelLabel = 'variantes';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Select::make('product_id')->relationship('product', 'name')->label('Producto')->required()->searchable()->preload(),
            TextInput::make('name')->label('Nombre')->required()->maxLength(255),
            TextInput::make('sku')->label('SKU')->required()->unique(ignoreRecord: true)->maxLength(100),
            TextInput::make('cacao_percentage')->label('Porcentaje de cacao')->numeric()->minValue(0)->maxValue(100)->suffix('%'),
            TextInput::make('weight_grams')->label('Peso')->numeric()->required()->minValue(1)->suffix('g'),
            TextInput::make('cost_amount')->label('Precio de compra (céntimos)')->numeric()->minValue(0)->helperText('Ejemplo: S/ 4.50 se registra como 450.'),
            TextInput::make('price_amount')->label('Precio regular (céntimos)')->numeric()->required()->minValue(0)->helperText('Ejemplo: S/ 18.90 se registra como 1890.'),
            TextInput::make('promotional_price_amount')->label('Precio promocional (céntimos)')->numeric()->minValue(0)->lt('price_amount'),
            TextInput::make('stock')->label('Stock')->numeric()->required()->minValue(0),
            Textarea::make('adjustment_reason')->label('Motivo del ajuste de stock')
                ->helperText('Es obligatorio cuando cambias el stock manualmente y quedará en el historial.')
                ->visible(fn (string $operation): bool => $operation === 'edit')
                ->dehydrated(fn (string $operation): bool => $operation === 'edit'),
            TextInput::make('low_stock_threshold')->label('Alerta de stock bajo')->numeric()->required()->minValue(0)->default(5),
            Toggle::make('is_active')->label('Activa')->default(true),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('product.name')->label('Producto')->searchable()->sortable(),
            TextColumn::make('name')->label('Variante')->searchable(),
            TextColumn::make('sku')->label('SKU')->searchable()->copyable(),
            TextColumn::make('cacao_percentage')->label('Cacao')->suffix('%'),
            TextColumn::make('weight_grams')->label('Peso')->suffix(' g'),
            TextColumn::make('cost_amount')->label('Compra')->formatStateUsing(fn (?int $state): string => $state === null ? '—' : 'S/ '.number_format($state / 100, 2)),
            TextColumn::make('price_amount')->label('Precio')->formatStateUsing(fn (int $state): string => 'S/ '.number_format($state / 100, 2)),
            TextColumn::make('stock')->label('Stock')->badge()->color(fn (ProductVariant $record): string => $record->stock <= $record->low_stock_threshold ? 'danger' : 'success'),
            IconColumn::make('is_active')->label('Activa')->boolean(),
        ])->recordActions([EditAction::make()])->toolbarActions([BulkActionGroup::make([DeleteBulkAction::make()])]);
    }

    public static function getPages(): array
    {
        return ['index' => Pages\ListProductVariants::route('/'), 'create' => Pages\CreateProductVariant::route('/create'), 'edit' => Pages\EditProductVariant::route('/{record}/edit')];
    }
}
