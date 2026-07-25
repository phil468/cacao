@extends('layouts.store', ['title' => 'Pago seguro | Cacao del Perú'])

@section('head')
    <script src="{{ $izipay['sdk_url'] }}" defer></script>
@endsection

@section('content')
<section class="payment-gateway">
    <span class="eyebrow">PAGO SEGURO</span>
    <h1>Completa tu pago con Izipay</h1>
    <p>Pedido {{ $order->number }} · Total S/ {{ number_format($order->total_amount / 100, 2) }}</p>
    <div class="notice">No cierres esta ventana hasta recibir la confirmación del pago.</div>
    <button type="button" data-izipay-open>Pagar ahora</button>
    <p class="field-error" data-izipay-error role="alert"></p>
</section>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const button = document.querySelector('[data-izipay-open]');
    const error = document.querySelector('[data-izipay-error]');
    button.addEventListener('click', async () => {
        button.disabled = true;
        error.textContent = '';
        try {
            const checkout = new Izipay({ config: @json($izipay['config']) });
            await checkout.LoadForm({
                authorization: @json($izipay['authorization']),
                keyRSA: @json($izipay['public_key']),
                callbackResponse: async response => {
                    const result = await window.axios.post(@json(route('checkout.izipay.response', $order)), response);
                    window.location.assign(result.data.redirect_url);
                },
            });
        } catch (exception) {
            error.textContent = 'No pudimos abrir el pago seguro. Inténtalo nuevamente.';
            button.disabled = false;
        }
    });
});
</script>
@endsection
