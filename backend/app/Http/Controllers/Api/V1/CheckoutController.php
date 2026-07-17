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

        return new OrderResource($service->checkout($r->user(), $r->validated('items'), $r->validated('address'), $r->integer('payment_method_id'), $r->integer('delivery_rate_id'), $r->validated('coupon_code'), $proof, $r->boolean('whatsapp_updates_opt_in')));
    }
}
