<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Services\OrderReturnService;
use App\Services\OrderStatusService;
use Filament\Actions\Action;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Filament\Schemas\Components\Utilities\Get;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use LogicException;

class EditOrder extends EditRecord
{
    protected static string $resource = OrderResource::class;

    /** @return array<int, Action> */
    protected function getHeaderActions(): array
    {
        return [
            Action::make('registerReturn')
                ->label('Registrar devolución')
                ->icon('heroicon-o-arrow-uturn-left')
                ->color('warning')
                ->visible(fn (): bool => auth()->user()?->can('orders.manage')
                    && in_array($this->order()->status->code, ['shipped', 'delivered'], true)
                    && $this->order()->items()->whereColumn('returned_quantity', '<', 'quantity')->exists())
                ->fillForm(fn (): array => [
                    'items' => $this->order()->items->map(fn ($item): array => [
                        'order_item_id' => $item->id,
                        'product' => "{$item->product_name} - {$item->variant_name} ({$item->sku})",
                        'available' => $item->quantity - $item->returned_quantity,
                        'quantity' => 0,
                    ])->filter(fn (array $item): bool => $item['available'] > 0)->values()->all(),
                ])
                ->schema([
                    Repeater::make('items')
                        ->label('Productos')
                        ->schema([
                            Hidden::make('order_item_id'),
                            TextInput::make('product')->label('Producto')->disabled()->dehydrated(false)->columnSpan(2),
                            TextInput::make('available')->label('Máximo')->disabled(),
                            TextInput::make('quantity')
                                ->label('Cantidad a devolver')
                                ->numeric()
                                ->integer()
                                ->required()
                                ->minValue(0)
                                ->maxValue(fn (Get $get): int => (int) $get('available')),
                        ])
                        ->columns(4)
                        ->addable(false)
                        ->deletable(false)
                        ->reorderable(false),
                    Textarea::make('reason')->label('Motivo')->required()->maxLength(1000),
                ])
                ->modalHeading('Registrar devolución y reponer stock')
                ->modalDescription('Puedes devolver parcialmente uno o varios productos. Esta operación aumenta el stock y no se puede deshacer.')
                ->action(fn (array $data) => $this->registerReturn($data)),
        ];
    }

    /** @param array<string, mixed> $data */
    private function registerReturn(array $data): void
    {
        $quantities = [];
        foreach ((array) $data['items'] as $item) {
            if (is_array($item)) {
                $quantities[(int) $item['order_item_id']] = (int) $item['quantity'];
            }
        }

        $return = app(OrderReturnService::class)->process($this->order(), $quantities, (string) $data['reason'], Auth::user());
        $this->order()->refresh();
        $this->fillForm();

        Notification::make()
            ->title('Devolución registrada')
            ->body('Se repuso el stock. Código: '.$return->number)
            ->success()
            ->send();
    }

    private function order(): Order
    {
        if (! $this->record instanceof Order) {
            throw new LogicException('The order page received an invalid record.');
        }

        return $this->record;
    }

    /** @param array<string, mixed> $data */
    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        if (! $record instanceof Order) {
            throw new LogicException('The order resource received an invalid record.');
        }

        $targetStatusId = (int) $data['order_status_id'];
        $currentStatusId = (int) $record->getRawOriginal('order_status_id');
        unset($data['order_status_id']);
        $record->setAttribute('order_status_id', $currentStatusId);
        $record->update($data);

        if ($currentStatusId !== $targetStatusId) {
            $target = OrderStatus::findOrFail($targetStatusId);
            app(OrderStatusService::class)->transition($record, $target, Auth::user());
        }

        return $record->refresh();
    }
}
