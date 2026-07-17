<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\DeliveryRate;
use App\Models\PaymentMethod;
use Illuminate\Http\JsonResponse;

class CommerceOptionsController extends Controller
{
    public function __invoke(): JsonResponse
    {
        $rates = DeliveryRate::where('is_active', true)->whereHas('deliveryZone', fn ($query) => $query->where('is_active', true))->with('deliveryZone')->get()->map(fn (DeliveryRate $rate): array => ['id' => $rate->id, 'zone' => ['id' => $rate->deliveryZone->id, 'name' => $rate->deliveryZone->name, 'districts' => $rate->deliveryZone->districts], 'amount' => $rate->amount, 'free_from_amount' => $rate->free_from_amount]);
        $methods = PaymentMethod::where('is_active', true)->get()->map(fn (PaymentMethod $method): array => ['id' => $method->id, 'code' => $method->code, 'name' => $method->name, 'instructions' => $method->instructions, 'image_url' => $method->image_path ? asset('storage/'.$method->image_path) : null, 'requires_proof' => $method->requires_proof]);

        return response()->json(['data' => ['delivery_rates' => $rates, 'payment_methods' => $methods]]);
    }
}
