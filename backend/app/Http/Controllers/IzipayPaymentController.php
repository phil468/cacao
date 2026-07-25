<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Services\Payments\IzipayService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class IzipayPaymentController extends Controller
{
    public function show(Request $request, Order $order, IzipayService $izipay): View
    {
        abort_unless($order->user_id === $request->user()->id && $order->paymentMethod->provider === 'izipay', 403);
        abort_unless(in_array($order->status->code, ['pending_payment', 'payment_review'], true), 409);

        return view('payments.izipay', [
            'order' => $order,
            'izipay' => $izipay->checkoutData($order),
        ]);
    }

    public function response(Request $request, Order $order, IzipayService $izipay): JsonResponse
    {
        abort_unless($order->user_id === $request->user()->id && $order->paymentMethod->provider === 'izipay', 403);
        $data = $request->validate([
            'payloadHttp' => ['required', 'string'],
            'signature' => ['required', 'string'],
            'transactionId' => ['required', 'string', 'max:80'],
        ]);
        $transaction = $izipay->processNotification($data);
        abort_unless($transaction->order_id === $order->id, 403);

        return response()->json(['redirect_url' => route('checkout.success', $order)]);
    }

    public function webhook(Request $request, IzipayService $izipay): JsonResponse
    {
        $data = $request->validate([
            'payloadHttp' => ['required', 'string'],
            'signature' => ['required', 'string'],
            'transactionId' => ['required', 'string', 'max:80'],
        ]);
        $izipay->processNotification($data);

        return response()->json(['received' => true]);
    }
}
