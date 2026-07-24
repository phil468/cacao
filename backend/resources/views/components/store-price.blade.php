@props(['variant'])

<div {{ $attributes->class(['store-price', 'has-promotion' => $variant->hasActivePromotion()]) }}>
    @if($variant->hasActivePromotion())
        <span class="promotion-label">Oferta</span>
        <span class="regular-price">S/ {{ number_format($variant->price_amount / 100, 2) }}</span>
    @endif
    <strong class="selling-price">S/ {{ number_format($variant->currentPriceAmount() / 100, 2) }}</strong>
</div>
