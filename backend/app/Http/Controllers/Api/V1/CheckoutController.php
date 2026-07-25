<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutRequest;
use App\Http\Resources\OrderResource;
use App\Services\CheckoutService;

class CheckoutController extends Controller
{
    public function __invoke(CheckoutRequest $r, CheckoutService $service): OrderResource
    {
        $proof = $r->file('payment_proof')?->store('payment-proofs');
        $data = $r->validated();

        return new OrderResource($service->checkout(
            $r->user(),
            $data['items'],
            $data['address'],
            (int) $data['payment_method_id'],
            isset($data['delivery_rate_id']) ? (int) $data['delivery_rate_id'] : null,
            $data['coupon_code'] ?? null,
            $proof,
            $r->boolean('whatsapp_updates_opt_in'),
            null,
            $data['fulfillment_type'],
            isset($data['pickup_location_id']) ? (int) $data['pickup_location_id'] : null,
            $data['billing_document_type'] ?? null,
            $data['billing_document_number'] ?? null,
        ));
    }
}
