<?php

namespace App\Services;

use App\Models\InventoryMovement;
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
    public function process(Order $order, array $quantitiesByOrderItem, string $reason, ?User $actor = null): OrderReturn
    {
        return DB::transaction(function () use ($order, $quantitiesByOrderItem, $reason, $actor): OrderReturn {
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
            ]);

            foreach ($requested as $itemId => $quantity) {
                $item = $items->get($itemId);
                $variant = ProductVariant::withTrashed()->lockForUpdate()->find($item->product_variant_id);
                if (! $variant) {
                    throw ValidationException::withMessages(['items' => "No se encontró la variante {$item->sku}."]);
                }

                $return->items()->create(['order_item_id' => $item->id, 'quantity' => $quantity]);
                $item->increment('returned_quantity', $quantity);
                $variant->increment('stock', $quantity);
                $variant->refresh();

                InventoryMovement::create([
                    'product_variant_id' => $variant->id,
                    'order_id' => $lockedOrder->id,
                    'order_return_id' => $return->id,
                    'actor_id' => $actor?->id,
                    'type' => 'customer_return',
                    'quantity_delta' => $quantity,
                    'balance_after' => $variant->stock,
                    'reason' => $reason,
                ]);
            }

            return $return->load('items.orderItem', 'actor');
        }, 5);
    }
}
