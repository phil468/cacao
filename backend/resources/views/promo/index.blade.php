@extends('layouts.store', ['title' => 'Sorteo de Aniversario | Cacao del Perú', 'description' => 'Celebra nuestro aniversario. Registra tu código y participa en el Sorteo de Aniversario de Cacao del Perú.', 'canonical' => route('promo')])
@section('content')
@php
    $safeOld = function (string $key, string $default = ''): string {
        $value = old($key, $default);
        return is_string($value) ? $value : $default;
    };
@endphp
<div class="promotion-page">
<section class="promo-hero">
    <div><span class="eyebrow">{{ $promotion->name }}</span><h1>CELEBRAMOS NUESTRO ANIVERSARIO</h1>
    <p>Por cada S/{{ number_format($promotion->amount_per_code / 100, 0) }} de compra recibe un código y participa en nuestro Sorteo de Aniversario.</p>
    <a class="button" href="#registration">REGISTRA TU CÓDIGO <span aria-hidden="true">↗</span></a><p class="promo-hero-note">Tu compra se disfruta. Tu código participa.</p></div>
    <aside class="promo-date"><span class="promo-seal" aria-hidden="true">✦</span><span>SORTEO DE ANIVERSARIO</span><strong>{{ $promotion->draw_at?->timezone('America/Lima')->locale('es')->translatedFormat('d \d\e F') ?? 'Fecha por confirmar' }}</strong><span>Más cacao. Más momentos para celebrar.</span><a href="{{ route('promo.terms') }}">Conoce las bases del sorteo</a></aside>
</section>
<section class="promo-how" aria-label="Cómo participar"><ol><li><span>01</span><div><strong>Disfruta tu compra</strong><p>Recibe tu cupón impreso al entregar tu compra.</p></div></li><li><span>02</span><div><strong>Registra tu código</strong><p>Completa tus datos y el código de tu cupón.</p></div></li><li><span>03</span><div><strong>¡Ya estás participando!</strong><p>Cada código registrado es una participación.</p></div></li></ol></section>
<section class="promo-prizes" aria-labelledby="prizes-title"><span class="eyebrow">CELEBRAMOS CONTIGO</span><h2 id="prizes-title">Premios para disfrutar</h2>
    <div class="promo-prize-grid">
        <article><span class="promo-prize-icon" aria-hidden="true"><svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="2"><rect x="12" y="12" width="40" height="40" rx="4"/><path d="M25 12v40M39 12v40M12 26h40M12 39h40"/></svg></span><span class="promo-prize-label">PARA COMPARTIR</span><h3>Caja de 10 chocolates Miskicha</h3><p>Un momento de chocolate para compartir.</p></article>
        <article><span class="promo-prize-icon" aria-hidden="true"><svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 25h30v15a12 12 0 0 1-12 12h-6a12 12 0 0 1-12-12ZM42 27h4a8 8 0 0 1 0 16h-4M8 56h42M20 18V8M32 18V5"/></svg></span><span class="promo-prize-label">PARA DISFRUTAR</span><h3>Polvo de cacao + Café Molido</h3><p>El sabor de nuestras mejores pausas.</p></article>
        <article><span class="promo-prize-icon" aria-hidden="true"><svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 22h28v30H16ZM12 18h36M30 18V8M24 8h12M44 27h5a7 7 0 0 1 0 14h-5M16 43h28M12 56h36"/></svg></span><span class="promo-prize-label">TU MEJOR PAUSA</span><h3>Café Molido + prensa francesa</h3><p>Un ritual para saborear cada día.</p></article>
    </div>
</section>
<section class="promo-registration" id="registration" tabindex="-1">
    <div><span class="eyebrow">TU CÓDIGO, TU PARTICIPACIÓN</span><h2>{{ $hasParticipant ? '¿Tienes otro código?' : 'Registra tu código' }}</h2>
        <p>Recibe tu cupón impreso al entregar tu compra. <br>
             Cada código registrado representa una participación.</p>
        @if($promotion->starts_at && $promotion->ends_at)<p>Registros: {{ $promotion->starts_at->timezone('America/Lima')->format('d/m/Y') }} al {{ $promotion->ends_at->timezone('America/Lima')->format('d/m/Y') }} (hora de Perú).</p>@endif
        @if($hasParticipant)
            <aside class="promo-participant" aria-label="Participante de esta sesión">
                <h3>Estás registrando códigos para:</h3>
                @if($maskedIdentity)
                    <dl><dt>Nombre</dt><dd>{{ $maskedIdentity['full_name'] }}</dd><dt>Celular</dt><dd>{{ $maskedIdentity['phone'] }}</dd><dt>Correo</dt><dd>{{ $maskedIdentity['email'] }}</dd></dl>
                    <p>Datos ingresados en esta sesión, mostrados parcialmente por privacidad. El siguiente código se agregará a esta misma persona.</p>
                @else
                    <p>El participante de esta sesión anterior. No hay un resumen de sus datos disponible; no se mostrarán datos de otros registros.</p>
                @endif
                <p>¿No corresponde? Usa «Registrar para otra persona» antes de agregar otro código.</p>
            </aside>
            <p class="promo-count">Tienes {{ $participations }} {{ $participations === 1 ? 'participación' : 'participaciones' }}.</p>
            <p>Códigos registrados en esta sesión:</p><ul class="promo-code-list">@foreach($codes as $code)<li><strong>{{ $code->code }}</strong> {{ $code->status === 'registered' ? '✓' : '— Invalidado' }}</li>@endforeach</ul>
            <form action="{{ route('promo.reset') }}" method="post">@csrf<button class="promo-reset" type="submit">Registrar para otra persona</button></form>
        @endif
    </div>
    <div class="form-card">
        <div class="promo-form-heading"><span class="eyebrow">UN PASO MÁS PARA PARTICIPAR</span><h3>{{ $hasParticipant ? 'Suma otra participación' : 'Tu próximo momento especial empieza aquí' }}</h3><p>Ten a mano el código de 6 caracteres de tu cupón.</p></div>
        @if(session('promo_success'))<div class="promo-feedback" role="status"><h3>¡Código registrado!</h3><p>Ya estás participando en nuestro Sorteo de Aniversario.</p></div>@endif
        @if($errors->any())<div class="promo-errors" role="alert"><ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
        @if($promotion->acceptsRegistrations())
        <form action="{{ route('promo.register') }}" method="post">@csrf
            @unless($hasParticipant)
                <label for="promo-name">Nombre completo *</label><input id="promo-name" name="full_name" autocomplete="name" maxlength="120" value="{{ $safeOld('full_name') }}" required>
                <label for="promo-email">Correo electrónico *</label><input id="promo-email" type="email" name="email" autocomplete="email" maxlength="255" value="{{ $safeOld('email') }}" required>
                <label for="promo-phone">Celular *</label><input id="promo-phone" type="tel" name="phone" autocomplete="tel" maxlength="30" value="{{ $safeOld('phone') }}" required>
            @endunless
            <label for="promo-code">Código *</label><input class="promo-code-input" id="promo-code" name="code" autocomplete="off" minlength="6" maxlength="6" pattern="[ABCDEFGHJKMNPQRSTUVWXYZabcdefghjkmnpqrstuvwxyz23456789]{6}" value="{{ $safeOld('code', $prefill) }}" required @if($prefill) autofocus @endif>
            <div class="promo-honeypot" aria-hidden="true"><label for="promo-website">Deja este campo vacío</label><input id="promo-website" name="website" tabindex="-1" autocomplete="off"></div>
            @unless($hasParticipant)
                <label class="check-field"><input type="checkbox" name="terms_accepted" value="1" required><span>Declaro tener 18 años o más, residir en Perú y haber leído y aceptado los <a href="{{ route('promo.terms') }}" target="_blank" rel="noopener">Términos y Condiciones</a> y la <a href="{{ route('privacy') }}" target="_blank" rel="noopener">Política de Privacidad</a> para gestionar mi participación.</span></label>
                <label class="check-field"><input type="checkbox" name="marketing_consent" value="1"><span>Quiero recibir novedades, ofertas y promociones de Cacao del Perú.</span></label>
            @endunless
            <p><a href="{{ route('privacy') }}" target="_blank" rel="noopener">Política de Privacidad y Tratamiento de Datos Personales</a></p>
            <button type="submit">{{ $hasParticipant ? 'AGREGAR OTRO CÓDIGO' : 'REGISTRAR MI CÓDIGO' }}</button>
        </form>
        @else<p>La promoción no está disponible para registros en este momento.</p><a href="{{ route('promo.terms') }}">Consulta los Términos y Condiciones</a>@endif
    </div>
</section>
</div>
@endsection
