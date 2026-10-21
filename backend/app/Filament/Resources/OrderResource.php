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
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Carbon;

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
            TextInput::make('sales_channel')->label('Canal de venta')->disabled(),
            TextInput::make('sold_on')->label('Fecha comercial de la venta')->disabled()->dehydrated(false)->formatStateUsing(fn ($state): string => $state ? Carbon::parse($state)->format('d/m/Y') : 'Anterior: consultar fecha de registro'),
            Toggle::make('is_historical')->label('Regularización histórica: sin stock ni caja actual')->disabled()->dehydrated(false),
            TextInput::make('cash_shift_id')->label('Turno de caja')->disabled()->dehydrated(false),
            Textarea::make('historical_reason')->label('Motivo del registro tardío')->disabled()->dehydrated(false),
            Toggle::make('payment_proof_missing')->label('El vendedor declaró: no se tomó imagen del pago')->disabled()->dehydrated(false),
            TextInput::make('sale_reference')->label('Comprobante presencial')->disabled(),
            Select::make('order_status_id')->relationship('status', 'name')->label('Estado')->required(),
            TextInput::make('customer_name')->label('Cliente')->disabled(),
            TextInput::make('customer_email')->label('Correo')->disabled(),
            TextInput::make('customer_phone')->label('Teléfono')->disabled(),
            TextInput::make('customer_document_number')->label('DNI')->disabled(),
            TextInput::make('fulfillment_type')->label('Modalidad')->disabled()
                ->formatStateUsing(fn (string $state): string => $state === 'pickup' ? 'Recojo en local o feria' : 'Entrega a domicilio'),
            TextInput::make('subtotal_amount')->label('Subtotal')->disabled()->formatStateUsing(fn (int $state): string => 'S/ '.number_format($state / 100, 2)),
            TextInput::make('discount_amount')->label('Descuento')->disabled()->formatStateUsing(fn (int $state): string => 'S/ '.number_format($state / 100, 2)),
            TextInput::make('pos_discount_type')->label('Tipo de descuento en caja')->disabled()->dehydrated(false)
                ->formatStateUsing(fn (?string $state): string => $state === 'percentage' ? 'Porcentaje' : ($state === 'amount' ? 'Monto en soles' : 'Anterior / web')),
            TextInput::make('pos_discount_basis_points')->label('Porcentaje aplicado')->disabled()->dehydrated(false)
                ->formatStateUsing(fn (?int $state): string => $state === null ? '—' : number_format($state / 100, 2).' %'),
            TextInput::make('delivery_amount')->label('Envío')->disabled()->formatStateUsing(fn (int $state): string => 'S/ '.number_format($state / 100, 2)),
            TextInput::make('total_amount')->label('Total')->disabled()->formatStateUsing(fn (int $state): string => 'S/ '.number_format($state / 100, 2)),
            KeyValue::make('delivery_address')->label('Dirección de entrega')->disabled()->dehydrated(false)->columnSpanFull(),
            KeyValue::make('pickup_location_snapshot')->label('Punto de recojo')->disabled()->dehydrated(false)->columnSpanFull(),
            Repeater::make('items')->relationship()->label('Productos comprados')->schema([
                TextInput::make('product_name')->label('Producto')->disabled(),
                TextInput::make('variant_name')->label('Variante')->disabled(),
                TextInput::make('sku')->label('SKU')->disabled(),
                TextInput::make('quantity')->label('Cantidad')->disabled(),
                TextInput::make('returned_quantity')->label('Devuelto')->disabled(),
                TextInput::make('unit_price_amount')->label('Precio unitario')->disabled()->formatStateUsing(fn (int $state): string => 'S/ '.number_format($state / 100, 2)),
                TextInput::make('line_total_amount')->label('Total')->disabled()->formatStateUsing(fn (int $state): string => 'S/ '.number_format($state / 100, 2)),
            ])->columns(3)->disabled()->dehydrated(false)->addable(false)->deletable(false)->reorderable(false)->columnSpanFull(),
            Repeater::make('posPayments')->relationship()->label('Desglose de pagos recibidos en caja')->schema([
                Select::make('payment_method_id')->relationship('paymentMethod', 'name')->label('Medio de pago')->disabled(),
                TextInput::make('amount')->label('Importe')->disabled()->formatStateUsing(fn (int $state): string => 'S/ '.number_format($state / 100, 2)),
                TextInput::make('cash_received_amount')->label('Efectivo recibido')->disabled()->formatStateUsing(fn (?int $state): string => $state === null ? 'Sin registro' : 'S/ '.number_format($state / 100, 2)),
                TextInput::make('change_amount')->label('Vuelto entregado')->disabled()->formatStateUsing(fn (?int $state): string => $state === null ? 'Sin registro' : 'S/ '.number_format($state / 100, 2)),
                Toggle::make('proof_missing')->label('No se tomó imagen')->disabled(),
                FileUpload::make('proof_path')->label('Constancia de este pago')->disk('local')->openable()->downloadable()->disabled()->dehydrated(false),
            ])->columns(2)->disabled()->dehydrated(false)->addable(false)->deletable(false)->reorderable(false)->columnSpanFull(),
            FileUpload::make('payment_proof_path')
                ->label('Constancia de pago')
                ->disk(fn (?Order $record): string => $record->payment_proof_disk ?? 'public')
                ->openable()
                ->downloadable()
                ->previewable()
                ->disabled()
                ->dehydrated(false)
                ->columnSpanFull(),
            Textarea::make('customer_note')->label('Nota del cliente')->disabled()->columnSpanFull(),
            KeyValue::make('marketing_attribution')->label('Origen de marketing')->disabled()->dehydrated(false)
                ->helperText('Campaña UTM que originó el pedido, si estuvo disponible.')->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('number')->label('Número')->searchable()->copyable()->limit(12),
            TextColumn::make('created_at')->label('Fecha')->dateTime('d/m/Y H:i')->sortable(),
            TextColumn::make('customer_name')->label('Cliente')->searchable(),
            TextColumn::make('sales_channel')->label('Canal')->badge()->formatStateUsing(fn (string $state): string => $state === 'pos' ? 'Presencial' : 'Web'),
            TextColumn::make('sold_on')->label('Fecha comercial')->date('d/m/Y')->sortable()->placeholder('Anterior / web'),
            TextColumn::make('is_historical')->label('Registro')->formatStateUsing(fn (bool $state): string => $state ? 'Histórico sin stock' : 'Normal'),
            TextColumn::make('cash_shift_id')->label('Turno')->placeholder('—'),
            TextColumn::make('sale_reference')->label('Comprobante')->searchable(),
            TextColumn::make('status.name')->label('Estado')->badge(),
            TextColumn::make('paymentMethod.name')->label('Pago principal / anterior'),
            TextColumn::make('posPayments.paymentMethod.name')->label('Desglose de medios')->listWithLineBreaks()->placeholder('Pago único anterior / web'),
            TextColumn::make('fulfillment_type')->label('Entrega')->badge()
                ->formatStateUsing(fn (string $state): string => $state === 'pickup' ? 'Recojo' : 'Domicilio'),
            TextColumn::make('marketing_attribution.utm_source')->label('Origen')->placeholder('Directo'),
            TextColumn::make('marketing_attribution.utm_campaign')->label('Campaña')->toggleable(isToggledHiddenByDefault: true),
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
