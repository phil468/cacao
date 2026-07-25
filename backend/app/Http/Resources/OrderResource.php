<?php

namespace App\Http\Resources;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Order */
class OrderResource extends JsonResource
{
    /** @return array<string, mixed> */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'number' => $this->number,
            'status' => $this->status->only(['code', 'name']),
            'payment_method' => $this->whenLoaded('paymentMethod', fn () => $this->paymentMethod->only(['code', 'name'])),
            'fulfillment_type' => $this->fulfillment_type,
            'pickup_location' => $this->pickup_location_snapshot,
            'subtotal_amount' => $this->subtotal_amount,
            'discount_amount' => $this->discount_amount,
            'delivery_amount' => $this->delivery_amount,
            'total_amount' => $this->total_amount,
            'delivery_address' => $this->delivery_address,
            'items' => $this->whenLoaded('items'),
            'status_history' => $this->whenLoaded('statusHistories', fn () => $this->statusHistories->sortByDesc('created_at')->map(fn ($history): array => ['status' => $history->status->only(['code', 'name']), 'note' => $history->note, 'created_at' => $history->created_at->toISOString()])->values()),
            'created_at' => $this->created_at->toISOString(),
        ];
    }
}
