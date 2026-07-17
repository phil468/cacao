<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Models\Order;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class OrderResource extends AdminResource
{
    protected static ?string $viewPermission = 'orders.view';

    protected static ?string $managePermission = 'orders.manage';

    protected static ?string $model = Order::class;

    protected static ?string $modelLabel = 'pedido';

    protected static ?string $pluralModelLabel = 'pedidos';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('number')->label('Número')->disabled(),
            Select::make('order_status_id')->relationship('status', 'name')->label('Estado')->required(),
            TextInput::make('customer_name')->label('Cliente')->disabled(),
            TextInput::make('customer_email')->label('Correo')->disabled(),
            TextInput::make('customer_phone')->label('Teléfono')->disabled(),
            TextInput::make('subtotal_amount')->label('Subtotal')->disabled()->formatStateUsing(fn (int $state): string => 'S/ '.number_format($state / 100, 2)),
            TextInput::make('discount_amount')->label('Descuento')->disabled()->formatStateUsing(fn (int $state): string => 'S/ '.number_format($state / 100, 2)),
            TextInput::make('delivery_amount')->label('Envío')->disabled()->formatStateUsing(fn (int $state): string => 'S/ '.number_format($state / 100, 2)),
            TextInput::make('total_amount')->label('Total')->disabled()->formatStateUsing(fn (int $state): string => 'S/ '.number_format($state / 100, 2)),
            KeyValue::make('delivery_address')->label('Dirección de entrega')->disabled()->dehydrated(false)->columnSpanFull(),
            Repeater::make('items')->relationship()->label('Productos comprados')->schema([
                TextInput::make('product_name')->label('Producto')->disabled(),
                TextInput::make('variant_name')->label('Variante')->disabled(),
                TextInput::make('sku')->label('SKU')->disabled(),
                TextInput::make('quantity')->label('Cantidad')->disabled(),
                TextInput::make('returned_quantity')->label('Devuelto')->disabled(),
                TextInput::make('unit_price_amount')->label('Precio unitario')->disabled()->formatStateUsing(fn (int $state): string => 'S/ '.number_format($state / 100, 2)),
                TextInput::make('line_total_amount')->label('Total')->disabled()->formatStateUsing(fn (int $state): string => 'S/ '.number_format($state / 100, 2)),
            ])->columns(3)->disabled()->dehydrated(false)->addable(false)->deletable(false)->reorderable(false)->columnSpanFull(),
            FileUpload::make('payment_proof_path')
                ->label('Constancia de pago')
                ->disk('public')
                ->openable()
                ->downloadable()
                ->previewable()
                ->disabled()
                ->dehydrated(false)
                ->columnSpanFull(),
            Textarea::make('customer_note')->label('Nota del cliente')->disabled()->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('number')->label('Número')->searchable()->copyable()->limit(12),
            TextColumn::make('created_at')->label('Fecha')->dateTime('d/m/Y H:i')->sortable(),
            TextColumn::make('customer_name')->label('Cliente')->searchable(),
            TextColumn::make('status.name')->label('Estado')->badge(),
            TextColumn::make('paymentMethod.name')->label('Pago'),
            TextColumn::make('total_amount')->label('Total')->formatStateUsing(fn (int $state): string => 'S/ '.number_format($state / 100, 2))->sortable(),
        ])->defaultSort('created_at', 'desc')->recordActions([EditAction::make()]);
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function getPages(): array
    {
        return ['index' => Pages\ListOrders::route('/'), 'edit' => Pages\EditOrder::route('/{record}/edit')];
    }
}
