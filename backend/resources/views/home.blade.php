@extends('layouts.store', [
    'title' => 'Chocolates peruanos en Ica | Cacao del Perú',
    'description' => 'Compra chocolates peruanos, grageas, cacao y café en Ica. Elige sabores y porcentajes de cacao, con delivery o recojo y pago por Yape.',
    'canonical' => route('home'),
])
@section('content')
<section class="banner-carousel" data-banner-carousel data-interval="{{ $carouselIntervalSeconds * 1000 }}" aria-label="Novedades de Cacao del Perú">
    <div class="banner-track">
        @if($banners->isEmpty())
            <article class="banner-slide default-banner" data-banner-slide>
                <img src="{{ asset('images/brand/cacao-botanical-hero.jpg') }}" alt="Ilustraciones botánicas de mazorcas de cacao" fetchpriority="high">
                <div class="default-banner-copy">
                    <span class="eyebrow">CACAO PERUANO · EDICIÓN SELECTA</span>
                    <h2>El lujo también tiene origen.</h2>
                    <p>Chocolate de carácter profundo, detalles impecables y sabores que celebran la riqueza del Perú.</p>
                    <a class="button" href="{{ route('catalog') }}">Ir al Catálogo</a>
                </div>
            </article>
        @endif
        @foreach($banners as $banner)
            <article class="banner-slide managed-banner" data-banner-slide @if(!$loop->first) hidden @endif>
                @if($banner->button_url)<a href="{{ $banner->button_url }}" aria-label="{{ $banner->button_label ?: $banner->title }}">@endif
                    <img src="{{ asset('storage/'.$banner->image_path) }}" alt="{{ $banner->title }}" loading="lazy">
                @if($banner->button_url)</a>@endif
                @if($banner->body || ($banner->button_label && $banner->button_url))
                    <div class="banner-caption">
                        <span class="eyebrow">{{ $banner->title }}</span>
                        @if($banner->body)<p>{{ $banner->body }}</p>@endif
                        @if($banner->button_label && $banner->button_url)<a class="button" href="{{ $banner->button_url }}">{{ $banner->button_label }}</a>@endif
                    </div>
                @endif
            </article>
        @endforeach
    </div>
    @if($banners->count() > 1)
        <button class="banner-control previous" type="button" data-banner-previous aria-label="Banner anterior"><span>‹</span></button>
        <button class="banner-control next" type="button" data-banner-next aria-label="Banner siguiente"><span>›</span></button>
        <div class="banner-dots" aria-label="Seleccionar banner">
            @foreach($banners as $banner)<button type="button" data-banner-dot="{{ $loop->index }}" @class(['active' => $loop->first]) aria-label="Mostrar banner {{ $loop->iteration }}"></button>@endforeach
        </div>
    @endif
</section>
<section class="store-discover" aria-labelledby="discover-title"><div><span class="eyebrow">UN SABOR PARA CADA MOMENTO</span><h2 id="discover-title">¿Qué te provoca hoy?</h2></div><div class="store-category-links"><a href="{{ route('catalog', ['category' => 'chocolates']) }}"><span aria-hidden="true">01</span> Chocolates <span aria-hidden="true">↗</span></a><a href="{{ route('catalog', ['category' => 'grageas']) }}"><span aria-hidden="true">02</span> Grageas <span aria-hidden="true">↗</span></a><a href="{{ route('catalog') }}"><span aria-hidden="true">03</span> Explorar todo <span aria-hidden="true">↗</span></a></div></section>
<section class="collection">
    <div class="section-heading"><span class="eyebrow">CHOCOLATES PERUANOS EN ICA</span><h1>Chocolate, grageas y cacao para regalar o disfrutar</h1><p>Compra sabores seleccionados con stock actualizado, entrega a domicilio en Ica o recojo en nuestros puntos disponibles.</p></div>
    <div class="grid">@foreach($featured as $product) @php($image = $product->images->firstWhere('is_primary', true))<article class="card"><a href="{{ route('product',$product) }}"><div class="card-media">@if($image)<img class="product-card-image store-featured-image" src="{{ asset('storage/'.$image->path) }}" alt="{{ $image->alt_text ?: $product->name }}" loading="lazy">@else<div class="image"><span>{{ $product->category?->name ?? 'Cacao del Perú' }}</span><b>{{ $product->name }}</b></div>@endif</div></a><div class="card-body"><small>{{ $product->variants->first()?->cacao_percentage ? $product->variants->first()->cacao_percentage.'% cacao' : 'Selección peruana' }}</small><h3><a href="{{ route('product',$product) }}">{{ $product->name }}</a></h3><p>{{ $product->short_description }}</p><strong>S/ {{ number_format(($product->variants->first()?->currentPriceAmount() ?? 0)/100,2) }}</strong><a class="card-action" href="{{ route('product',$product) }}">Ver presentaciones <span aria-hidden="true">↗</span></a></div></article>@endforeach</div>
</section>
<section class="catalog-invitation"><span class="eyebrow">TODAS LAS PRESENTACIONES</span><h2>Encuentra tu próximo favorito</h2><p>Explora chocolates, grageas, cacao y café disponibles desde Ica.</p><a class="button" href="{{ route('catalog') }}">Ver todos los productos</a></section>
<section class="manifesto"><span class="eyebrow">HECHO PARA COMPARTIR</span><blockquote>“Del cacao nace una experiencia. Del detalle, un recuerdo.”</blockquote><p>Presentaciones elegantes y sabores peruanos para obsequiar, celebrar o disfrutar sin ocasión.</p></section>
@endsection
