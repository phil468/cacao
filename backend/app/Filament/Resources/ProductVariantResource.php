<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductVariantResource\Pages;
use App\Models\ProductVariant;
use App\Services\CentralStockAdjustmentService;
use Filament\Actions\Action;
use Filament\Actions\BulkAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Notifications\Notification;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Collection;

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
            TextInput::make('barcode')->label('Código de barras / QR de producto')->unique(ignoreRecord: true)->maxLength(100)->helperText('Valor exacto leído por el escáner. El SKU también puede escanearse.'),
            TextInput::make('cacao_percentage')->label('Porcentaje de cacao')->numeric()->minValue(0)->maxValue(100)->suffix('%'),
            TextInput::make('weight_grams')->label('Peso')->numeric()->required()->minValue(1)->suffix('g'),
            TextInput::make('cost_amount')->label('Precio de compra (céntimos)')->numeric()->minValue(0)->helperText('Ejemplo: S/ 4.50 se registra como 450.'),
            TextInput::make('price_amount')->label('Precio regular (céntimos)')->numeric()->required()->minValue(0)->helperText('Ejemplo: S/ 18.90 se registra como 1890.'),
            TextInput::make('promotional_price_amount')->label('Precio promocional (céntimos)')->numeric()->minValue(0)->lt('price_amount'),
            TextInput::make('stock')->label('Stock del almacén central')->numeric()->integer()->required()->minValue(0),
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
            TextColumn::make('stock')->label('Stock central')->badge()->color(fn (ProductVariant $record): string => $record->stock <= $record->low_stock_threshold ? 'danger' : 'success'),
            IconColumn::make('is_active')->label('Activa')->boolean(),
        ])->recordActions([
            Action::make('adjustStock')->label('Ajustar stock')->icon('heroicon-o-adjustments-horizontal')
                ->visible(fn (): bool => auth()->user()?->can('inventory.manage') ?? false)
                ->modalHeading('Ajustar stock del almacén central')
                ->modalDescription('Ingresa el saldo final, no la cantidad a sumar. No modifica los puntos de venta. Para trasladar existencias usa Transferir stock.')
                ->modalSubmitActionLabel('Confirmar ajuste')
                ->fillForm(fn (ProductVariant $record): array => ['items' => self::stockRows(new Collection([$record]))])
                ->schema(self::stockAdjustmentSchema())
                ->action(function (ProductVariant $record, array $data): void {
                    self::saveStockAdjustment($data, [$record->id]);
                }),
            EditAction::make(),
        ])->toolbarActions([
            BulkAction::make('adjustStocks')->label('Ajustar stock central de seleccionadas')
                ->visible(fn (): bool => auth()->user()?->can('inventory.manage') ?? false)
                ->modalHeading('Ajustar varios saldos del almacén central')
                ->modalDescription('Revisa el saldo actual y escribe el saldo final de cada variante. Máximo 100. Se guardan todas juntas o ninguna; los puntos de venta no cambian.')
                ->modalSubmitActionLabel('Confirmar ajustes')->deselectRecordsAfterCompletion()
                ->fillForm(fn (Collection $records): array => ['items' => self::stockRows($records)])
                ->schema(self::stockAdjustmentSchema())
                ->action(function (Collection $records, array $data): void {
                    self::saveStockAdjustment($data, $records->modelKeys());
                }),
            BulkActionGroup::make([DeleteBulkAction::make()]),
        ]);
    }

    /** @param Collection<int, ProductVariant> $records
     * @return array<int, array<string, mixed>>
     */
    private static function stockRows(Collection $records): array
    {
        return $records->map(fn (ProductVariant $record): array => [
            'id' => $record->id, 'label' => $record->sku.' · '.$record->name,
            'expected_stock' => $record->stock, 'stock' => $record->stock,
        ])->all();
    }

    /** @return array<Component> */
    private static function stockAdjustmentSchema(): array
    {
        return [
            Repeater::make('items')->label('Saldos finales')->addable(false)->deletable(false)->reorderable(false)->minItems(1)->maxItems(100)->schema([
                Hidden::make('id')->required(),
                TextInput::make('label')->label('Variante / SKU')->disabled()->dehydrated(false),
                TextInput::make('expected_stock')->label('Stock actual')->readOnly()->required()->integer()->minValue(0),
                TextInput::make('stock')->label('Nuevo stock central')->required()->numeric()->integer()->minValue(0)->maxValue(1000000),
            ])->columns(3),
            Textarea::make('reason')->label('Motivo del ajuste')->required()->minLength(5)->maxLength(500)
                ->helperText('Queda registrado con tu usuario en los movimientos de inventario.'),
        ];
    }

    /** @param array<string, mixed> $data
     * @param  array<int, int|string>  $allowedIds
     */
    private static function saveStockAdjustment(array $data, array $allowedIds): void
    {
        foreach ($data['items'] ?? [] as $item) {
            abort_unless(in_array((int) ($item['id'] ?? 0), array_map('intval', $allowedIds), true), 403);
        }
        app(CentralStockAdjustmentService::class)->adjust($data, auth()->user());
        Notification::make()->success()->title('Stock central actualizado')->send();
    }

    public static function getPages(): array
    {
        return ['index' => Pages\ListProductVariants::route('/'), 'create' => Pages\CreateProductVariant::route('/create'), 'edit' => Pages\EditProductVariant::route('/{record}/edit')];
    }
}
