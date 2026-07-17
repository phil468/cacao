@extends('layouts.store', ['title' => 'Mis pedidos | Cacao del Perú'])
@section('content')
<section><span class="eyebrow">MI CUENTA</span><h1>Mis pedidos</h1>
<div class="order-list">@forelse($orders as $order)<a class="order-row" href="{{ route('account.orders.show', $order) }}"><div><small>{{ $order->created_at->format('d/m/Y H:i') }}</small><strong>{{ $order->number }}</strong></div><span class="status-pill">{{ $order->status->name }}</span><strong>S/ {{ number_format($order->total_amount / 100, 2) }}</strong><span>Ver detalle →</span></a>@empty<div class="empty-state"><h2>Aún no tienes pedidos</h2><a class="button" href="{{ route('catalog') }}">Explorar catálogo</a></div>@endforelse</div>
{{ $orders->links() }}</section>
@endsection
