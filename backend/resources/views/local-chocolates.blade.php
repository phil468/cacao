@extends('layouts.store', [
    'title' => 'Chocolates en Ica con delivery | Cacao del Perú',
    'description' => 'Compra chocolates de 60%, 70%, 80% y 100% cacao, grageas y regalos con entrega en los distritos de la provincia de Ica.',
])

@section('content')
<section class="local-hero">
    <div>
        <span class="eyebrow">CHOCOLATES EN ICA</span>
        <h1>Chocolate peruano para regalar, compartir y disfrutar en Ica</h1>
        <p>Elige chocolates, grageas y productos derivados del cacao. Entregamos en distritos habilitados de la provincia de Ica y confirmamos cada pedido antes del envío.</p>
        <a class="button" href="{{ route('catalog') }}" data-analytics-event="select_content" data-analytics-content="local_ica_catalog">Ver chocolates disponibles</a>
    </div>
    <div class="local-hero-note"><strong>Compra local y segura</strong><span>Precios en soles</span><span>Stock actualizado</span><span>Pago por Yape u otros métodos configurados</span></div>
</section>
<section class="local-benefits">
    <div class="section-heading"><span class="eyebrow">DESDE ICA</span><h2>Una compra sencilla, con atención cercana</h2></div>
    <div class="grid">
        <article class="form-card"><h3>1. Elige</h3><p>Compara sabores, porcentaje de cacao, peso, precio y disponibilidad real.</p></article>
        <article class="form-card"><h3>2. Coordina</h3><p>Selecciona tu distrito y conoce la tarifa antes de confirmar el pedido.</p></article>
        <article class="form-card"><h3>3. Recibe</h3><p>Consulta el seguimiento desde tu cuenta y recibe actualizaciones del pedido.</p></article>
    </div>
</section>
<section class="catalog-invitation"><span class="eyebrow">¿BUSCAS UN REGALO?</span><h2>Encuentra una presentación para cada momento</h2><p>Explora opciones con 60%, 70%, 80% y 100% cacao, además de grageas y productos seleccionados.</p><a class="button" href="{{ route('catalog') }}">Ir al catálogo</a></section>
@endsection

@push('structured-data')
@php($localPageSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'WebPage',
    'name' => 'Chocolates en Ica',
    'url' => route('local.chocolates'),
    'description' => 'Chocolates y productos derivados del cacao con entrega en Ica.',
    'about' => ['@id' => url('/').'#store'],
])
<script type="application/ld+json">{!! json_encode($localPageSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
@endpush
