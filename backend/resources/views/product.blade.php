@extends('layouts.store', ['title' => ($product->meta_title ?: $product->name).' | Cacao del Perú', 'description' => $product->meta_description ?: $product->short_description])

@push('structured-data')
@php
    $schemaVariants = $product->variants->map(function ($variant) use ($product) {
        $variantImage = $variant->images->sortBy('sort_order')->first();
        return [
            '@type' => 'Product',
            'name' => $product->name.' - '.$variant->name,
            'sku' => $variant->sku,
            'description' => trim(($product->short_description ?: $product->description).' '.$variant->weight_grams.' g'),
            'image' => $variantImage ? asset('storage/'.$variantImage->path) : null,
            'weight' => ['@type' => 'QuantitativeValue', 'value' => $variant->weight_grams, 'unitCode' => 'GRM'],
            'offers' => [
                '@type' => 'Offer',
                'url' => route('product', $product).'#variant-'.$variant->id,
                'priceCurrency' => 'PEN',
                'price' => number_format($variant->currentPriceAmount() / 100, 2, '.', ''),
                'availability' => $variant->stock > 0 ? 'https://schema.org/InStock' : 'https://schema.org/OutOfStock',
                'itemCondition' => 'https://schema.org/NewCondition',
            ],
        ];
    })->all();
@endphp
@php($productSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'ProductGroup',
    'name' => $product->name,
    'description' => $product->description ?: $product->short_description,
    'productGroupID' => 'product-'.$product->id,
    'url' => route('product', $product),
    'brand' => ['@type' => 'Brand', 'name' => 'Cacao del Perú'],
    'variesBy' => ['https://schema.org/size'],
    'hasVariant' => $schemaVariants,
])
<script type="application/ld+json">{!! json_encode($productSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
@endpush

@section('content')
<section class="product product-purchase">
    @php($analyticsVariant = $product->variants->first(fn ($variant) => $variant->stock > 0) ?? $product->variants->first())
    @if($analyticsVariant)<span hidden data-product-analytics data-item-id="{{ $analyticsVariant->sku }}" data-item-name="{{ $product->name }}" data-price="{{ number_format($analyticsVariant->currentPriceAmount() / 100, 2, '.', '') }}"></span>@endif
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
                    <x-store-price :variant="$variant" />
                    @if($variant->stock > 0)
                    <form method="post" action="{{ route('cart.store') }}" data-add-to-cart data-item-id="{{ $variant->sku }}" data-item-name="{{ $product->name }} - {{ $variant->name }}" data-price="{{ number_format($variant->currentPriceAmount() / 100, 2, '.', '') }}">@csrf<input type="hidden" name="variant_id" value="{{ $variant->id }}"><label><span class="sr-only">Cantidad de {{ $variant->name }}</span><input type="number" name="quantity" value="1" min="1" max="{{ min(50, $variant->stock) }}" required></label><button type="submit">Agregar</button></form>
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
