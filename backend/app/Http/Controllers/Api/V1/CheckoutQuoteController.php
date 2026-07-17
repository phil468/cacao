<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutQuoteRequest;
use App\Services\CheckoutQuoteService;
use Illuminate\Http\JsonResponse;

class CheckoutQuoteController extends Controller
{
    public function __invoke(CheckoutQuoteRequest $request, CheckoutQuoteService $quotes): JsonResponse
    {
        $data = $request->validated();

        return response()->json(['data' => $quotes->quote($data['items'], $data['district'], $data['coupon_code'] ?? null, $request->user())]);
    }
}
