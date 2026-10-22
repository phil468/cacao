@extends('layouts.store', ['title' => ($privacy ? 'Política de Privacidad' : 'Términos de la promoción').' | Cacao del Perú'])
@section('content')
<section class="promo-legal"><a href="{{ route('promo') }}">← Volver a la promoción</a><h1>{{ $privacy ? 'Política de Privacidad y Tratamiento de Datos Personales' : 'Términos y Condiciones de la promoción' }}</h1>
@unless($promotion->legal_reviewed)<p class="promo-errors">BORRADOR PENDIENTE DE REVISIÓN LEGAL. Los datos y condiciones señalados como pendientes deben completarse antes de habilitar la campaña.</p>@endunless
<div class="promo-legal-content">{{ $privacy ? $promotion->privacy_content : $promotion->terms_content }}</div>
@unless($privacy)
<h2>Calendario e importes de la campaña</h2>
<p>Inicio de registros: {{ $promotion->starts_at?->timezone('America/Lima')->format('d/m/Y H:i') ?? 'Por configurar' }}.</p>
<p>Cierre de registros: {{ $promotion->ends_at?->timezone('America/Lima')->format('d/m/Y H:i') ?? 'Por configurar' }}.</p>
<p>Sorteo: {{ $promotion->draw_at?->timezone('America/Lima')->format('d/m/Y H:i') ?? 'Por configurar' }}.</p>
<p>Último día para reclamar: {{ $promotion->draw_at?->copy()->timezone('America/Lima')->addDays(15)->format('d/m/Y') ?? 'Por configurar' }}, hasta las 21:30, hora de Perú.</p>
<p>Compra mínima: S/ {{ number_format($promotion->minimum_amount / 100, 2) }}. Un código por cada S/ {{ number_format($promotion->amount_per_code / 100, 2) }} de productos después de descuentos, sin envío.</p>
@endunless
</section>
@endsection
