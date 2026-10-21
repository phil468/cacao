<?php

namespace App\Services;

use App\Models\InventoryLocation;
use App\Models\InventoryMovement;
use App\Models\LocationStock;
use App\Models\ProductVariant;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\ConflictHttpException;

class LocationInventoryService
{
    /** @return list<array{id: int, name: string, sku: string, category: string, stock: int, active: bool}> */
    public function transferCatalog(InventoryLocation $location, User $actor): array
    {
        abort_unless($actor->is_active && $actor->can('inventory.manage'), 403);
        $location->refresh();
        if (! $location->is_active) {
            throw ValidationException::withMessages(['location' => 'El origen ya no está activo.']);
        }
        $stocks = LocationStock::where('inventory_location_id', $location->id)->pluck('quantity', 'product_variant_id');

        return ProductVariant::with('product.category')->whereHas('product')->orderBy('product_id')->orderBy('name')->get()
            ->map(fn (ProductVariant $variant): array => [
                'id' => $variant->id, 'name' => $variant->product->name.' / '.$variant->name, 'sku' => $variant->sku,
                'category' => $variant->product->category->name ?? 'Otros',
                'stock' => $location->kind === 'central' ? $variant->stock : (int) ($stocks[$variant->id] ?? 0),
                'active' => $variant->is_active && $variant->product->is_active,
            ])->all();
    }

    /**
     * Read-only estimate; only transfer() locks and commits the requested quantities.
     *
     * @param  array<string, mixed>  $data
     * @return array<string, mixed>
     */
    public function previewTransfer(array $data, User $actor): array
    {
        abort_unless($actor->is_active && $actor->can('inventory.manage'), 403);
        $data = $this->validateTransfer($data);
        $locations = InventoryLocation::whereIn('id', [$data['from_location_id'], $data['to_location_id']])->get()->keyBy('id');
        $from = $locations->get($data['from_location_id']);
        $to = $locations->get($data['to_location_id']);
        if (! $from || ! $to || ! $from->is_active || ! $to->is_active) {
            throw ValidationException::withMessages(['location' => 'Selecciona ubicaciones activas.']);
        }
        $variants = ProductVariant::with('product')->whereHas('product')->whereIn('id', array_column($data['items'], 'variant_id'))->get()->keyBy('id');
        $fromStocks = LocationStock::where('inventory_location_id', $from->id)->pluck('quantity', 'product_variant_id');
        $toStocks = LocationStock::where('inventory_location_id', $to->id)->pluck('quantity', 'product_variant_id');
        $rows = [];
        foreach ($data['items'] as $item) {
            $variant = $variants->get($item['variant_id']);
            if (! $variant) {
                throw ValidationException::withMessages(['items' => 'Una presentación ya no está disponible. Actualiza el listado.']);
            }
            $available = $from->kind === 'central' ? $variant->stock : (int) ($fromStocks[$variant->id] ?? 0);
            $destination = $to->kind === 'central' ? $variant->stock : (int) ($toStocks[$variant->id] ?? 0);
            if ($available < $item['quantity']) {
                throw ValidationException::withMessages(['items' => 'Stock insuficiente para '.$variant->sku.': disponibles '.$available.', solicitados '.$item['quantity'].'.']);
            }
            $rows[] = ['id' => $variant->id, 'name' => $variant->product->name.' / '.$variant->name, 'sku' => $variant->sku,
                'quantity' => $item['quantity'], 'from_before' => $available, 'from_after' => $available - $item['quantity'],
                'to_before' => $destination, 'to_after' => $destination + $item['quantity']];
        }

        return ['payload' => $data, 'from_name' => $from->name, 'to_name' => $to->name, 'rows' => $rows,
            'units' => array_sum(array_column($rows, 'quantity')), 'presentations' => count($rows)];
    }

    public function central(): InventoryLocation
    {
        return InventoryLocation::where('code', 'central')->firstOrFail();
    }

    /** Call inside a transaction after locking the variant. All writers serialize on that variant row. */
    public function balance(ProductVariant $variant, InventoryLocation $location): int
    {
        return $location->kind === 'central' ? $variant->stock : (int) LocationStock::where('inventory_location_id', $location->id)->where('product_variant_id', $variant->id)->lockForUpdate()->value('quantity');
    }

    /** @param array<string, mixed> $context */
    public function change(ProductVariant $variant, InventoryLocation $location, int $delta, array $context): int
    {
        $balance = $this->balance($variant, $location) + $delta;
        if ($balance < 0) {
            throw new ConflictHttpException('Stock insuficiente en el punto de venta seleccionado.');
        }
        if ($location->kind === 'central') {
            $variant->update(['stock' => $balance]);
        } else {
            LocationStock::updateOrCreate(['inventory_location_id' => $location->id, 'product_variant_id' => $variant->id], ['quantity' => $balance]);
        }
        InventoryMovement::create([...$context, 'inventory_location_id' => $location->id, 'product_variant_id' => $variant->id, 'quantity_delta' => $delta, 'balance_after' => $balance]);

        return $balance;
    }

    /** @param array<string, mixed> $data */
    public function transfer(array $data, User $actor): int
    {
        abort_unless($actor->is_active && $actor->can('inventory.manage'), 403);
        $data = $this->validateTransfer($data);

        return DB::transaction(function () use ($data, $actor): int {
            User::whereKey($actor->id)->lockForUpdate()->firstOrFail();
            $existing = DB::table('inventory_transfers')->where('submission_id', $data['submission_id'])->first();
            if ($existing) {
                abort_unless((int) $existing->actor_id === $actor->id, 403);
                $stored = DB::table('inventory_transfer_items')->where('inventory_transfer_id', $existing->id)->orderBy('product_variant_id')->get()
                    ->map(fn ($item): array => ['variant_id' => (int) $item->product_variant_id, 'quantity' => (int) $item->quantity])->all();
                $requested = $data['items'];
                usort($requested, fn (array $a, array $b): int => $a['variant_id'] <=> $b['variant_id']);
                if ((int) $existing->from_location_id !== $data['from_location_id'] || (int) $existing->to_location_id !== $data['to_location_id']
                    || $existing->reason !== $data['reason'] || $stored !== $requested) {
                    throw new ConflictHttpException('Esta solicitud ya fue procesada con otros datos. Revisa los movimientos antes de iniciar otra transferencia.');
                }

                return $existing->id;
            }
            $locations = InventoryLocation::whereIn('id', [$data['from_location_id'], $data['to_location_id']])->orderBy('id')->lockForUpdate()->get()->keyBy('id');
            $from = $locations->get($data['from_location_id']);
            $to = $locations->get($data['to_location_id']);
            if (! $from || ! $to || ! $from->is_active || ! $to->is_active) {
                throw ValidationException::withMessages(['location' => 'Selecciona ubicaciones activas.']);
            }
            $variants = ProductVariant::whereIn('id', array_column($data['items'], 'variant_id'))->orderBy('id')->lockForUpdate()->get()->keyBy('id');
            $id = DB::table('inventory_transfers')->insertGetId(['submission_id' => $data['submission_id'], 'from_location_id' => $from->id, 'to_location_id' => $to->id, 'actor_id' => $actor->id, 'reason' => $data['reason'], 'created_at' => now(), 'updated_at' => now()]);
            foreach ($data['items'] as $item) {
                $variant = $variants->get($item['variant_id']);
                if (! $variant) {
                    throw ValidationException::withMessages(['items' => 'La variante no está disponible.']);
                }
                $available = $this->balance($variant, $from);
                if ($available < $item['quantity']) {
                    throw new ConflictHttpException('Stock insuficiente para '.$variant->sku.': disponibles '.$available.', solicitados '.$item['quantity'].'. No se transfirió ningún producto.');
                }
                $context = ['actor_id' => $actor->id, 'inventory_transfer_id' => $id, 'reason' => $data['reason']];
                $this->change($variant, $from, -$item['quantity'], [...$context, 'type' => 'transfer_out']);
                $this->change($variant, $to, $item['quantity'], [...$context, 'type' => 'transfer_in']);
                DB::table('inventory_transfer_items')->insert(['inventory_transfer_id' => $id, 'product_variant_id' => $variant->id, 'quantity' => $item['quantity']]);
            }

            return $id;
        }, 5);
    }

    /** @param array<string, mixed> $data
     * @return array<string, mixed>
     */
    private function validateTransfer(array $data): array
    {
        if (is_string($data['reason'] ?? null)) {
            $data['reason'] = trim($data['reason']);
        }
        $data = validator($data, ['submission_id' => 'required|uuid', 'from_location_id' => 'required|integer', 'to_location_id' => 'required|integer|different:from_location_id', 'reason' => 'required|string|min:5|max:500',
            'items' => 'required|array|min:1|max:100', 'items.*.variant_id' => 'required|integer|distinct', 'items.*.quantity' => 'required|integer|min:1|max:100000'], [
                'required' => 'Completa los datos obligatorios de la transferencia.',
                'different' => 'El origen y el destino deben ser distintos.',
                'integer' => 'Ingresa identificadores y cantidades enteros.',
                'items.min' => 'Selecciona al menos un producto con cantidad mayor que cero.',
                'items.required' => 'Selecciona al menos un producto con cantidad mayor que cero.',
                'items.max' => 'Selecciona como máximo 100 presentaciones por transferencia.',
                'distinct' => 'No repitas la misma presentación.',
                'reason.min' => 'Escribe un motivo de al menos 5 caracteres.',
                'reason.max' => 'El motivo no debe superar los 500 caracteres.',
            ])->validate();
        $data['from_location_id'] = (int) $data['from_location_id'];
        $data['to_location_id'] = (int) $data['to_location_id'];
        if ($data['from_location_id'] === $data['to_location_id']) {
            throw ValidationException::withMessages(['to_location_id' => 'El origen y el destino deben ser distintos.']);
        }
        $data['items'] = array_map(fn (array $item): array => ['variant_id' => (int) $item['variant_id'], 'quantity' => (int) $item['quantity']], array_values($data['items']));

        return $data;
    }
}
