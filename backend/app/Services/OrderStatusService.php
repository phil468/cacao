<?php

namespace App\Services;

use App\Jobs\SendOrderCustomerNotifications;
use App\Models\Coupon;
use App\Models\InventoryMovement;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\ProductVariant;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class OrderStatusService
{
    /** @var array<string, array<int, string>> */
    private const TRANSITIONS = [
        'pending_payment' => ['payment_review', 'cancelled'],
        'payment_review' => ['preparing', 'cancelled'],
        'preparing' => ['shipped', 'cancelled'],
        'shipped' => ['delivered'],
        'delivered' => [],
        'cancelled' => [],
    ];

    public function transition(Order $order, OrderStatus $target, ?User $actor = null, ?string $note = null): Order
    {
        return DB::transaction(function () use ($order, $target, $actor, $note): Order {
            $lockedOrder = Order::with('status', 'items')->lockForUpdate()->findOrFail($order->id);
            if ($lockedOrder->order_status_id === $target->id) {
                return $lockedOrder;
            }

            $allowed = self::TRANSITIONS[$lockedOrder->status->code] ?? [];
            if (! in_array($target->code, $allowed, true)) {
                throw ValidationException::withMessages(['order_status_id' => "No se puede cambiar de {$lockedOrder->status->name} a {$target->name}."]);
            }

            if ($target->code === 'cancelled') {
                $this->restoreInventory($lockedOrder, $actor);
                $this->releaseCoupon($lockedOrder);
            }

            $lockedOrder->update(['order_status_id' => $target->id]);
            $lockedOrder->statusHistories()->create([
                'order_status_id' => $target->id,
                'actor_id' => $actor?->id,
                'note' => $note ?: 'Estado actualizado por el comercio.',
            ]);
            SendOrderCustomerNotifications::dispatch($lockedOrder->id, "order.status.{$target->code}")->afterCommit();

            return $lockedOrder->refresh()->load('status', 'items');
        }, 5);
    }

    private function restoreInventory(Order $order, ?User $actor): void
    {
        foreach ($order->items as $item) {
            if ($item->product_variant_id === null) {
                continue;
            }

            $variant = ProductVariant::withTrashed()->lockForUpdate()->find($item->product_variant_id);
            if (! $variant) {
                continue;
            }

            $variant->increment('stock', $item->quantity);
            $variant->refresh();
            InventoryMovement::create([
                'product_variant_id' => $variant->id,
                'order_id' => $order->id,
                'actor_id' => $actor?->id,
                'type' => 'order_cancellation',
                'quantity_delta' => $item->quantity,
                'balance_after' => $variant->stock,
                'reason' => 'Cancellation of order '.$order->number,
            ]);
        }
    }

    private function releaseCoupon(Order $order): void
    {
        if ($order->coupon_code === null) {
            return;
        }

        $coupon = Coupon::where('code', $order->coupon_code)->lockForUpdate()->first();
        if ($coupon && $coupon->usage_count > 0) {
            $coupon->decrement('usage_count');
        }
    }
}
