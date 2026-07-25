<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\DeliveryRate;
use App\Models\PaymentMethod;
use App\Models\PickupLocation;
use Illuminate\Http\JsonResponse;

class CommerceOptionsController extends Controller
{
    public function __invoke(): JsonResponse
    {
        $rates = DeliveryRate::where('is_active', true)->whereHas('deliveryZone', fn ($query) => $query->where('is_active', true))->with('deliveryZone')->get()->map(fn (DeliveryRate $rate): array => ['id' => $rate->id, 'zone' => ['id' => $rate->deliveryZone->id, 'name' => $rate->deliveryZone->name, 'districts' => $rate->deliveryZone->districts], 'amount' => $rate->amount, 'free_from_amount' => $rate->free_from_amount]);
        $methods = PaymentMethod::where('is_active', true)->get()->map(fn (PaymentMethod $method): array => ['id' => $method->id, 'code' => $method->code, 'provider' => $method->provider, 'name' => $method->name, 'instructions' => $method->instructions, 'image_url' => $method->image_path ? asset('storage/'.$method->image_path) : null, 'requires_proof' => $method->requires_proof]);
        $pickupLocations = PickupLocation::available()->orderBy('starts_at')->get()->map(fn (PickupLocation $location): array => [
            'id' => $location->id,
            'name' => $location->name,
            'address_line' => $location->address_line,
            'reference' => $location->reference,
            'district' => $location->district,
            'province' => $location->province,
            'department' => $location->department,
            'latitude' => $location->latitude,
            'longitude' => $location->longitude,
            'instructions' => $location->instructions,
            'starts_at' => $location->starts_at?->toISOString(),
            'ends_at' => $location->ends_at?->toISOString(),
        ]);

        return response()->json(['data' => ['delivery_rates' => $rates, 'pickup_locations' => $pickupLocations, 'payment_methods' => $methods]]);
    }
}
