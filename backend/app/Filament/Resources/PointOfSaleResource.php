<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PointOfSaleResource\Pages;
use App\Models\Order;
use App\Models\PaymentMethod;
use App\Models\PickupLocation;
use App\Models\ProductVariant;
use App\Services\PointOfSaleService;
use Filament\Actions\Action;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class PointOfSaleResource extends AdminResource
{
    protected static ?string $model = Order::class;

    protected static ?string $viewPermission = 'orders.manage';

    protected static ?string $managePermission = 'orders.manage';

    protected static ?string $modelLabel = 'venta presencial';

    protected static ?string $pluralModelLabel = 'ventas presenciales';

    /** @return Builder<Order> */
    public static function getEloquentQuery(): Builder
    {
        return Order::query()->where('sales_channel', 'pos');
    }

    public static function canDelete(Model $record): bool
    {
        return false;
    }

    public static function canDeleteAny(): bool
    {
        return false;
    }

    public static function canEdit(Model $record): bool
    {
        return false;
    }

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Hidden::make('pos_submission_id')->default(fn (): string => (string) Str::uuid())->required(),
            Select::make('pickup_location_id')->label('Punto de venta')->options(fn (): array => PickupLocation::available()->pluck('name', 'id')->all())->required(),
            TextInput::make('customer_name')->label('Cliente')->default('Consumidor final')->required()->maxLength(120),
            TextEntry::make('shift_notice')->label('Turno requerido')->state('Antes de registrar una venta de hoy, abre tu turno en /pos. Las ventas anteriores se registran únicamente desde el proceso separado de /pos.')->columnSpanFull(),
            TextInput::make('customer_email')->label('Correo (opcional)')->email()->maxLength(255),
            TextInput::make('customer_phone')->label('Celular (opcional)')->maxLength(30),
            TextInput::make('sale_reference')->label('Número de comprobante')->helperText('Registra el comprobante emitido. Este formulario no emite comprobantes SUNAT.')->maxLength(80),
            Repeater::make('items')->label('Productos')->schema([
                Select::make('variant_id')->label('Producto / presentación')->searchable()->required()->live()
                    ->getSearchResultsUsing(fn (string $search): array => self::variantOptions($search))
                    ->getOptionLabelUsing(fn ($value): ?string => self::variantOptions('', (int) $value)[$value] ?? null),
                TextInput::make('quantity')->label('Cantidad')->integer()->minValue(1)->maxValue(1000)->default(1)->required()->live(debounce: 400),
            ])->minItems(1)->maxItems(100)->defaultItems(1)->columns(2)->columnSpanFull(),
            TextInput::make('discount_amount')->label('Descuento en céntimos')->helperText('100 = S/ 1.00. Precios y total se calculan en el servidor.')->integer()->minValue(0)->default(0)->required()->live(debounce: 400),
            TextEntry::make('sale_total')->label('Resumen de venta')->state(fn (Get $get): string => app(PointOfSaleService::class)->preview((array) ($get('items') ?? []), (int) ($get('discount_amount') ?? 0)))->columnSpanFull(),
            Select::make('payment_method_id')->label('Pago recibido por')->options(fn (): array => PaymentMethod::where('is_active', true)->where('provider', 'manual')->pluck('name', 'id')->all())->required(),
            FileUpload::make('payment_proof_path')->label('Constancia (obligatoria si el método la requiere)')->disk('local')->directory(fn (): string => 'payment-proofs/pos/'.auth()->id())->acceptedFileTypes(['image/jpeg', 'image/png', 'application/pdf'])->maxSize(5120),
            Checkbox::make('payment_confirmed')->label('Confirmo que recibí el pago y entregué los productos')->accepted()->required(),
        ]);
    }

    /** @return array<int, string> */
    private static function variantOptions(string $search, ?int $id = null): array
    {
        return ProductVariant::with('product')->where('is_active', true)->whereHas('product', fn (Builder $query) => $query->where('is_active', true))
            ->when($id, fn (Builder $query) => $query->whereKey($id))
            ->when($search !== '', fn (Builder $query) => $query->where(fn (Builder $query) => $query->where('sku', 'like', '%'.$search.'%')->orWhere('name', 'like', '%'.$search.'%')->orWhereHas('product', fn (Builder $query) => $query->where('name', 'like', '%'.$search.'%'))))
            ->limit(30)->get()->mapWithKeys(fn (ProductVariant $variant): array => [$variant->id => $variant->product->name.' / '.$variant->name.' · S/ '.number_format($variant->currentPriceAmount() / 100, 2).' · stock '.$variant->stock])->all();
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('number')->label('Venta')->searchable()->copyable()->limit(12),
            TextColumn::make('sale_reference')->label('Comprobante')->searchable(),
            TextColumn::make('customer_name')->label('Cliente')->searchable(),
            TextColumn::make('sold_on')->label('Fecha comercial')->date('d/m/Y')->sortable()->placeholder('Anterior'),
            TextColumn::make('is_historical')->label('Registro')->formatStateUsing(fn (bool $state): string => $state ? 'Histórico sin stock' : 'Normal'),
            TextColumn::make('cash_shift_id')->label('Turno')->placeholder('—'),
            TextColumn::make('posPayments.paymentMethod.name')->label('Medios de pago')->listWithLineBreaks()->placeholder('Pago único anterior'),
            TextColumn::make('pickupLocation.name')->label('Punto de venta'),
            TextColumn::make('total_amount')->label('Total')->formatStateUsing(fn (int $state): string => 'S/ '.number_format($state / 100, 2)),
            TextColumn::make('created_at')->label('Fecha')->dateTime('d/m/Y H:i'),
        ])->defaultSort('id', 'desc')->recordActions([Action::make('order')->label('Ver venta / devolución')->url(fn (Order $record): string => OrderResource::getUrl('edit', ['record' => $record]))]);
    }

    public static function getPages(): array
    {
        return ['index' => Pages\ListPointOfSales::route('/'), 'create' => Pages\CreatePointOfSale::route('/create')];
    }
}
