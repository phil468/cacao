<?php

namespace App\Services;

use App\Models\InventoryLocation;
use App\Models\ProductVariant;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\ConflictHttpException;

class ReplenishmentService
{
    /** @param array<string, mixed> $data */
    public function settings(array $data, User $actor): void
    {
        abort_unless($actor->is_active && $actor->can('inventory.manage'), 403);
        $data = validator($data, ['location_id' => 'required|integer', 'items' => 'required|array|min:1|max:2000', 'items.*.variant_id' => 'required|integer|distinct',
            'items.*.minimum_quantity' => 'required|integer|min:0|max:100000', 'items.*.target_quantity' => 'required|integer|min:0|max:100000'])->validate();
        $location = app(PosAccess::class)->location($actor, (int) $data['location_id']);
        DB::transaction(function () use ($data, $location): void {
            InventoryLocation::whereKey($location->id)->lockForUpdate()->firstOrFail();
            foreach ($data['items'] as $item) {
                ProductVariant::findOrFail($item['variant_id']);
                if ((int) $item['target_quantity'] < (int) $item['minimum_quantity']) {
                    throw ValidationException::withMessages(['items' => 'El objetivo no puede ser menor que el mínimo.']);
                }
                DB::table('replenishment_settings')->updateOrInsert(['inventory_location_id' => $location->id, 'product_variant_id' => $item['variant_id']],
                    ['minimum_quantity' => (int) $item['minimum_quantity'], 'target_quantity' => (int) $item['target_quantity'], 'updated_at' => now()]);
            }
        }, 5);
    }

    /** @param array<string, mixed> $data */
    public function request(array $data, User $actor): int
    {
        $data = validator($data, ['submission_id' => 'required|uuid', 'location_id' => 'required|integer', 'reason' => 'required|string|min:5|max:1000',
            'items' => 'required|array|min:1|max:100', 'items.*.variant_id' => 'required|integer|distinct', 'items.*.quantity' => 'required|integer|min:1|max:100000'])->validate();
        $location = app(PosAccess::class)->location($actor, (int) $data['location_id']);
        $items = array_map(fn (array $item): array => ['variant_id' => (int) $item['variant_id'], 'quantity' => (int) $item['quantity']], $data['items']);
        usort($items, fn (array $a, array $b): int => $a['variant_id'] <=> $b['variant_id']);

        return DB::transaction(function () use ($data, $items, $location, $actor): int {
            User::whereKey($actor->id)->lockForUpdate()->firstOrFail();
            $existing = DB::table('replenishment_requests')->where('submission_id', $data['submission_id'])->first();
            if ($existing) {
                abort_unless((int) $existing->actor_id === $actor->id, 403);
                if ((int) $existing->inventory_location_id !== $location->id || $existing->reason !== trim($data['reason']) || json_decode($existing->items, true) !== $items) {
                    throw new ConflictHttpException('La solicitud ya se registró con otros datos.');
                }

                return (int) $existing->id;
            }
            if (ProductVariant::whereIn('id', array_column($items, 'variant_id'))->where('is_active', true)->whereHas('product', fn ($q) => $q->where('is_active', true))->count() !== count($items)) {
                throw ValidationException::withMessages(['items' => 'Solicita presentaciones activas y disponibles en el catálogo.']);
            }

            return DB::table('replenishment_requests')->insertGetId(['submission_id' => $data['submission_id'], 'inventory_location_id' => $location->id,
                'actor_id' => $actor->id, 'status' => 'pending', 'items' => json_encode($items, JSON_THROW_ON_ERROR), 'reason' => trim($data['reason']), 'created_at' => now(), 'updated_at' => now()]);
        }, 5);
    }

    public function fulfill(int $id, User $actor): int
    {
        abort_unless($actor->is_active && $actor->can('inventory.manage'), 403);

        return DB::transaction(function () use ($id, $actor): int {
            User::whereKey($actor->id)->lockForUpdate()->firstOrFail();
            $request = DB::table('replenishment_requests')->where('id', $id)->lockForUpdate()->first();
            abort_unless($request !== null, 404);
            if ($request->status === 'fulfilled') {
                return (int) $request->inventory_transfer_id;
            }
            if ($request->status !== 'pending') {
                throw new ConflictHttpException('La solicitud ya no está pendiente.');
            }
            $inventory = app(LocationInventoryService::class);
            $transferId = $inventory->transfer(['submission_id' => $request->submission_id, 'from_location_id' => $inventory->central()->id,
                'to_location_id' => $request->inventory_location_id, 'reason' => 'Reposición solicitada #'.$id, 'items' => json_decode($request->items, true, 512, JSON_THROW_ON_ERROR)], $actor);
            DB::table('replenishment_requests')->where('id', $id)->update(['status' => 'fulfilled', 'inventory_transfer_id' => $transferId, 'updated_at' => now()]);

            return $transferId;
        }, 5);
    }
}
