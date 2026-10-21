<?php

namespace App\Services;

use App\Models\InventoryLocation;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderReturn;
use App\Models\ProductVariant;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class OrderReturnService
{
    /**
     * @param  array<int, int>  $quantitiesByOrderItem
     */
    public function process(Order $order, array $quantitiesByOrderItem, string $reason, ?User $actor = null, bool $damaged = false): OrderReturn
    {
        if ($damaged) {
            abort_unless($actor?->is_active && $actor->can('orders.manage'), 403);
        }

        return DB::transaction(function () use ($order, $quantitiesByOrderItem, $reason, $actor, $damaged): OrderReturn {
            $lockedOrder = Order::with('status')->lockForUpdate()->findOrFail($order->id);
            if (! in_array($lockedOrder->status->code, ['shipped', 'delivered'], true)) {
                throw ValidationException::withMessages([
                    'items' => 'Solo se pueden registrar devoluciones de pedidos en camino o entregados.',
                ]);
            }

            $reason = trim($reason);
            if ($reason === '') {
                throw ValidationException::withMessages(['reason' => 'Indica el motivo de la devolución.']);
            }

            $requested = collect($quantitiesByOrderItem)
                ->mapWithKeys(fn (mixed $quantity, mixed $itemId): array => [(int) $itemId => (int) $quantity])
                ->filter(fn (int $quantity): bool => $quantity > 0);
            if ($requested->isEmpty()) {
                throw ValidationException::withMessages(['items' => 'Indica al menos una unidad para devolver.']);
            }

            $items = OrderItem::where('order_id', $lockedOrder->id)
                ->whereIn('id', $requested->keys())
                ->lockForUpdate()
                ->get()
                ->keyBy('id');
            if ($items->count() !== $requested->count()) {
                throw ValidationException::withMessages(['items' => 'Uno de los productos no pertenece al pedido.']);
            }

            foreach ($requested as $itemId => $quantity) {
                $item = $items->get($itemId);
                $availableToReturn = $item->quantity - $item->returned_quantity;
                if ($quantity > $availableToReturn) {
                    throw ValidationException::withMessages([
                        'items' => "La cantidad devuelta de {$item->product_name} - {$item->variant_name} supera las {$availableToReturn} unidades disponibles.",
                    ]);
                }
                if ($item->product_variant_id === null) {
                    throw ValidationException::withMessages([
                        'items' => "La variante histórica {$item->sku} ya no existe y requiere un ajuste manual.",
                    ]);
                }
            }

            $return = OrderReturn::create([
                'number' => (string) Str::uuid(),
                'order_id' => $lockedOrder->id,
                'actor_id' => $actor?->id,
                'reason' => $reason,
                'inventory_disposition' => $lockedOrder->is_historical ? 'historical_no_stock' : ($damaged ? 'quarantine' : 'available'),
            ]);

            foreach ($requested as $itemId => $quantity) {
                $item = $items->get($itemId);
                $variant = ProductVariant::withTrashed()->lockForUpdate()->find($item->product_variant_id);
                if (! $variant) {
                    throw ValidationException::withMessages(['items' => "No se encontró la variante {$item->sku}."]);
                }

                $return->items()->create(['order_item_id' => $item->id, 'quantity' => $quantity]);
                $item->increment('returned_quantity', $quantity);
                if ($lockedOrder->is_historical) {
                    continue;
                }
                $inventory = app(LocationInventoryService::class);
                $location = $lockedOrder->inventory_location_id ? InventoryLocation::findOrFail($lockedOrder->inventory_location_id) : $inventory->central();
                if ($damaged) {
                    app(PosInventoryOperationsService::class)->quarantine($location->id, $variant->id, $quantity);
                }
                $inventory->change($variant, $location, $damaged ? 0 : $quantity, [
                    'order_id' => $lockedOrder->id,
                    'order_return_id' => $return->id,
                    'actor_id' => $actor?->id,
                    'type' => $damaged ? 'damaged_return' : 'customer_return',
                    'quarantine_delta' => $damaged ? $quantity : 0,
                    'reason' => $reason,
                ]);
            }

            return $return->load('items.orderItem', 'actor');
        }, 5);
    }
}
