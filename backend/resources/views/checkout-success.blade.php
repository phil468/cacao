@extends('layouts.store', ['title' => 'Pedido recibido | Cacao del Perú'])
@section('content')
<section><div class="empty-state"><span class="eyebrow">PEDIDO RECIBIDO</span><h1>Gracias por tu compra</h1><p>Tu pedido es <strong>{{ $order->number }}</strong>.</p><p>Estado: {{ $order->status->name }} · Total: S/ {{ number_format($order->total_amount / 100, 2) }}</p><p>Pago seleccionado: {{ $order->paymentMethod->name }}.</p><a class="button" href="{{ route('catalog') }}">Volver al catálogo</a></div></section>
<span hidden data-purchase-analytics="{{ json_encode([
    'transaction_id' => $order->number,
    'value' => $order->total_amount / 100,
    'shipping' => $order->delivery_amount / 100,
    'currency' => 'PEN',
    'coupon' => $order->coupon_code,
    'items' => $order->items->map(fn ($item) => ['item_id' => $item->sku, 'item_name' => $item->product_name.' - '.$item->variant_name, 'price' => $item->unit_price_amount / 100, 'quantity' => $item->quantity])->values()->all(),
], JSON_UNESCAPED_UNICODE) }}"></span>
@endsection
