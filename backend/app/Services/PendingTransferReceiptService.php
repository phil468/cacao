<?php

namespace App\Services;

use App\Models\InventoryLocation;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\ConflictHttpException;

class PendingTransferReceiptService
{
    /** @return list<array<string, mixed>> */
    public function rows(int $locationId): array
    {
        return DB::table('inventory_transfers as t')->join('inventory_locations as source', 'source.id', '=', 't.from_location_id')
            ->leftJoin('transfer_receipt_confirmations as c', 'c.inventory_transfer_id', '=', 't.id')
            ->where('t.to_location_id', $locationId)->where('source.kind', 'central')->whereDate('t.created_at', now()->toDateString())
            ->select('t.id', 't.created_at', 'c.received_on', 'c.confirmed_at', 'c.reason')->orderBy('t.id')->get()
            ->map(function ($row): array {
                $items = DB::table('inventory_transfer_items as i')->join('product_variants as v', 'v.id', '=', 'i.product_variant_id')->join('products as p', 'p.id', '=', 'v.product_id')
                    ->where('i.inventory_transfer_id', $row->id)->orderBy('v.id')->get(['p.name as product', 'v.name as variant', 'i.quantity'])->map(fn ($i): array => ['name' => $i->product.' / '.$i->variant, 'quantity' => (int) $i->quantity])->all();

                return [...(array) $row, 'items' => $items];
            })->all();
    }

    /**
     * Annotation only: never calls inventory changes or rewrites timestamps.
     *
     * @param  array<string, mixed>  $data
     */
    public function confirm(int $transferId, array $data, User $actor): int
    {
        abort_unless($actor->is_active && $actor->hasRole('administrator') && $actor->can('orders.manage') && $actor->can('inventory.manage'), 403);
        $data = validator($data, ['location_id' => 'required|integer', 'received_on' => 'required|date_format:Y-m-d', 'reason' => 'required|string|min:5|max:1000'])->validate();
        $reason = trim($data['reason']);
        if (mb_strlen($reason) < 5) {
            throw ValidationException::withMessages(['reason' => 'Explica la recepción real con al menos 5 caracteres.']);
        }
        $location = app(PosAccess::class)->location($actor, (int) $data['location_id']);

        return DB::transaction(function () use ($actor, $transferId, $data, $reason, $location): int {
            User::whereKey($actor->id)->lockForUpdate()->firstOrFail();
            InventoryLocation::whereKey($location->id)->lockForUpdate()->firstOrFail();
            $transfer = DB::table('inventory_transfers')->where('id', $transferId)->lockForUpdate()->first();
            abort_unless($transfer && (int) $transfer->to_location_id === $location->id, 404);
            $saved = DB::table('transfer_receipt_confirmations')->where('inventory_transfer_id', $transferId)->first();
            if ($saved) {
                if ((int) $saved->actor_id !== $actor->id || $saved->received_on !== $data['received_on'] || $saved->reason !== $reason) {
                    throw new ConflictHttpException('Esta recepción ya fue confirmada con otros datos. No se puede sobrescribir.');
                }

                return (int) $saved->id;
            }
            $date = now()->subDay()->toDateString();
            if ($data['received_on'] !== $date || substr((string) $transfer->created_at, 0, 10) !== now()->toDateString()
                || ! InventoryLocation::whereKey($transfer->from_location_id)->where('kind', 'central')->exists()) {
                throw ValidationException::withMessages(['transfer' => 'Solo puedes confirmar una entrada desde central registrada hoy y recibida físicamente ayer.']);
            }
            app(CashShiftService::class)->assertPendingDayContext($location->id, $date);
            // Do not regularize around later adjustments, sales, returns or outgoing stock.
            if (DB::table('inventory_movements')->where('inventory_location_id', $location->id)->whereDate('created_at', '>=', now()->toDateString())->where('type', '!=', 'transfer_in')->exists()) {
                throw ValidationException::withMessages(['transfer' => 'Hay salidas, ventas o ajustes de inventario de hoy. Revisa el historial antes de confirmar una recepción anterior.']);
            }

            return DB::table('transfer_receipt_confirmations')->insertGetId(['inventory_transfer_id' => $transferId, 'received_on' => $date, 'actor_id' => $actor->id, 'reason' => $reason, 'confirmed_at' => now()]);
        }, 5);
    }
}
