@extends('layouts.store', ['title' => 'Finaliza tu compra | Cacao del Perú'])

@section('content')
<section>
    <span class="eyebrow">CHECKOUT SEGURO</span>
    <h1>Datos de entrega y pago</h1>

    @if($errors->any())
        <div class="notice error">{{ $errors->first() }}</div>
    @endif

    @if($deliveryRates->isEmpty() && $pickupLocations->isEmpty())
        <div class="notice error">Aún no hay una modalidad de entrega disponible. Contáctanos para coordinar tu pedido.</div>
    @else
        <form class="checkout-form" method="post" action="{{ route('checkout.store') }}" enctype="multipart/form-data"
              data-checkout-form data-quote-url="{{ route('checkout.quote') }}">
            @csrf
            <div class="form-card">
                <h2>¿Cómo quieres recibir tu pedido?</h2>
                <div class="fulfillment-options">
                    @if($deliveryRates->isNotEmpty())
                        <label class="fulfillment-option">
                            <input type="radio" name="fulfillment_type" value="delivery"
                                @checked(old('fulfillment_type', 'delivery') === 'delivery')>
                            <span><b>Entrega a domicilio</b><small>Calculamos el costo según tu distrito.</small></span>
                        </label>
                    @endif
                    @if($pickupLocations->isNotEmpty())
                        <label class="fulfillment-option">
                            <input type="radio" name="fulfillment_type" value="pickup"
                                @checked(old('fulfillment_type', $deliveryRates->isEmpty() ? 'pickup' : 'delivery') === 'pickup')>
                            <span><b>Recoger en local o feria</b><small>Sin costo de envío.</small></span>
                        </label>
                    @endif
                </div>

                <label>Destinatario<input name="recipient_name" value="{{ old('recipient_name', $defaultAddress?->recipient_name ?? $user->name) }}" required></label>
                <label>Teléfono<input name="phone" value="{{ old('phone', $defaultAddress?->phone ?? $user->phone) }}" required></label>

                <div data-delivery-fields>
                    @if($defaultAddress)
                        <p class="notice success">Usamos tu dirección predeterminada. Puedes modificarla o administrarla en <a href="{{ route('account.addresses.index') }}"><u>Mis direcciones</u></a>.</p>
                    @endif
                    <label>Dirección<input name="line_one" value="{{ old('line_one', $defaultAddress?->line_one) }}"></label>
                    <label>Referencia<textarea name="reference">{{ old('reference', $defaultAddress?->reference) }}</textarea></label>
                    <div class="form-grid">
                        <label>Distrito <b class="required-mark">*</b>
                            <select name="district" aria-describedby="district-error">
                                <option value="">Selecciona un distrito</option>
                                @foreach($districts as $district)
                                    <option value="{{ $district }}" @selected(old('district', $defaultAddress?->district) === $district)>{{ $district }}</option>
                                @endforeach
                            </select>
                            <small id="district-error" class="field-error" data-district-error>@error('district'){{ $message }}@enderror</small>
                        </label>
                        <label>Provincia<input name="province" value="Ica" readonly></label>
                        <label>Departamento<input name="department" value="Ica" readonly></label>
                    </div>
                    <div class="delivery-note">
                        <strong>Tarifa calculada por distrito</strong>
                        @foreach($deliveryRates as $rate)
                            <p>{{ $rate->deliveryZone->name }}: S/ {{ number_format($rate->amount / 100, 2) }}
                                @if($rate->free_from_amount) · Gratis desde S/ {{ number_format($rate->free_from_amount / 100, 2) }} @endif
                            </p>
                        @endforeach
                    </div>
                </div>

                @if($pickupLocations->isNotEmpty())
                    <div class="pickup-location-list" data-pickup-fields>
                        <h3>Elige dónde recoger</h3>
                        @foreach($pickupLocations as $location)
                            <label class="pickup-location">
                                <input type="radio" name="pickup_location_id" value="{{ $location->id }}"
                                    @checked((int) old('pickup_location_id') === $location->id)>
                                <span>
                                    <b>{{ $location->name }}</b>
                                    <small>{{ $location->address_line }}, {{ $location->district }}</small>
                                    @if($location->reference)<small>Referencia: {{ $location->reference }}</small>@endif
                                    @if($location->ends_at)<em>Disponible hasta {{ $location->ends_at->format('d/m/Y H:i') }}</em>@endif
                                    @if($location->instructions)<small>{{ $location->instructions }}</small>@endif
                                </span>
                            </label>
                        @endforeach
                        <small class="field-error" data-pickup-error>@error('pickup_location_id'){{ $message }}@enderror</small>
                    </div>
                @endif
            </div>

            <div class="form-card">
                <h2>Pago</h2>
                <div class="payment-methods">
                    @foreach($paymentMethods as $method)
                        <label class="payment-method">
                            <input type="radio" name="payment_method_id" value="{{ $method->id }}"
                                data-provider="{{ $method->provider }}"
                                data-requires-proof="{{ $method->requires_proof ? '1' : '0' }}" @checked($loop->first) required>
                            <span class="payment-method-copy">
                                <b>{{ $method->name }}</b><small>{{ $method->instructions }}</small>
                                @if($method->requires_proof)<em>Requiere constancia</em>@endif
                            </span>
                            @if($method->image_path)
                                <span class="payment-method-image">
                                    <img src="{{ asset('storage/'.$method->image_path) }}" alt="Información de pago de {{ $method->name }}">
                                    <a href="{{ asset('storage/'.$method->image_path) }}" download="QR-{{ str($method->name)->slug() }}.{{ pathinfo($method->image_path, PATHINFO_EXTENSION) }}">Descargar QR</a>
                                </span>
                            @endif
                        </label>
                    @endforeach
                </div>
                <div class="izipay-customer-fields form-grid" data-izipay-fields hidden>
                    <label>Tipo de documento <b class="required-mark">*</b>
                        <select name="billing_document_type">
                            <option value="">Selecciona</option>
                            <option value="DNI" @selected(old('billing_document_type') === 'DNI')>DNI</option>
                            <option value="CE" @selected(old('billing_document_type') === 'CE')>Carné de extranjería</option>
                        </select>
                    </label>
                    <label>Número de documento <b class="required-mark">*</b>
                        <input name="billing_document_number" value="{{ old('billing_document_number') }}" maxlength="20" inputmode="numeric">
                    </label>
                </div>
                <div class="coupon-field">
                    <label>Cupón<input name="coupon_code" value="{{ old('coupon_code') }}" placeholder="Código de descuento"></label>
                    <button type="button" data-apply-coupon>Aplicar</button>
                </div>
                <div class="quote-box needs-attention" data-quote-box role="status" aria-live="polite">
                    <p data-quote-message><strong>Falta un paso:</strong> selecciona tu distrito para calcular envío y total.</p>
                    <div><span>Subtotal</span><strong data-quote-subtotal>—</strong></div>
                    <div><span>Descuento</span><strong data-quote-discount>—</strong></div>
                    <div><span>Envío</span><strong data-quote-delivery>—</strong></div>
                    <div class="quote-total"><span>Total</span><strong data-quote-total>—</strong></div>
                </div>
                <div class="proof-upload" data-proof-upload>
                    <label for="payment-proof"><span>Constancia de pago <b data-proof-required>* Obligatoria</b></span><strong>Seleccionar imagen o PDF</strong><small data-proof-name>JPG, PNG o PDF · máximo 5 MB</small></label>
                    <input id="payment-proof" type="file" name="payment_proof" accept=".jpg,.jpeg,.png,.pdf" required>
                </div>
                <label class="variant"><input type="checkbox" name="whatsapp_updates_opt_in" value="1" @checked(old('whatsapp_updates_opt_in'))><span><b>Recibir actualizaciones por WhatsApp</b><small>Acepto recibir mensajes transaccionales de Cacao del Perú sobre este pedido. No incluye promociones.</small></span></label>
                <button>Crear pedido</button>
            </div>
        </form>
    @endif
</section>
@endsection
