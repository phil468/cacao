@extends('layouts.store', ['title' => 'Detalle del pedido | Cacao del Perú'])

@section('content')
<section>
    <a href="{{ route('account.orders.index') }}">← Mis pedidos</a>
    <span class="eyebrow">PEDIDO</span>
    <h1>{{ $order->number }}</h1>
    <div class="order-detail-grid">
        <div>
            <h2>Productos</h2>
            @foreach($order->items as $item)
                <article class="order-line">
                    <div>
                        <strong>{{ $item->product_name }}</strong>
                        <p>{{ $item->variant_name }} · {{ $item->sku }}</p>
                        @if($item->returned_quantity > 0)
                            <p><strong>Devuelto: {{ $item->returned_quantity }} de {{ $item->quantity }}</strong></p>
                        @endif
                    </div>
                    <span>{{ $item->quantity }} × S/ {{ number_format($item->unit_price_amount / 100, 2) }}</span>
                    <strong>S/ {{ number_format($item->line_total_amount / 100, 2) }}</strong>
                </article>
            @endforeach

            @if($order->returns->isNotEmpty())
                <h2>Devoluciones</h2>
                @foreach($order->returns as $return)
                    <article class="order-line">
                        <div><strong>Devolución {{ Str::limit($return->number, 12, '') }}</strong><p>{{ $return->reason }}</p></div>
                        <span>{{ $return->items->sum('quantity') }} unidad(es)</span>
                        <strong>{{ $return->created_at->timezone('America/Lima')->format('d/m/Y H:i') }}</strong>
                    </article>
                @endforeach
            @endif
        </div>
        <aside class="cart-summary">
            <span class="eyebrow">RESUMEN</span>
            <p>Estado: <strong>{{ $order->status->name }}</strong></p>
            <p>Pago: {{ $order->paymentMethod->name }}</p>
            <div><span>Subtotal</span><strong>S/ {{ number_format($order->subtotal_amount / 100, 2) }}</strong></div>
            <div><span>Envío</span><strong>S/ {{ number_format($order->delivery_amount / 100, 2) }}</strong></div>
            <div><span>Total</span><strong>S/ {{ number_format($order->total_amount / 100, 2) }}</strong></div>
            @if($order->fulfillment_type === 'pickup')
                <h3>Recojo en local o feria</h3>
                <p>
                    <strong>{{ data_get($order->pickup_location_snapshot, 'name') }}</strong><br>
                    {{ data_get($order->pickup_location_snapshot, 'address_line') }}<br>
                    {{ data_get($order->pickup_location_snapshot, 'district') }}, {{ data_get($order->pickup_location_snapshot, 'province') }}
                </p>
            @else
                <h3>Entrega</h3>
                <p>{{ data_get($order->delivery_address, 'recipient_name') }}<br>
                    {{ data_get($order->delivery_address, 'line_one') }}<br>
                    {{ data_get($order->delivery_address, 'district') }}, {{ data_get($order->delivery_address, 'province') }}</p>
            @endif
        </aside>
    </div>
    <h2>Seguimiento</h2>
    <ol class="timeline">
        @foreach($order->statusHistories->sortByDesc('created_at') as $history)
            <li><strong>{{ $history->status->name }}</strong><span>{{ $history->created_at->format('d/m/Y H:i') }}</span>@if($history->note)<p>{{ $history->note }}</p>@endif</li>
        @endforeach
    </ol>
</section>
@endsection
