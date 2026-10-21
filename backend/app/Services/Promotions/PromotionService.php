<?php

namespace App\Services\Promotions;

use App\Models\Order;
use App\Models\PromoCode;
use App\Models\PromoCodeBatch;
use App\Models\Promotion;
use App\Models\PromotionAuditLog;
use App\Models\User;
use App\Services\PosAccess;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class PromotionService
{
    public const ALPHABET = 'ABCDEFGHJKMNPQRSTUVWXYZ23456789';

    public function quantityForAmount(Promotion $promotion, int $eligibleAmount): int
    {
        return $eligibleAmount < $promotion->minimum_amount || $promotion->amount_per_code < 1
            ? 0 : intdiv(max(0, $eligibleAmount), $promotion->amount_per_code);
    }

    public function quantityForOrder(Promotion $promotion, Order $order): int
    {
        return $this->quantityForAmount($promotion, max(0, $order->subtotal_amount - $order->discount_amount));
    }

    public function generateBatch(Promotion $promotion, string $name, int $quantity, User $actor): PromoCodeBatch
    {
        abort_unless($actor->can('promotions.manage'), 403);
        validator(['name' => $name, 'quantity' => $quantity], ['name' => 'required|string|max:120', 'quantity' => 'required|integer|min:1|max:5000'])->validate();

        return DB::transaction(function () use ($promotion, $name, $quantity, $actor): PromoCodeBatch {
            // Serialize batch creation within a campaign; the global unique index handles other campaigns.
            Promotion::whereKey($promotion->id)->lockForUpdate()->firstOrFail();
            if ($promotion->batches()->where('name', trim($name))->exists()) {
                throw ValidationException::withMessages(['name' => 'Ya existe un lote con este nombre.']);
            }
            $batch = $promotion->batches()->create(['name' => trim($name), 'quantity' => $quantity, 'status' => 'active', 'created_by' => $actor->id]);
            $generated = 0;
            $attempts = 0;
            while ($generated < $quantity) {
                if (++$attempts > $quantity * 20) {
                    throw ValidationException::withMessages(['quantity' => 'No se pudo completar el lote. Inténtalo nuevamente.']);
                }
                $code = '';
                for ($i = 0; $i < 6; $i++) {
                    $code .= self::ALPHABET[random_int(0, strlen(self::ALPHABET) - 1)];
                }
                $generated += DB::table('promo_codes')->insertOrIgnore([
                    'promotion_id' => $promotion->id, 'batch_id' => $batch->id, 'code' => $code,
                    'type' => 'physical', 'status' => 'available', 'activation_mode' => 'reserve', 'generated_at' => now(), 'created_at' => now(), 'updated_at' => now(),
                ]);
            }
            $this->audit($promotion->id, $actor, 'batch.generated', ['batch_id' => $batch->id, 'quantity' => $quantity]);

            return $batch;
        }, 5);
    }

    public function disableBatch(PromoCodeBatch $batch, User $actor): void
    {
        abort_unless($actor->can('promotions.manage'), 403);
        DB::transaction(function () use ($batch, $actor): void {
            $locked = PromoCodeBatch::whereKey($batch->id)->lockForUpdate()->firstOrFail();
            if ($locked->status === 'disabled') {
                return;
            }
            $locked->update(['status' => 'disabled']);
            $count = $locked->codes()->where('status', 'available')->update(['status' => 'disabled']);
            $this->audit($locked->promotion_id, $actor, 'batch.disabled', ['batch_id' => $locked->id, 'disabled_count' => $count]);
        }, 5);
    }

    public function invalidate(PromoCode $code, User $actor, string $reason): void
    {
        abort_unless($actor->can('promotions.manage'), 403);
        validator(['reason' => $reason], ['reason' => 'required|string|min:5|max:1000'])->validate();
        DB::transaction(function () use ($code, $actor, $reason): void {
            $locked = PromoCode::whereKey($code->id)->lockForUpdate()->firstOrFail();
            if ($locked->status === 'disabled') {
                return;
            }
            $previous = $locked->status;
            $locked->update(['status' => 'disabled']);
            $this->audit($locked->promotion_id, $actor, 'code.invalidated', ['code_id' => $locked->id, 'previous_status' => $previous, 'reason' => $reason]);
        }, 5);
    }

    public function recordDelivery(PromoCode $code, Order $order, User $actor): void
    {
        $manager = $actor->can('promotions.manage') && ($actor->can('orders.view') || $actor->can('orders.manage'));
        if (! $manager) {
            abort_unless(app(PosAccess::class)->allowed($actor) && $order->cashier_id === $actor->id && $order->sales_channel === 'pos', 403);
            app(PosAccess::class)->location($actor, (int) $order->inventory_location_id);
        }
        DB::transaction(function () use ($code, $order, $actor): void {
            $lockedOrder = Order::with('status')->whereKey($order->id)->lockForUpdate()->firstOrFail();
            if ($lockedOrder->is_historical) {
                throw ValidationException::withMessages(['order_id' => 'Las regularizaciones históricas no habilitan nuevos cupones.']);
            }
            $locked = PromoCode::whereKey($code->id)->lockForUpdate()->firstOrFail();
            $promotion = Promotion::whereKey($locked->promotion_id)->lockForUpdate()->firstOrFail();
            if (! in_array($lockedOrder->status->code, ['shipped', 'delivered'], true) || $lockedOrder->returns()->exists()) {
                throw ValidationException::withMessages(['order_id' => 'Selecciona un pedido en camino o entregado, sin devoluciones registradas.']);
            }
            if ($locked->order_id === $lockedOrder->id) {
                return;
            }
            if (! $promotion->acceptsRegistrations()) {
                throw ValidationException::withMessages(['promo_codes' => 'La campaña no está vigente.']);
            }
            $batch = $locked->batch_id ? PromoCodeBatch::whereKey($locked->batch_id)->lockForUpdate()->firstOrFail() : null;
            if ($locked->order_id !== null || $locked->status !== 'available' || $locked->activation_mode === 'courtesy' || ($batch && $batch->status !== 'active')) {
                throw ValidationException::withMessages(['order_id' => 'El código ya fue entregado, registrado o deshabilitado.']);
            }
            $delivered = PromoCode::where('promotion_id', $promotion->id)->where('order_id', $order->id)->where('status', '!=', 'disabled')->count();
            if ($delivered >= $this->quantityForOrder($promotion, $lockedOrder)) {
                throw ValidationException::withMessages(['order_id' => 'El pedido ya tiene la cantidad de códigos que le corresponde.']);
            }
            $locked->update(['order_id' => $order->id, 'delivered_at' => now(), 'activation_mode' => 'sale', 'activated_at' => now(), 'activated_by' => $actor->id]);
            $this->audit($locked->promotion_id, $actor, 'code.delivered', ['code_id' => $locked->id, 'order_id' => $order->id]);
        }, 5);
    }

    /** @param list<int> $ids */
    public function enableCourtesy(array $ids, User $actor, string $reason): void
    {
        abort_unless($actor->is_active && $actor->hasRole('administrator') && $actor->can('promotions.manage'), 403);
        validator(['ids' => $ids, 'reason' => $reason], ['ids' => 'required|array|min:1|max:100', 'ids.*' => 'required|integer|distinct', 'reason' => 'required|string|min:5|max:500'])->validate();
        DB::transaction(function () use ($ids, $actor, $reason): void {
            $codes = PromoCode::whereIn('id', $ids)->orderBy('id')->lockForUpdate()->get();
            if ($codes->count() !== count($ids)) {
                throw ValidationException::withMessages(['codes' => 'Uno de los códigos no existe.']);
            }
            foreach ($codes as $code) {
                $promotion = Promotion::findOrFail($code->promotion_id);
                $batch = $code->batch_id ? PromoCodeBatch::whereKey($code->batch_id)->lockForUpdate()->firstOrFail() : null;
                if (! $promotion->acceptsRegistrations() || $code->status !== 'available' || $code->order_id !== null || $code->activation_mode === 'sale' || ($batch && $batch->status !== 'active')) {
                    throw ValidationException::withMessages(['codes' => 'Solo se pueden habilitar códigos disponibles de una campaña vigente y lote activo, sin venta ni participante.']);
                }
                if ($code->activation_mode === 'courtesy') {
                    continue;
                }
                $code->update(['activation_mode' => 'courtesy', 'activated_at' => now(), 'activated_by' => $actor->id]);
                $this->audit($code->promotion_id, $actor, 'code.courtesy_enabled', ['code_id' => $code->id, 'reason' => $reason]);
            }
        }, 5);
    }

    /** @param list<int> $ids */
    public function reserveCodes(array $ids, User $actor, string $reason): void
    {
        abort_unless($actor->is_active && $actor->hasRole('administrator') && $actor->can('promotions.manage'), 403);
        validator(['ids' => $ids, 'reason' => $reason], ['ids' => 'required|array|min:1|max:100', 'ids.*' => 'required|integer|distinct', 'reason' => 'required|string|min:5|max:500'])->validate();
        DB::transaction(function () use ($ids, $actor, $reason): void {
            $codes = PromoCode::whereIn('id', $ids)->orderBy('id')->lockForUpdate()->get();
            if ($codes->count() !== count($ids)) {
                throw ValidationException::withMessages(['codes' => 'Uno de los códigos no existe.']);
            }
            foreach ($codes as $code) {
                if ($code->status !== 'available' || $code->order_id !== null || $code->participant_id !== null) {
                    throw ValidationException::withMessages(['codes' => 'Solo se pueden reservar códigos disponibles, sin venta ni participante.']);
                }
                if ($code->activation_mode === 'reserve') {
                    continue;
                }
                $previous = $code->activation_mode;
                $code->update(['activation_mode' => 'reserve', 'activated_at' => null, 'activated_by' => null]);
                $this->audit($code->promotion_id, $actor, 'code.reserved', ['code_id' => $code->id, 'previous_mode' => $previous, 'reason' => $reason]);
            }
        }, 5);
    }

    /** @param array<string, mixed> $context */
    public function audit(int $promotionId, ?User $actor, string $event, array $context = []): void
    {
        PromotionAuditLog::create(['promotion_id' => $promotionId, 'actor_id' => $actor?->id, 'event' => $event, 'context' => $context, 'created_at' => now()]);
    }
}
