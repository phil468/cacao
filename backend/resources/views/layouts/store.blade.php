<!doctype html>
<html lang="es-PE">
<head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>{{ $title ?? 'Cacao del Perú — Chocolate peruano' }}</title><meta name="description" content="{{ $description ?? 'Chocolates y productos de cacao peruano, elaborados para regalar y disfrutar.' }}"><meta name="robots" content="index,follow"><link rel="canonical" href="{{ url()->current() }}"><link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/brand/favicon/favicon-32.png') }}"><link rel="icon" type="image/png" sizes="512x512" href="{{ asset('images/brand/favicon/favicon-512.png') }}"><link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/brand/favicon/apple-touch-icon.png') }}"><meta property="og:locale" content="es_PE"><meta property="og:type" content="website"><meta property="og:title" content="{{ $title ?? 'Cacao del Perú' }}"><meta property="og:description" content="{{ $description ?? 'Chocolates y productos de cacao peruano, elaborados para regalar y disfrutar.' }}"><meta property="og:url" content="{{ url()->current() }}"><meta name="theme-color" content="#24140f">@vite(['resources/css/app.css', 'resources/js/app.js'])</head>
<body>
<div class="announcement">Desde Ica para el Perú · Cacao peruano seleccionado</div>
<header class="site-header">
    <a class="brand" href="{{ route('home') }}" aria-label="Cacao del Perú"><img src="{{ asset('images/brand/cacao-del-peru-logo.png') }}" alt="Cacao del Perú"></a>
    <nav aria-label="Navegación principal">
        <a href="{{ route('catalog') }}">Catálogo</a><a href="{{ route('faq') }}">Preguntas</a><a href="{{ route('contact') }}">Contacto</a>
        @auth
            <div class="account-menu"><button type="button" aria-expanded="false" data-account-toggle>Mi cuenta <span>⌄</span></button><div class="account-dropdown"><a href="{{ route('account.orders.index') }}">Mis pedidos</a><a href="{{ route('account.addresses.index') }}">Direcciones</a><form method="post" action="{{ route('logout') }}">@csrf<button>Salir</button></form></div></div>
        @else<a href="{{ route('login') }}">Ingresar</a>@endauth
        <a class="cart-link" href="{{ route('cart') }}">Carrito @if(session('storefront_cart'))({{ array_sum(session('storefront_cart')) }})@endif</a>
    </nav>
</header>
<main>@yield('content')</main>
<footer><img src="{{ asset('images/brand/cacao-del-peru-logo-white.png') }}" alt="Cacao del Perú"><div><p>Chocolate peruano para momentos extraordinarios.</p><small>© {{ date('Y') }} cacaodelperu.com · Ica, Perú</small></div></footer>
@if(config('services.whatsapp.number'))<a class="whatsapp-float" href="https://wa.me/{{ preg_replace('/\D+/', '', config('services.whatsapp.number')) }}?text={{ urlencode(config('services.whatsapp.message')) }}" target="_blank" rel="noopener noreferrer" aria-label="Chatear con Cacao del Perú por WhatsApp"><span>WhatsApp</span><img src="{{ asset('images/icons/whatsapp.svg') }}" alt=""></a>@endif
</body>
</html>
