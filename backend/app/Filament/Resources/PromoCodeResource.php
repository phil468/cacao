<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PromoCodeResource\Pages;
use App\Models\Order;
use App\Models\PromoCode;
use App\Services\Promotions\PromotionService;
use Filament\Actions\Action;
use Filament\Actions\BulkAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class PromoCodeResource extends PromotionAdminResource
{
    protected static ?string $model = PromoCode::class;

    protected static ?string $modelLabel = 'código';

    protected static ?string $pluralModelLabel = 'códigos';

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canEdit(Model $record): bool
    {
        return false;
    }

    public static function form(Schema $schema): Schema
    {
        return $schema;
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('code')->label('Código')->searchable()->copyable(), TextColumn::make('promotion.name')->label('Promoción'), TextColumn::make('batch.name')->label('Lote'),
            TextColumn::make('status')->label('Estado')->badge()->formatStateUsing(fn (string $state): string => ['available' => 'Disponible', 'registered' => 'Registrado', 'disabled' => 'Deshabilitado'][$state]),
            TextColumn::make('type')->label('Tipo')->formatStateUsing(fn (): string => 'Físico'),
            TextColumn::make('activation_mode')->label('Habilitación')->badge()->formatStateUsing(fn (string $state): string => ['reserve' => 'Reserva', 'sale' => 'Venta', 'courtesy' => 'Cortesía', 'legacy' => 'Anterior'][$state] ?? $state),
            TextColumn::make('order.number')->label('Pedido')->limit(12), TextColumn::make('generated_at')->label('Generación')->dateTime()->timezone('America/Lima'), TextColumn::make('registered_at')->label('Registro')->dateTime()->timezone('America/Lima'),
        ])->filters([
            SelectFilter::make('promotion_id')->label('Promoción')->relationship('promotion', 'name'),
            SelectFilter::make('batch_id')->label('Lote')->relationship('batch', 'name'),
            SelectFilter::make('status')->label('Estado')->options(['available' => 'Disponible', 'registered' => 'Registrado', 'disabled' => 'Deshabilitado']),
        ])->recordActions([
            Action::make('invalidate')->label('Invalidar por devolución u otro motivo')->requiresConfirmation()
                ->visible(fn (PromoCode $record): bool => static::canManage() && $record->status !== 'disabled')
                ->schema([Textarea::make('reason')->label('Motivo')->required()->minLength(5)->maxLength(1000)])
                ->action(fn (PromoCode $record, array $data) => app(PromotionService::class)->invalidate($record, auth()->user(), $data['reason'])),
            Action::make('deliver')->label('Registrar entrega de código')
                ->visible(fn (PromoCode $record): bool => static::canManage() && ((auth()->user()?->can('orders.view') ?? false) || (auth()->user()?->can('orders.manage') ?? false)) && $record->status === 'available' && $record->order_id === null)
                ->schema([Select::make('order_id')->label('Venta web o presencial en camino o entregada')->searchable()->required()
                    ->options(fn (): array => self::deliveryOptions())
                    ->getSearchResultsUsing(fn (string $search): array => self::deliveryOptions($search))])
                ->action(fn (PromoCode $record, array $data) => app(PromotionService::class)->recordDelivery($record, Order::findOrFail($data['order_id']), auth()->user())),
        ])->toolbarActions([
            BulkAction::make('reserve')->label('Poner en reserva (sin habilitar)')->requiresConfirmation()->deselectRecordsAfterCompletion()
                ->visible(fn (): bool => static::canManage() && (auth()->user()?->hasRole('administrator') ?? false))
                ->schema([Textarea::make('reason')->label('Motivo de reserva')->required()->minLength(5)->maxLength(500)])
                ->action(fn ($records, array $data) => app(PromotionService::class)->reserveCodes($records->modelKeys(), auth()->user(), $data['reason'])),
            BulkAction::make('courtesy')->label('Habilitar cortesías sin venta')->requiresConfirmation()->deselectRecordsAfterCompletion()
                ->visible(fn (): bool => static::canManage() && (auth()->user()?->hasRole('administrator') ?? false))
                ->schema([Textarea::make('reason')->label('Motivo de la entrega libre')->required()->minLength(5)->maxLength(500)])
                ->action(fn ($records, array $data) => app(PromotionService::class)->enableCourtesy($records->modelKeys(), auth()->user(), $data['reason'])),
        ])->defaultSort('id', 'desc');
    }

    public static function getPages(): array
    {
        return ['index' => Pages\ListPromoCodes::route('/')];
    }

    /** @return array<int, string> */
    private static function deliveryOptions(string $search = ''): array
    {
        return Order::whereHas('status', fn ($query) => $query->whereIn('code', ['shipped', 'delivered']))
            ->whereDoesntHave('returns')->when($search !== '', fn ($query) => $query->where(fn ($query) => $query->where('number', 'like', '%'.$search.'%')->orWhere('sale_reference', 'like', '%'.$search.'%')))
            ->latest('id')->limit(20)->get()->mapWithKeys(fn (Order $order): array => [$order->id => ($order->sales_channel === 'pos' ? 'Presencial' : 'Web').' · '.($order->sale_reference ?: $order->number).' · S/ '.number_format($order->total_amount / 100, 2)])->all();
    }
}
