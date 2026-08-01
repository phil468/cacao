@extends('layouts.store', [
    'title' => $seoTitle,
    'description' => $seoDescription,
    'canonical' => $seoCanonical,
    'robots' => $seoRobots,
])

@section('content')
<section>
    <span class="eyebrow">CATÁLOGO</span>
    <h1>Elige tu presentación favorita</h1>
    <p>Explora sabores y presentaciones disponibles. Cada tarjeta corresponde a una variante que puedes comprar.</p>
    <form class="catalog-filters" action="{{ route('catalog') }}" method="get">
        <label>Buscar<input name="q" value="{{ request('q') }}" placeholder="Producto, sabor o SKU"></label>
        <label>Categoría<select name="category"><option value="">Todas</option>@foreach($categories as $category)<option value="{{ $category->slug }}" @selected($selectedCategory === $category->slug)>{{ $category->name }}</option>@endforeach</select></label>
        <label>Porcentaje de cacao<select name="cacao"><option value="">Todos</option>@foreach([60, 70, 80, 100] as $percentage)<option value="{{ $percentage }}" @selected((int) request('cacao') === $percentage)>{{ $percentage }}%</option>@endforeach</select></label>
        <label>Precio mínimo<input name="min_price" type="number" min="0" step="0.01" value="{{ request('min_price') }}"></label>
        <label>Precio máximo<input name="max_price" type="number" min="0" step="0.01" value="{{ request('max_price') }}"></label>
        <label class="check-field"><input name="availability" type="checkbox" value="in_stock" @checked(request('availability') === 'in_stock')> Solo disponibles</label>
        <button>Aplicar filtros</button><a class="filter-reset" href="{{ route('catalog') }}">Limpiar</a>
    </form>
    <div class="grid variant-catalog-grid">
        @forelse($variants as $variant)
            @php
                $product = $variant->product;
                $variantImages = $variant->images->sortBy('sort_order')->values();
                $fallbackImage = $product->images->whereNull('product_variant_id')->firstWhere('is_primary', true);
                $cardImages = $variantImages->isNotEmpty()
                    ? $variantImages
                    : ($fallbackImage ? collect([$fallbackImage]) : collect());
            @endphp
            <article class="card variant-card">
                <a href="{{ route('product', $product) }}#variant-{{ $variant->id }}">
                    <div class="card-media variant-image-carousel" @if($cardImages->count() > 1) data-variant-card-carousel @endif>
                        @forelse($cardImages as $image)
                            <img
                                class="product-card-image variant-card-slide{{ $loop->first ? ' is-active' : '' }}"
                                src="{{ asset('storage/'.$image->path) }}"
                                alt="{{ $image->alt_text ?: $product->name.' '.$variant->name }}"
                                loading="lazy"
                                @if(!$loop->first) aria-hidden="true" @endif
                            >
                        @empty
                            <div class="image"><span>{{ $product->category?->name ?? 'Selección peruana' }}</span><b>{{ $product->name }}</b></div>
                        @endforelse
                        @if($cardImages->count() > 1)
                            <span class="variant-carousel-count" aria-hidden="true">{{ $cardImages->count() }} imágenes</span>
                        @endif
                    </div>
                </a>
                <div class="card-body">
                    <small>{{ $product->category?->name ?? 'Selección peruana' }}</small>
                    <h2><a href="{{ route('product', $product) }}#variant-{{ $variant->id }}">{{ $variant->name }}</a></h2>
                    <p class="variant-parent">{{ $product->name }}</p>
                    <p>{{ $variant->cacao_percentage ? $variant->cacao_percentage.'% cacao · ' : '' }}{{ $variant->weight_grams }} g</p>
                    @if($variant->stock > 0)<x-store-price :variant="$variant" />@else<span class="stock-out">Agotado</span>@endif
                    <a class="card-action" href="{{ route('product', $product) }}#variant-{{ $variant->id }}">Ver y agregar</a>
                </div>
            </article>
        @empty
            <p>No encontramos variantes para tu búsqueda.</p>
        @endforelse
    </div>
    {{ $variants->withQueryString()->links() }}
</section>
@endsection
