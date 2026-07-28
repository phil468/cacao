<!doctype html>
<html lang="es-PE">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Cacao del Perú — Chocolates en Ica' }}</title>
    <meta name="description" content="{{ $description ?? 'Chocolates y productos derivados del cacao con entrega en Ica, Perú.' }}">
    <meta name="robots" content="{{ $robots ?? 'index,follow,max-image-preview:large' }}">
    <link rel="canonical" href="{{ $canonical ?? url()->current() }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/brand/favicon/favicon-32.png') }}">
    <link rel="icon" type="image/png" sizes="512x512" href="{{ asset('images/brand/favicon/favicon-512.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/brand/favicon/apple-touch-icon.png') }}">
    @if($googleSiteVerification)<meta name="google-site-verification" content="{{ $googleSiteVerification }}">@endif
    <meta property="og:locale" content="es_PE">
    <meta property="og:type" content="{{ $ogType ?? 'website' }}">
    <meta property="og:site_name" content="Cacao del Perú">
    <meta property="og:title" content="{{ $title ?? 'Cacao del Perú' }}">
    <meta property="og:description" content="{{ $description ?? 'Chocolates y productos derivados del cacao con entrega en Ica, Perú.' }}">
    <meta property="og:url" content="{{ $canonical ?? url()->current() }}">
    <meta property="og:image" content="{{ $ogImage ?? asset('images/brand/cacao-botanical-hero.jpg') }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="theme-color" content="#24140f">
    @php($storeSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'OnlineStore',
        '@id' => url('/').'#store',
        'name' => data_get($businessIdentity, 'name', 'Cacao del Perú'),
        'url' => url('/'),
        'logo' => asset('images/brand/cacao-del-peru-logo.png'),
        'email' => data_get($businessContact, 'email'),
        'telephone' => data_get($businessContact, 'phone'),
        'areaServed' => ['@type' => 'AdministrativeArea', 'name' => 'Ica, Perú'],
        'address' => [
            '@type' => 'PostalAddress',
            'addressLocality' => 'Ica',
            'addressRegion' => 'Ica',
            'addressCountry' => 'PE',
        ],
        'currenciesAccepted' => 'PEN',
    ])
    <script type="application/ld+json">{!! json_encode($storeSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
    @stack('structured-data')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @yield('head')
</head>
<body data-ga-id="{{ $googleAnalyticsId }}">
<div class="announcement">Desde Ica para el Perú · Cacao peruano seleccionado</div>
<header class="site-header">
    <a class="brand" href="{{ route('home') }}" aria-label="Cacao del Perú"><img src="{{ asset('images/brand/cacao-del-peru-logo.png') }}" alt="Cacao del Perú"></a>
    <button class="navigation-toggle" type="button" aria-expanded="false" aria-controls="store-navigation" aria-label="Abrir menú principal" data-navigation-toggle>
        <span></span><span></span><span></span>
    </button>
    <nav id="store-navigation" aria-label="Navegación principal" data-store-navigation>
        <a href="{{ route('catalog') }}">Catálogo</a><a href="{{ route('local.chocolates') }}">Chocolate en Ica</a><a href="{{ route('faq') }}">Preguntas</a><a href="{{ route('contact') }}">Contacto</a>
        @auth
            <div class="account-menu"><button type="button" aria-expanded="false" data-account-toggle>Mi cuenta <span>⌄</span></button><div class="account-dropdown"><a href="{{ route('account.orders.index') }}">Mis pedidos</a><a href="{{ route('account.addresses.index') }}">Direcciones</a><form method="post" action="{{ route('logout') }}">@csrf<button>Salir</button></form></div></div>
        @else<a href="{{ route('login') }}">Ingresar</a>@endauth
        <a class="cart-link" href="{{ route('cart') }}" data-analytics-event="view_cart">Carrito @if(session('storefront_cart'))({{ array_sum(session('storefront_cart')) }})@endif</a>
    </nav>
</header>
<main>@yield('content')</main>
<footer><img src="{{ asset('images/brand/cacao-del-peru-logo-white.png') }}" alt="Cacao del Perú"><div><p>Chocolate peruano con entrega en Ica.</p><p><a href="{{ route('local.chocolates') }}">Comprar chocolates en Ica</a> · <a href="{{ route('contact') }}">Contacto</a></p><small>© {{ date('Y') }} cacaodelperu.com · Ica, Perú</small></div></footer>
@if(config('services.whatsapp.number'))<a class="whatsapp-float" href="https://wa.me/{{ preg_replace('/\D+/', '', config('services.whatsapp.number')) }}?text={{ urlencode(config('services.whatsapp.message')) }}" target="_blank" rel="noopener noreferrer" aria-label="Chatear con Cacao del Perú por WhatsApp" data-analytics-event="contact" data-analytics-method="whatsapp"><span>WhatsApp</span><img src="{{ asset('images/icons/whatsapp.svg') }}" alt=""></a>@endif
@if($googleAnalyticsId)
<aside class="consent-banner" data-consent-banner hidden aria-label="Preferencias de privacidad">
    <div><strong>Tu privacidad importa</strong><p>Usamos medición anónima para entender qué productos interesan y mejorar la tienda. Solo se activa si aceptas.</p></div>
    <div><button type="button" class="secondary" data-consent-reject>Solo necesarias</button><button type="button" data-consent-accept>Aceptar medición</button></div>
</aside>
@endif
</body>
</html>
