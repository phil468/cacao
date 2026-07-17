@extends('layouts.store', ['title' => 'Pedido recibido | Cacao del Perú'])
@section('content')
<section><div class="empty-state"><span class="eyebrow">PEDIDO RECIBIDO</span><h1>Gracias por tu compra</h1><p>Tu pedido es <strong>{{ $order->number }}</strong>.</p><p>Estado: {{ $order->status->name }} · Total: S/ {{ number_format($order->total_amount / 100, 2) }}</p><p>Pago seleccionado: {{ $order->paymentMethod->name }}.</p><a class="button" href="{{ route('catalog') }}">Volver al catálogo</a></div></section>
@endsection
