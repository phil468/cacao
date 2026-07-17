<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InventoryMovementResource\Pages;
use App\Models\InventoryMovement;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class InventoryMovementResource extends AdminResource
{
    protected static ?string $viewPermission = 'inventory.manage';

    protected static ?string $managePermission = 'inventory.manage';

    protected static ?string $model = InventoryMovement::class;

    protected static ?string $modelLabel = 'movimiento de inventario';

    protected static ?string $pluralModelLabel = 'movimientos de inventario';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('created_at')->label('Fecha')->dateTime('d/m/Y H:i')->sortable(),
            TextColumn::make('variant.product.name')->label('Producto')->searchable(),
            TextColumn::make('variant.sku')->label('SKU')->searchable(),
            TextColumn::make('type')->label('Tipo')->badge()->formatStateUsing(fn (string $state): string => match ($state) {
                'initial_stock' => 'Stock inicial',
                'sale' => 'Venta',
                'order_cancellation' => 'Cancelación',
                'customer_return' => 'Devolución',
                'manual_adjustment' => 'Ajuste manual',
                default => $state,
            }),
            TextColumn::make('quantity_delta')->label('Variación')->color(fn (int $state): string => $state < 0 ? 'danger' : 'success')->formatStateUsing(fn (int $state): string => ($state > 0 ? '+' : '').$state),
            TextColumn::make('balance_after')->label('Saldo'),
            TextColumn::make('order.number')->label('Pedido')->placeholder('—')->limit(12)->copyable(),
            TextColumn::make('orderReturn.number')->label('Devolución')->placeholder('—')->limit(12)->copyable(),
            TextColumn::make('actor.name')->label('Responsable')->placeholder('Sistema'),
            TextColumn::make('reason')->label('Motivo')->limit(50),
        ])->defaultSort('created_at', 'desc');
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function getPages(): array
    {
        return ['index' => Pages\ListInventoryMovements::route('/')];
    }
}
