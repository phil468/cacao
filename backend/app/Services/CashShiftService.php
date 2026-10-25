<?php

namespace App\Services;

use App\Models\InventoryLocation;
use App\Models\Order;
use App\Models\PaymentMethod;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use stdClass;
use Symfony\Component\HttpKernel\Exception\ConflictHttpException;

class CashShiftService
{
    public function assertDayOpen(int $locationId): void
    {
        if (DB::table('inventory_closings')->where('inventory_location_id', $locationId)->where('business_date', now()->toDateString())->exists()) {
            throw ValidationException::withMessages(['location_id' => 'El inventario de hoy ya está cerrado. No se admiten nuevas ventas ni salidas en este día.']);
        }
    }

    /** @param array<string, mixed> $data */
    public function open(array $data, User $actor): int
    {
        $data = validator($data, ['submission_id' => 'required|uuid', 'location_id' => 'required|integer', 'opening_cash' => 'required|integer|min:0|max:1000000000',
            'pending_yesterday' => 'sometimes|boolean', 'reason' => 'required_if:pending_yesterday,true|nullable|string|min:5|max:1000'])->validate();
        $pending = (bool) ($data['pending_yesterday'] ?? false);
        abort_if($pending && (! $actor->hasRole('administrator') || ! $actor->can('orders.manage')), 403);
        $date = $pending ? now()->subDay()->toDateString() : now()->toDateString();
        $location = app(PosAccess::class)->location($actor, (int) $data['location_id']);

        return DB::transaction(function () use ($data, $actor, $location, $pending, $date): int {
            User::whereKey($actor->id)->lockForUpdate()->firstOrFail();
            InventoryLocation::whereKey($location->id)->lockForUpdate()->firstOrFail();
            $existing = DB::table('cash_shifts')->where('submission_id', $data['submission_id'])->first();
            if ($existing) {
                abort_unless((int) $existing->user_id === $actor->id, 403);
                if ((int) $existing->inventory_location_id !== $location->id || (int) $existing->opening_cash !== (int) $data['opening_cash'] || ($existing->pending_day_reason !== null) !== $pending || ($pending && $existing->pending_day_reason !== trim($data['reason']))) {
                    throw new ConflictHttpException('La apertura ya fue registrada con otros datos.');
                }

                return (int) $existing->id;
            }
            $this->assertDayOpen($location->id);
            if ($pending) {
                $this->assertPendingDaySafe($location->id, $date);
            }
            if (DB::table('cash_shifts')->where('active_location_id', $location->id)->orWhere('active_user_id', $actor->id)->exists()) {
                throw ValidationException::withMessages(['shift' => 'Ya hay un turno abierto en este punto o para este cajero. Ciérralo antes de abrir otro.']);
            }
            if (! PaymentMethod::where('code', 'pos_cash')->where('provider', 'manual')->exists()) {
                throw ValidationException::withMessages(['shift' => 'Configura Efectivo (pos_cash) antes de abrir caja.']);
            }

            return DB::table('cash_shifts')->insertGetId(['submission_id' => $data['submission_id'], 'inventory_location_id' => $location->id, 'user_id' => $actor->id,
                'active_location_id' => $location->id, 'active_user_id' => $actor->id, 'opening_cash' => (int) $data['opening_cash'], 'business_date' => $date,
                'pending_day_reason' => $pending ? trim($data['reason']) : null, 'opened_at' => now(), 'created_at' => now(), 'updated_at' => now()]);
        }, 5);
    }

    /** Called while the sale transaction holds the point lock. */
    public function forSale(InventoryLocation $location, User $actor): int
    {
        $this->assertDayOpen($location->id);
        $shift = DB::table('cash_shifts')->where('active_location_id', $location->id)->where('user_id', $actor->id)->lockForUpdate()->first();
        if (! $shift) {
            throw ValidationException::withMessages(['shift' => 'Abre tu turno de caja en este punto antes de registrar la venta.']);
        }
        if ($shift->pending_day_reason !== null) {
            abort_unless($actor->hasRole('administrator') && $actor->can('orders.manage'), 403);
            $this->assertPendingDaySafe($location->id, $shift->business_date, (int) $shift->id);

            return (int) $shift->id;
        }
        if (substr((string) $shift->opened_at, 0, 10) !== now()->toDateString()) {
            throw ValidationException::withMessages(['shift' => 'Cierra el turno pendiente del día anterior y abre uno de hoy.']);
        }

        return (int) $shift->id;
    }

    /** Caller holds the inventory-location lock. Audit timestamps are never backdated. */
    public function assertPendingDaySafe(int $locationId, string $date, ?int $shiftId = null): void
    {
        $this->assertPendingDayContext($locationId, $date, $shiftId);
        $confirmedTransfers = DB::table('transfer_receipt_confirmations as receipt')
            ->join('inventory_transfers as transfer', 'transfer.id', '=', 'receipt.inventory_transfer_id')
            ->join('inventory_locations as source', 'source.id', '=', 'transfer.from_location_id')
            ->where('receipt.received_on', $date)->where('transfer.to_location_id', $locationId)->where('source.kind', 'central')
            ->whereDate('transfer.created_at', now()->toDateString())->select('transfer.id');
        $movements = DB::table('inventory_movements')->where('inventory_location_id', $locationId)->whereDate('created_at', '>=', now()->toDateString())
            ->where(function ($q) use ($confirmedTransfers): void {
                $q->where('type', '!=', 'transfer_in')->orWhereNull('inventory_transfer_id')->orWhereNotIn('inventory_transfer_id', $confirmedTransfers);
            });
        if ($shiftId !== null) {
            $movements->where(fn ($q) => $q->where('type', '!=', 'sale')->orWhereNull('order_id')->orWhereNotIn('order_id', Order::where('cash_shift_id', $shiftId)->select('id')));
        }
        if ($movements->exists()) {
            throw ValidationException::withMessages(['shift' => 'Hay movimientos de inventario de hoy. Si son entradas desde central recibidas ayer, confirma su recepción real en Turno y caja. Las demás salidas o ajustes requieren revisión.']);
        }
    }

    /** Shared prerequisites; caller holds the point lock. */
    public function assertPendingDayContext(int $locationId, string $date, ?int $shiftId = null): void
    {
        $today = now()->toDateString();
        $invalid = $date !== now()->subDay()->toDateString()
            || Order::where('inventory_location_id', $locationId)->where('is_historical', true)->whereDate('sold_on', $date)->exists()
            || DB::table('inventory_closings')->where('inventory_location_id', $locationId)->where('business_date', '>=', $date)->exists()
            || DB::table('cash_shifts')->where('inventory_location_id', $locationId)->when($shiftId, fn ($q) => $q->where('id', '!=', $shiftId))
                ->where(function ($q) use ($date, $today): void {
                    $q->whereDate('opened_at', '>=', $today)->orWhere('business_date', '>=', $today)
                        ->orWhere(function ($q) use ($date): void {
                            $q->whereRaw('DATE(COALESCE(business_date, opened_at)) = ?', [$date])->whereNotNull('closed_at');
                        });
                })->exists();
        if ($invalid) {
            throw ValidationException::withMessages(['shift' => 'No se puede registrar la jornada de ayer: debe seguir sin cierre, sin ventas históricas ya ingresadas de esa fecha y no puede haber turnos, conteos ni movimientos posteriores de hoy. Revisa el historial.']);
        }
    }

    public function authorized(int $id, User $actor): stdClass
    {
        $shift = DB::table('cash_shifts')->where('id', $id)->first();
        if ($shift === null) {
            abort(404);
        }
        app(PosAccess::class)->location($actor, (int) $shift->inventory_location_id);
        abort_unless((int) $shift->user_id === $actor->id || $actor->can('orders.manage'), 403);

        return $shift;
    }

    /** @return array<string, mixed> */
    public function summary(int $id, User $actor): array
    {
        $shift = $this->authorized($id, $actor);
        if ($shift->closed_at !== null) {
            return json_decode($shift->closing_snapshot, true, 512, JSON_THROW_ON_ERROR);
        }
        $paid = DB::table('order_payments')->join('orders', 'orders.id', '=', 'order_payments.order_id')->where('orders.cash_shift_id', $id)
            ->selectRaw('order_payments.payment_method_id, SUM(order_payments.amount) as amount')->groupBy('order_payments.payment_method_id')->pluck('amount', 'payment_method_id');
        $entries = DB::table('cash_entries')->where('cash_shift_id', $id)->get();
        $ids = array_unique([...$paid->keys()->all(), ...$entries->pluck('payment_method_id')->all()]);
        $methods = PaymentMethod::where('code', 'pos_cash')->orWhereIn('id', $ids)->orderBy('id')->get();
        $rows = [];
        foreach ($methods as $method) {
            $opening = $method->code === 'pos_cash' ? (int) $shift->opening_cash : 0;
            $incoming = (int) $entries->where('payment_method_id', $method->id)->where('kind', 'in')->sum('amount');
            $outgoing = (int) $entries->where('payment_method_id', $method->id)->whereIn('kind', ['out', 'refund'])->sum('amount');
            $sales = (int) ($paid[$method->id] ?? 0);
            $rows[] = ['payment_method_id' => $method->id, 'name' => $method->name, 'code' => $method->code, 'opening' => $opening, 'sales' => $sales,
                'incoming' => $incoming, 'outgoing' => $outgoing, 'expected' => $opening + $sales + $incoming - $outgoing];
        }

        return ['id' => $id, 'cashier_id' => (int) $shift->user_id, 'cashier' => User::find($shift->user_id)->name ?? 'Usuario anterior',
            'opened_at' => $shift->opened_at, 'business_date' => $shift->business_date ?? substr((string) $shift->opened_at, 0, 10), 'pending_day_reason' => $shift->pending_day_reason,
            'closed_at' => null, 'opening_cash' => (int) $shift->opening_cash, 'methods' => $rows,
            'sales_count' => Order::where('cash_shift_id', $id)->count(), 'sales_total' => (int) Order::where('cash_shift_id', $id)->sum('total_amount'),
            'discount_total' => (int) Order::where('cash_shift_id', $id)->sum('discount_amount'), 'entries' => $entries->map(fn ($entry): array => (array) $entry)->all()];
    }

    /** @param array<string, mixed> $data
     * @return array<string, mixed>
     */
    public function close(int $id, array $data, User $actor): array
    {
        $data = validator($data, ['counts' => 'required|array|min:1|max:20', 'counts.*.payment_method_id' => 'required|integer|distinct',
            'counts.*.counted_amount' => 'required|integer|min:-1000000000|max:1000000000', 'reason' => 'required|string|min:5|max:1000'])->validate();
        $counts = array_map(fn (array $row): array => ['payment_method_id' => (int) $row['payment_method_id'], 'counted_amount' => (int) $row['counted_amount']], $data['counts']);
        usort($counts, fn (array $a, array $b): int => $a['payment_method_id'] <=> $b['payment_method_id']);
        $hash = hash('sha256', json_encode([$counts, trim($data['reason'])], JSON_THROW_ON_ERROR));
        $shift = $this->authorized($id, $actor);

        return DB::transaction(function () use ($id, $actor, $shift, $counts, $data, $hash): array {
            User::whereKey($actor->id)->lockForUpdate()->firstOrFail();
            InventoryLocation::whereKey($shift->inventory_location_id)->lockForUpdate()->firstOrFail();
            $locked = DB::table('cash_shifts')->where('id', $id)->lockForUpdate()->first();
            if ($locked->closed_at !== null) {
                $saved = json_decode($locked->closing_snapshot, true, 512, JSON_THROW_ON_ERROR);
                if ($saved['payload_hash'] !== $hash) {
                    throw new ConflictHttpException('El turno ya está cerrado. Su cierre no se puede modificar.');
                }

                return $saved;
            }
            $snapshot = $this->summary($id, $actor);
            $expectedIds = array_column($snapshot['methods'], 'payment_method_id');
            sort($expectedIds);
            if ($expectedIds !== array_column($counts, 'payment_method_id')) {
                throw ValidationException::withMessages(['counts' => 'Los medios de pago cambiaron. Actualiza el resumen antes de confirmar el cierre.']);
            }
            $values = array_column($counts, 'counted_amount', 'payment_method_id');
            foreach ($snapshot['methods'] as &$method) {
                $method['counted'] = $values[$method['payment_method_id']];
                $method['difference'] = $method['counted'] - $method['expected'];
                if ($method['code'] === 'pos_cash' && $method['counted'] < 0) {
                    throw ValidationException::withMessages(['counts' => 'El efectivo contado no puede ser negativo.']);
                }
            }
            unset($method);
            $snapshot = [...$snapshot, 'closed_at' => now()->toDateTimeString(), 'closed_by' => $actor->id, 'reason' => trim($data['reason']), 'payload_hash' => $hash];
            DB::table('cash_shifts')->where('id', $id)->update(['closed_at' => now(), 'active_location_id' => null, 'active_user_id' => null,
                'closing_snapshot' => json_encode($snapshot, JSON_THROW_ON_ERROR), 'updated_at' => now()]);

            return $snapshot;
        }, 5);
    }

    /** @param array<string, mixed> $data */
    public function entry(int $id, array $data, User $actor): int
    {
        $data = validator($data, ['submission_id' => 'required|uuid', 'kind' => 'required|in:in,out,refund', 'amount' => 'required|integer|min:1|max:1000000000',
            'payment_method_id' => 'required|integer', 'reason' => 'required|string|min:5|max:1000', 'order_id' => 'required_if:kind,refund|nullable|integer'])->validate();
        $shift = $this->authorized($id, $actor);

        return DB::transaction(function () use ($id, $data, $actor, $shift): int {
            User::whereKey($actor->id)->lockForUpdate()->firstOrFail();
            InventoryLocation::whereKey($shift->inventory_location_id)->lockForUpdate()->firstOrFail();
            $locked = DB::table('cash_shifts')->where('id', $id)->lockForUpdate()->first();
            $existing = DB::table('cash_entries')->where('submission_id', $data['submission_id'])->first();
            if ($existing) {
                abort_unless((int) $existing->actor_id === $actor->id && (int) $existing->cash_shift_id === $id, 403);
                if ($existing->kind !== $data['kind'] || (int) $existing->amount !== (int) $data['amount'] || (int) $existing->payment_method_id !== (int) $data['payment_method_id'] || $existing->reason !== trim($data['reason']) || (int) $existing->order_id !== (int) ($data['order_id'] ?? 0)) {
                    throw new ConflictHttpException('El movimiento ya se registró con otros datos.');
                }

                return (int) $existing->id;
            }
            if ($locked->closed_at !== null) {
                throw ValidationException::withMessages(['shift' => 'No puedes añadir movimientos a un turno cerrado.']);
            }
            if (substr((string) $locked->opened_at, 0, 10) !== now()->toDateString()) {
                throw ValidationException::withMessages(['shift' => 'Cierra el turno del día anterior y registra los movimientos nuevos en un turno de hoy.']);
            }
            $method = PaymentMethod::where('provider', 'manual')->where('is_active', true)->findOrFail($data['payment_method_id']);
            if ($data['kind'] !== 'refund' && $method->code !== 'pos_cash') {
                throw ValidationException::withMessages(['payment_method_id' => 'Las entradas y retiros se registran en efectivo.']);
            }
            if ($data['kind'] !== 'in' && $method->code === 'pos_cash') {
                $availableCash = 0;
                foreach ($this->summary($id, $actor)['methods'] as $row) {
                    if ($row['code'] === 'pos_cash') {
                        $availableCash = $row['expected'];
                    }
                }
                if ((int) $data['amount'] > $availableCash) {
                    throw ValidationException::withMessages(['amount' => 'El retiro o reembolso supera el efectivo esperado disponible.']);
                }
            }
            if ($data['kind'] === 'refund') {
                abort_unless($actor->can('orders.manage'), 403);
                $order = Order::lockForUpdate()->findOrFail($data['order_id']);
                if ($order->is_historical || $order->sales_channel !== 'pos' || (int) $order->inventory_location_id !== (int) $shift->inventory_location_id || ! $order->returns()->exists()) {
                    throw ValidationException::withMessages(['order_id' => 'Selecciona una venta presencial de este punto con devolución registrada, no histórica.']);
                }
                $paid = (int) $order->posPayments()->where('payment_method_id', $method->id)->sum('amount');
                if (! $order->posPayments()->exists() && $order->payment_method_id === $method->id) {
                    $paid = $order->total_amount;
                }
                $refunded = (int) DB::table('cash_entries')->where('order_id', $order->id)->where('payment_method_id', $method->id)->where('kind', 'refund')->sum('amount');
                if ((int) $data['amount'] > $paid - $refunded) {
                    throw ValidationException::withMessages(['amount' => 'El reembolso supera lo cobrado por ese medio, descontando reembolsos anteriores.']);
                }
            }

            return DB::table('cash_entries')->insertGetId(['submission_id' => $data['submission_id'], 'cash_shift_id' => $id, 'actor_id' => $actor->id,
                'payment_method_id' => $method->id, 'order_id' => $data['kind'] === 'refund' ? $data['order_id'] : null,
                'kind' => $data['kind'], 'amount' => $data['amount'], 'reason' => trim($data['reason']), 'created_at' => now(), 'updated_at' => now()]);
        }, 5);
    }
}
