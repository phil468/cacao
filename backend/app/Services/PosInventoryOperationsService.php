<?php

namespace App\Services;

use App\Models\InventoryLocation;
use App\Models\ProductVariant;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\ConflictHttpException;

class PosInventoryOperationsService
{
    /** @return list<array<string, mixed>> */
    public function rows(InventoryLocation $location, bool $lock = false): array
    {
        $variantsQuery = ProductVariant::withTrashed()->with(['product' => fn ($query) => $query->withTrashed()])->orderBy('id');
        $stocksQuery = DB::table('location_stocks')->where('inventory_location_id', $location->id);
        $quarantineQuery = DB::table('quarantine_stocks')->where('inventory_location_id', $location->id);
        if ($lock) {
            $variantsQuery->lockForUpdate();
            $stocksQuery->lockForUpdate();
            $quarantineQuery->lockForUpdate();
        }
        $variants = $variantsQuery->get();
        $stocks = $stocksQuery->pluck('quantity', 'product_variant_id');
        $quarantine = $quarantineQuery->pluck('quantity', 'product_variant_id');
        $settings = DB::table('replenishment_settings')->where('inventory_location_id', $location->id)->get()->keyBy('product_variant_id');
        $rows = [];
        foreach ($variants as $variant) {
            $available = (int) ($stocks[$variant->id] ?? 0);
            $held = (int) ($quarantine[$variant->id] ?? 0);
            if ($variant->trashed() && $available === 0 && $held === 0) {
                continue;
            }
            $minimum = (int) ($settings[$variant->id]->minimum_quantity ?? $variant->low_stock_threshold);
            $target = (int) ($settings[$variant->id]->target_quantity ?? max($minimum * 3, $minimum));
            $active = ! $variant->trashed() && $variant->is_active && $variant->product->is_active && ! $variant->product->trashed();
            $rows[] = ['variant_id' => $variant->id, 'name' => $variant->product->name.' / '.$variant->name,
                'sku' => $variant->sku, 'available' => $available, 'quarantine' => $held, 'minimum' => $minimum, 'target' => $target,
                'central_available' => $variant->stock, 'suggested' => $active && $available <= $minimum ? min(max(0, (int) $variant->stock), max(0, $target - $available)) : 0, 'active' => $active];
        }

        return $rows;
    }

    /** Must run inside a transaction holding the variant lock. */
    public function quarantine(int $locationId, int $variantId, int $delta): void
    {
        $quantity = (int) DB::table('quarantine_stocks')->where('inventory_location_id', $locationId)->where('product_variant_id', $variantId)->lockForUpdate()->value('quantity');
        if ($quantity + $delta < 0) {
            throw ValidationException::withMessages(['items' => 'No hay suficientes unidades en cuarentena.']);
        }
        DB::table('quarantine_stocks')->updateOrInsert(['inventory_location_id' => $locationId, 'product_variant_id' => $variantId], ['quantity' => $quantity + $delta, 'updated_at' => now()]);
    }

    /** @param array<string, mixed> $data */
    public function record(array $data, User $actor): int
    {
        $data = validator($data, ['submission_id' => 'required|uuid', 'location_id' => 'required|integer', 'kind' => 'required|in:gift,sample,damaged,writeoff,supplier_return,release',
            'reason' => 'required|string|min:5|max:1000', 'items' => 'required|array|min:1|max:100', 'items.*.variant_id' => 'required|integer|distinct', 'items.*.quantity' => 'required|integer|min:1|max:100000'])->validate();
        $location = InventoryLocation::findOrFail($data['location_id']);
        if ($location->kind === 'central') {
            abort_unless($actor->is_active && $actor->can('inventory.manage') && $location->is_active, 403);
        } else {
            $location = app(PosAccess::class)->location($actor, $location->id);
        }
        $items = array_map(fn (array $item): array => ['variant_id' => (int) $item['variant_id'], 'quantity' => (int) $item['quantity']], $data['items']);
        usort($items, fn (array $a, array $b): int => $a['variant_id'] <=> $b['variant_id']);
        if (in_array($data['kind'], ['writeoff', 'supplier_return', 'release'], true)) {
            abort_unless($actor->can('inventory.manage'), 403);
        }
        $hash = hash('sha256', json_encode([$location->id, $data['kind'], trim($data['reason']), $items], JSON_THROW_ON_ERROR));

        return DB::transaction(function () use ($data, $actor, $location, $items, $hash): int {
            User::whereKey($actor->id)->lockForUpdate()->firstOrFail();
            InventoryLocation::whereKey($location->id)->lockForUpdate()->firstOrFail();
            $existing = DB::table('inventory_operations')->where('submission_id', $data['submission_id'])->first();
            if ($existing) {
                abort_unless((int) $existing->actor_id === $actor->id, 403);
                if ($existing->payload_hash !== $hash) {
                    throw new ConflictHttpException('La salida ya se registró con otros datos. Revisa el historial.');
                }

                return (int) $existing->id;
            }
            app(CashShiftService::class)->assertDayOpen($location->id);
            $variants = ProductVariant::withTrashed()->whereIn('id', array_column($items, 'variant_id'))->orderBy('id')->lockForUpdate()->get()->keyBy('id');
            $id = DB::table('inventory_operations')->insertGetId(['submission_id' => $data['submission_id'], 'inventory_location_id' => $location->id,
                'actor_id' => $actor->id, 'kind' => $data['kind'], 'reason' => trim($data['reason']), 'items' => json_encode($items, JSON_THROW_ON_ERROR), 'payload_hash' => $hash, 'created_at' => now(), 'updated_at' => now()]);
            foreach ($items as $item) {
                $variant = $variants->get($item['variant_id']);
                if (! $variant) {
                    throw ValidationException::withMessages(['items' => 'Una variante ya no existe.']);
                }
                $quantity = $item['quantity'];
                $kind = $data['kind'];
                $fromQuarantine = in_array($kind, ['writeoff', 'supplier_return', 'release'], true);
                $quarantineDelta = $kind === 'damaged' ? $quantity : ($fromQuarantine ? -$quantity : 0);
                if ($quarantineDelta !== 0) {
                    $this->quarantine($location->id, $variant->id, $quarantineDelta);
                }
                $delta = $kind === 'release' ? $quantity : ($fromQuarantine ? 0 : -$quantity);
                app(LocationInventoryService::class)->change($variant, $location, $delta, ['actor_id' => $actor->id, 'type' => $kind,
                    'reason' => trim($data['reason']), 'inventory_operation_id' => $id, 'quarantine_delta' => $quarantineDelta]);
            }

            return $id;
        }, 5);
    }

    /** @param array<string, mixed> $data */
    public function close(array $data, User $actor): int
    {
        $data = validator($data, ['submission_id' => 'required|uuid', 'location_id' => 'required|integer', 'reason' => 'required|string|min:5|max:1000',
            'counts' => 'required|array|min:1|max:2000', 'counts.*.variant_id' => 'required|integer|distinct',
            'counts.*.expected' => 'required|integer|min:0', 'counts.*.counted' => 'required|integer|min:0|max:1000000',
            'counts.*.quarantine_expected' => 'required|integer|min:0', 'counts.*.quarantine_counted' => 'required|integer|min:0|max:1000000'])->validate();
        $location = app(PosAccess::class)->location($actor, (int) $data['location_id']);
        $counts = array_map(fn (array $row): array => array_map('intval', $row), $data['counts']);
        usort($counts, fn (array $a, array $b): int => $a['variant_id'] <=> $b['variant_id']);
        $hash = hash('sha256', json_encode([$location->id, $counts, trim($data['reason'])], JSON_THROW_ON_ERROR));

        return DB::transaction(function () use ($data, $actor, $location, $counts, $hash): int {
            User::whereKey($actor->id)->lockForUpdate()->firstOrFail();
            InventoryLocation::whereKey($location->id)->lockForUpdate()->firstOrFail();
            $existing = DB::table('inventory_closings')->where('submission_id', $data['submission_id'])->first();
            if ($existing) {
                abort_unless((int) $existing->actor_id === $actor->id, 403);
                $saved = json_decode($existing->snapshot, true, 512, JSON_THROW_ON_ERROR);
                if ($saved['payload_hash'] !== $hash) {
                    throw new ConflictHttpException('Este conteo ya se cerró con otros datos.');
                }

                return (int) $existing->id;
            }
            app(CashShiftService::class)->assertDayOpen($location->id);
            if (DB::table('cash_shifts')->where('active_location_id', $location->id)->exists()) {
                throw ValidationException::withMessages(['shift' => 'Cierra el turno de caja antes del cierre diario de inventario.']);
            }
            $rows = $this->rows($location, true);
            if (array_column($rows, 'variant_id') !== array_column($counts, 'variant_id')) {
                throw ValidationException::withMessages(['counts' => 'El catálogo cambió. Actualiza el conteo completo.']);
            }
            $previous = DB::table('inventory_closings')->where('inventory_location_id', $location->id)->orderByDesc('id')->first();
            $since = $previous->closed_at ?? now()->startOfDay()->toDateTimeString();
            $movementQuery = DB::table('inventory_movements')->where('inventory_location_id', $location->id);
            if ($previous) {
                $priorSnapshot = json_decode($previous->snapshot, true, 512, JSON_THROW_ON_ERROR);
                $movementQuery->where('id', '>', $priorSnapshot['last_movement_id']);
            } else {
                $movementQuery->where('created_at', '>=', $since);
            }
            $movements = $movementQuery->get();
            foreach ($rows as $index => &$row) {
                $count = $counts[$index];
                if ($count['expected'] !== $row['available'] || $count['quarantine_expected'] !== $row['quarantine']) {
                    throw new ConflictHttpException('El stock cambió durante el conteo. Actualiza y vuelve a revisar; no se guardó el cierre.');
                }
                $delta = $count['counted'] - $row['available'];
                $heldDelta = $count['quarantine_counted'] - $row['quarantine'];
                if ($delta !== 0 || $heldDelta !== 0) {
                    abort_unless($actor->can('inventory.manage'), 403);
                }
                $variantMovements = $movements->where('product_variant_id', $row['variant_id']);
                $row['opening'] = $row['available'] - (int) $variantMovements->sum('quantity_delta');
                $row['movements'] = $variantMovements->groupBy('type')->map(fn ($group): int => (int) $group->sum('quantity_delta'))->all();
                $row['counted'] = $count['counted'];
                $row['difference'] = $delta;
                $row['quarantine_counted'] = $count['quarantine_counted'];
                $row['quarantine_difference'] = $heldDelta;
                if ($heldDelta !== 0) {
                    $this->quarantine($location->id, $row['variant_id'], $heldDelta);
                }
                if ($delta !== 0 || $heldDelta !== 0) {
                    $variant = ProductVariant::withTrashed()->findOrFail($row['variant_id']);
                    app(LocationInventoryService::class)->change($variant, $location, $delta, ['actor_id' => $actor->id, 'type' => 'count_adjustment', 'quarantine_delta' => $heldDelta, 'reason' => trim($data['reason'])]);
                }
            }
            unset($row);

            return DB::table('inventory_closings')->insertGetId(['submission_id' => $data['submission_id'], 'inventory_location_id' => $location->id, 'actor_id' => $actor->id,
                'business_date' => now()->toDateString(), 'closed_at' => now(), 'reason' => trim($data['reason']),
                'snapshot' => json_encode(['rows' => $rows, 'since' => $since, 'last_movement_id' => (int) DB::table('inventory_movements')->where('inventory_location_id', $location->id)->max('id'), 'payload_hash' => $hash], JSON_THROW_ON_ERROR), 'created_at' => now(), 'updated_at' => now()]);
        }, 5);
    }
}
