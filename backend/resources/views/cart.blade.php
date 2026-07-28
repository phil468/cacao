@extends('layouts.store', ['title' => 'Tu carrito | Cacao del Perú'])

@section('content')
<section class="cart-page">
    <span class="eyebrow">TU SELECCIÓN</span>
    <h1>Carrito</h1>
    @if(session('success'))<div class="notice success">{{ session('success') }}</div>@endif

    @if($items->isEmpty())
        <div class="empty-state"><h2>Tu carrito está vacío</h2><p>Descubre chocolates y productos de cacao peruano.</p><a class="button" href="{{ route('catalog') }}">Ver catálogo</a></div>
    @else
        <div class="cart-layout">
            <div class="cart-items">
                @foreach($items as $item)
                    @php
                        $cartImage = $item['variant']->images->sortBy('sort_order')->first()
                            ?? $item['variant']->product->images->whereNull('product_variant_id')->firstWhere('is_primary', true);
                    @endphp
                    <article class="cart-item">
                        <div class="cart-item-product">
                            @if($cartImage)
                                <img class="cart-item-thumbnail" src="{{ asset('storage/'.$cartImage->path) }}" alt="{{ $cartImage->alt_text ?: $item['variant']->product->name.' '.$item['variant']->name }}" loading="lazy">
                            @else
                                <div class="cart-item-thumbnail cart-item-thumbnail-placeholder" aria-hidden="true">{{ str($item['variant']->product->name)->substr(0, 1) }}</div>
                            @endif
                            <div><small>{{ $item['variant']->sku }}</small><h2>{{ $item['variant']->product->name }}</h2><p>{{ $item['variant']->name }} · {{ $item['variant']->weight_grams }} g</p></div>
                        </div>
                        <form method="post" action="{{ route('cart.update', $item['variant']) }}">@csrf @method('PATCH')<label>Cantidad<input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" max="{{ $item['variant']->stock }}"><button>Actualizar</button></label></form>
                        <strong>S/ {{ number_format($item['line_total'] / 100, 2) }}</strong>
                        <form method="post" action="{{ route('cart.destroy', $item['variant']) }}">@csrf @method('DELETE')<button class="text-button">Retirar</button></form>
                    </article>
                @endforeach
            </div>
            <aside class="cart-summary"><span class="eyebrow">RESUMEN</span><div><span>Subtotal</span><strong>S/ {{ number_format($subtotal / 100, 2) }}</strong></div><p>El envío y los descuentos se calcularán en el checkout.</p><a class="button" href="{{ route('checkout') }}" data-analytics-event="begin_checkout">Continuar compra</a></aside>
        </div>
    @endif
</section>
@endsection
