<?php

namespace App\Services;

use App\Models\InventoryMovement;
use App\Models\ProductVariant;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class CentralStockAdjustmentService
{
    /** @param array<string, mixed> $data */
    public function adjust(array $data, User $actor): void
    {
        abort_unless($actor->is_active && $actor->hasRole('administrator') && $actor->can('inventory.manage'), 403);
        $data['reason'] = trim((string) ($data['reason'] ?? ''));
        $validated = Validator::make($data, [
            'reason' => ['required', 'string', 'min:5', 'max:500'],
            'items' => ['required', 'array', 'min:1', 'max:100'],
            'items.*.id' => ['required', 'integer', 'distinct'],
            'items.*.expected_stock' => ['required', 'integer', 'min:0'],
            'items.*.stock' => ['required', 'integer', 'min:0', 'max:1000000'],
        ])->validate();

        DB::transaction(function () use ($validated, $actor): void {
            $items = $validated['items'];
            usort($items, fn (array $first, array $second): int => (int) $first['id'] <=> (int) $second['id']);
            $variants = ProductVariant::whereIn('id', array_column($items, 'id'))->orderBy('id')->lockForUpdate()->get()->keyBy('id');
            foreach ($items as $item) {
                $variant = $variants->get((int) $item['id']);
                if (! $variant || $variant->stock !== (int) $item['expected_stock']) {
                    throw ValidationException::withMessages(['items' => 'El stock cambió o una variante ya no existe. Cancela y vuelve a abrir el ajuste. No se guardó ningún cambio.']);
                }
                $stock = (int) $item['stock'];
                if ($stock === $variant->stock) {
                    continue;
                }
                InventoryMovement::create([
                    'product_variant_id' => $variant->id, 'actor_id' => $actor->id,
                    'type' => 'manual_adjustment', 'quantity_delta' => $stock - $variant->stock,
                    'balance_after' => $stock, 'reason' => $validated['reason'],
                ]);
                $variant->update(['stock' => $stock]);
            }
        }, 5);
    }
}
