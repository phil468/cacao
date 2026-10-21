<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InventoryLocationResource\Pages;
use App\Models\InventoryLocation;
use App\Models\LocationStock;
use App\Models\PickupLocation;
use App\Models\ProductVariant;
use App\Services\PosInventoryOperationsService;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Notifications\Notification;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class InventoryLocationResource extends AdminResource
{
    protected static ?string $model = InventoryLocation::class;

    protected static ?string $viewPermission = 'inventory.manage';

    protected static ?string $managePermission = 'inventory.manage';

    protected static ?string $modelLabel = 'ubicación de inventario';

    protected static ?string $pluralModelLabel = 'almacenes y puntos de venta';

    public static function canDelete(Model $record): bool
    {
        return false;
    }

    public static function canDeleteAny(): bool
    {
        return false;
    }

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('code')->label('Código interno')->required()->unique(ignoreRecord: true)->default(fn (): string => 'pos-'.Str::uuid())->disabledOn('edit'),
            TextInput::make('name')->label('Nombre')->required()->maxLength(255),
            Hidden::make('kind')->default('pos'),
            Select::make('pickup_location_id')->label('Punto de recojo / venta')->options(fn (): array => PickupLocation::available()->pluck('name', 'id')->all())->unique(ignoreRecord: true)->required(fn (?InventoryLocation $record): bool => $record?->kind !== 'central')->disabled(fn (?InventoryLocation $record): bool => $record !== null),
            Select::make('sellers')->label('Vendedores autorizados')->relationship('sellers', 'name', modifyQueryUsing: fn (Builder $query) => $query->where('is_active', true)->whereHas('roles', fn (Builder $query) => $query->where('name', 'seller')))->multiple()->preload()->searchable()->visible(fn (?InventoryLocation $record): bool => $record?->kind !== 'central'),
            Toggle::make('is_active')->label('Activa')->default(true)->disabled(fn (?InventoryLocation $record): bool => $record?->kind === 'central'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([TextColumn::make('name')->label('Ubicación')->searchable(), TextColumn::make('kind')->label('Tipo')->formatStateUsing(fn (string $state): string => $state === 'central' ? 'Almacén central' : 'Punto de venta'), TextColumn::make('sellers.name')->label('Vendedores')])->recordActions([
            Action::make('operations')->label('Caja, salidas y cierres')->url('/pos')->visible(fn (InventoryLocation $record): bool => $record->kind === 'pos'),
            Action::make('quarantine')->label('Gestionar cuarentena central')->visible(fn (InventoryLocation $record): bool => static::canManage() && $record->kind === 'central')
                ->modalDescription('Solo unidades no vendibles. Liberar devuelve al stock vendible; merma o devolución al proveedor no descuentan otra vez el stock disponible.')
                ->modalSubmitActionLabel('Confirmar movimiento de cuarentena')
                ->fillForm(function (InventoryLocation $record): array {
                    $variants = ProductVariant::withTrashed()->get()->keyBy('id');

                    return ['submission_id' => (string) Str::uuid(), 'items' => DB::table('quarantine_stocks')->where('inventory_location_id', $record->id)->where('quantity', '>', 0)->get()->map(fn ($row): array => [
                        'variant_id' => $row->product_variant_id, 'label' => $variants[$row->product_variant_id]->sku, 'available' => $row->quantity, 'quantity' => 0,
                    ])->all()];
                })
                ->schema([Hidden::make('submission_id')->required(), Select::make('kind')->label('Destino')->options(['release' => 'Liberar a vendible', 'writeoff' => 'Merma definitiva', 'supplier_return' => 'Devolver al proveedor'])->required(),
                    Repeater::make('items')->label('Unidades en cuarentena')->addable(false)->deletable(false)->reorderable(false)->schema([
                        Hidden::make('variant_id'), TextInput::make('label')->label('SKU')->disabled()->dehydrated(false), TextInput::make('available')->label('En cuarentena')->disabled()->dehydrated(false),
                        TextInput::make('quantity')->label('Cantidad')->required()->integer()->minValue(0)->maxValue(fn (Get $get): int => (int) $get('available')),
                    ])->columns(3), Textarea::make('reason')->label('Motivo')->required()->minLength(5)->maxLength(1000)])
                ->action(function (InventoryLocation $record, array $data): void {
                    $data['items'] = array_values(array_filter($data['items'], fn (array $row): bool => (int) $row['quantity'] > 0));
                    app(PosInventoryOperationsService::class)->record([...$data, 'location_id' => $record->id], auth()->user());
                    Notification::make()->success()->title('Movimiento de cuarentena registrado')->send();
                }),
            EditAction::make(),
            Action::make('transfer')->label('Transferir stock')->visible(fn (InventoryLocation $record): bool => static::canManage() && $record->is_active)
                ->url(fn (InventoryLocation $record): string => static::getUrl('transfer', ['record' => $record])),
            Action::make('balances')->label('Ver saldos')->modalSubmitAction(false)->modalContent(function (InventoryLocation $record) {
                $stocks = LocationStock::where('inventory_location_id', $record->id)->pluck('quantity', 'product_variant_id');
                $rows = ProductVariant::with('product')->orderBy('sku')->get()->map(fn (ProductVariant $variant): array => ['name' => $variant->product->name.' / '.$variant->name, 'sku' => $variant->sku, 'stock' => $record->kind === 'central' ? $variant->stock : (int) ($stocks[$variant->id] ?? 0)]);

                return view('filament.inventory-balances', ['rows' => $rows]);
            }),
        ]);
    }

    public static function getPages(): array
    {
        return ['index' => Pages\ListInventoryLocations::route('/'), 'create' => Pages\CreateInventoryLocation::route('/create'), 'edit' => Pages\EditInventoryLocation::route('/{record}/edit'), 'transfer' => Pages\TransferInventory::route('/{record}/transfer')];
    }
}
