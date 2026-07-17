@extends('layouts.store', ['title' => ($product->meta_title ?: $product->name).' | Cacao del Perú', 'description' => $product->meta_description ?: $product->short_description])

@section('content')
<section class="product product-purchase">
    @php($image = $product->images->firstWhere('is_primary', true))
    <div class="product-visual">
        @if($image)<img class="product-detail-image" data-product-hero src="{{ asset('storage/'.$image->path) }}" alt="{{ $image->alt_text ?: $product->name }}" data-default-src="{{ asset('storage/'.$image->path) }}" data-default-alt="{{ $image->alt_text ?: $product->name }}">
        @else<div class="image large"><span>{{ $product->category?->name ?? 'Selección peruana' }}</span><b>{{ $product->name }}</b></div>@endif
    </div>
    <div>
        <span class="eyebrow">{{ strtoupper($product->category?->name ?? 'SELECCIÓN PERUANA') }}</span>
        <h1>{{ $product->name }}</h1><p>{{ $product->description }}</p>
        @if(session('success'))<div class="notice success cart-confirmation">{{ session('success') }} <a href="{{ route('cart') }}"><u>Ver carrito</u></a></div>@endif
        @if($errors->any())<div class="notice error">{{ $errors->first() }}</div>@endif
        <div class="variant-shop-list">
            <h2>Elige sabores y cantidades</h2><p>Agrega cada presentación por separado. Puedes seguir eligiendo sin salir de esta página.</p>
            @foreach($product->variants as $variant)
                @php($variantImage = $variant->images->sortBy('sort_order')->first())
                <article id="variant-{{ $variant->id }}" class="variant-shop-row {{ $variant->stock < 1 ? 'unavailable' : '' }}" @if($variantImage) data-variant-image="{{ asset('storage/'.$variantImage->path) }}" data-variant-alt="{{ $variantImage->alt_text ?: $product->name.' '.$variant->name }}" tabindex="0" @endif>
                    <div><b>{{ $variant->name }}</b><small>{{ $variant->cacao_percentage ? $variant->cacao_percentage.'% cacao · ' : '' }}{{ $variant->weight_grams }} g · {{ $variant->stock > 0 ? $variant->stock.' disponibles' : 'Agotado' }}</small></div>
                    <strong>S/ {{ number_format($variant->currentPriceAmount() / 100, 2) }}</strong>
                    @if($variant->stock > 0)
                    <form method="post" action="{{ route('cart.store') }}">@csrf<input type="hidden" name="variant_id" value="{{ $variant->id }}"><label><span class="sr-only">Cantidad de {{ $variant->name }}</span><input type="number" name="quantity" value="1" min="1" max="{{ min(50, $variant->stock) }}" required></label><button type="submit">Agregar</button></form>
                    @else<span class="stock-out">Agotado</span>@endif
                </article>
            @endforeach
        </div>
        <a class="back-to-catalog" href="{{ route('catalog') }}">← Volver a todas las colecciones</a>
    </div>
</section>
<section class="related-collection"><div class="section-heading"><span class="eyebrow">TAMBIÉN PODRÍA GUSTARTE</span><h2>Continúa explorando</h2></div><div class="grid">
@foreach($relatedProducts as $related)
    @php($relatedImage = $related->images->firstWhere('is_primary', true))
    <article class="card"><a href="{{ route('product', $related) }}">@if($relatedImage)<img class="product-card-image" src="{{ asset('storage/'.$relatedImage->path) }}" alt="{{ $relatedImage->alt_text ?: $related->name }}">@else<div class="image"><span>{{ $related->category?->name ?? 'Selección peruana' }}</span><b>{{ $related->name }}</b></div>@endif</a><div class="card-body"><small>{{ $related->category?->name }}</small><h3><a href="{{ route('product', $related) }}">{{ $related->name }}</a></h3></div></article>
@endforeach
</div></section>
@endsection
