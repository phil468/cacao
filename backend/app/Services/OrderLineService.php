<?php

namespace App\Services;

use App\Models\InventoryLocation;
use App\Models\Order;
use App\Models\ProductVariant;
use App\Models\User;
use Symfony\Component\HttpKernel\Exception\ConflictHttpException;

class OrderLineService
{
    /** @param array<int, array{variant_id: int, quantity: int}> $items
     * @return list<array{ProductVariant, int, int, int}>
     */
    public function prepare(array $items, ?InventoryLocation $location = null): array
    {
        $variants = ProductVariant::with('product')->whereIn('id', array_column($items, 'variant_id'))->orderBy('id')->lockForUpdate()->get()->keyBy('id');
        $quantities = [];
        foreach ($items as $item) {
            $quantities[$item['variant_id']] = ($quantities[$item['variant_id']] ?? 0) + $item['quantity'];
        }
        $lines = [];
        foreach ($quantities as $id => $quantity) {
            $variant = $variants->get($id);
            $stock = $variant ? app(LocationInventoryService::class)->balance($variant, $location ?? app(LocationInventoryService::class)->central()) : 0;
            if (! $variant || ! $variant->is_active || ! $variant->product->is_active || $quantity < 1 || $stock < $quantity) {
                throw new ConflictHttpException('Uno de los productos no tiene stock suficiente.');
            }
            $price = $variant->currentPriceAmount();
            $lines[] = [$variant, $quantity, $price, $price * $quantity];
        }

        return $lines;
    }

    /** @param array<int, array{variant_id: int, quantity: int, unit_price_amount: int}> $items
     * @return list<array{ProductVariant, int, int, int}>
     */
    public function prepareHistorical(array $items): array
    {
        $variants = ProductVariant::withTrashed()->with(['product' => fn ($query) => $query->withTrashed()])->whereIn('id', array_column($items, 'variant_id'))->orderBy('id')->lockForUpdate()->get()->keyBy('id');
        $lines = [];
        foreach ($items as $item) {
            $variant = $variants->get($item['variant_id']);
            if (! $variant) {
                throw new ConflictHttpException('La presentación histórica no está disponible.');
            }
            $price = (int) $item['unit_price_amount'];
            $quantity = (int) $item['quantity'];
            $lines[] = [$variant, $quantity, $price, $price * $quantity];
        }

        return $lines;
    }

    /** @param list<array{ProductVariant, int, int, int}> $lines */
    public function commit(Order $order, array $lines, User $actor, bool $moveStock = true): void
    {
        $inventory = app(LocationInventoryService::class);
        $location = $order->inventory_location_id ? InventoryLocation::findOrFail($order->inventory_location_id) : $inventory->central();
        if (! $order->inventory_location_id) {
            $order->update(['inventory_location_id' => $location->id]);
        }
        foreach ($lines as [$variant, $quantity, $unitPrice, $lineTotal]) {
            $order->items()->create(['product_variant_id' => $variant->id, 'product_name' => $variant->product->name,
                'variant_name' => $variant->name, 'sku' => $variant->sku, 'description' => $variant->product->short_description,
                'unit_price_amount' => $unitPrice, 'quantity' => $quantity, 'line_total_amount' => $lineTotal]);
            if ($moveStock) {
                $inventory->change($variant, $location, -$quantity, ['order_id' => $order->id, 'actor_id' => $actor->id,
                    'type' => 'sale', 'reason' => 'Order '.$order->number]);
            }
        }
    }
}
