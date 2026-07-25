import axios from 'axios';
import L from 'leaflet';
import 'leaflet/dist/leaflet.css';

window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

const analyticsId = document.body.dataset.gaId;
const consentBanner = document.querySelector('[data-consent-banner]');
const loadAnalytics = () => {
    if (!analyticsId || window.gtag) return;
    window.dataLayer = window.dataLayer || [];
    window.gtag = function () { window.dataLayer.push(arguments); };
    window.gtag('js', new Date());
    window.gtag('config', analyticsId, { anonymize_ip: true });
    const script = document.createElement('script');
    script.async = true;
    script.src = `https://www.googletagmanager.com/gtag/js?id=${encodeURIComponent(analyticsId)}`;
    document.head.appendChild(script);
};
const analyticsConsent = window.localStorage.getItem('cacao_analytics_consent');
if (analyticsConsent === 'granted') loadAnalytics();
else if (analyticsId && analyticsConsent === null) consentBanner?.removeAttribute('hidden');
consentBanner?.querySelector('[data-consent-accept]')?.addEventListener('click', () => {
    window.localStorage.setItem('cacao_analytics_consent', 'granted');
    consentBanner.hidden = true;
    loadAnalytics();
});
consentBanner?.querySelector('[data-consent-reject]')?.addEventListener('click', () => {
    window.localStorage.setItem('cacao_analytics_consent', 'denied');
    consentBanner.hidden = true;
});
window.storefrontTrack = (eventName, parameters = {}) => {
    if (window.localStorage.getItem('cacao_analytics_consent') === 'granted') window.gtag?.('event', eventName, parameters);
};
document.querySelectorAll('[data-analytics-event]').forEach(element => element.addEventListener('click', () => {
    window.storefrontTrack(element.dataset.analyticsEvent, {
        method: element.dataset.analyticsMethod,
        content_type: element.dataset.analyticsContent,
    });
}));
document.querySelectorAll('[data-add-to-cart]').forEach(form => form.addEventListener('submit', () => {
    const quantity = Number(form.querySelector('[name="quantity"]')?.value || 1);
    window.storefrontTrack('add_to_cart', {
        currency: 'PEN',
        value: Number(form.dataset.price) * quantity,
        items: [{ item_id: form.dataset.itemId, item_name: form.dataset.itemName, price: Number(form.dataset.price), quantity }],
    });
}));
const productAnalytics = document.querySelector('[data-product-analytics]');
if (productAnalytics) {
    window.storefrontTrack('view_item', {
        currency: 'PEN',
        value: Number(productAnalytics.dataset.price || 0),
        items: [{ item_id: productAnalytics.dataset.itemId, item_name: productAnalytics.dataset.itemName, price: Number(productAnalytics.dataset.price || 0) }],
    });
}
const purchaseAnalytics = document.querySelector('[data-purchase-analytics]');
if (purchaseAnalytics) window.storefrontTrack('purchase', JSON.parse(purchaseAnalytics.dataset.purchaseAnalytics));

const bannerCarousel = document.querySelector('[data-banner-carousel]');
if (bannerCarousel) {
    const slides = [...bannerCarousel.querySelectorAll('[data-banner-slide]')];
    const dots = [...bannerCarousel.querySelectorAll('[data-banner-dot]')];
    const interval = Number(bannerCarousel.dataset.interval) || 7000;
    let currentSlide = 0;
    let autoplay = null;
    const showSlide = index => {
        currentSlide = (index + slides.length) % slides.length;
        slides.forEach((slide, position) => { slide.hidden = position !== currentSlide; });
        dots.forEach((dot, position) => dot.classList.toggle('active', position === currentSlide));
    };
    const stopAutoplay = () => {
        if (autoplay) window.clearInterval(autoplay);
        autoplay = null;
    };
    const startAutoplay = () => {
        stopAutoplay();
        if (slides.length > 1 && !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
            autoplay = window.setInterval(() => showSlide(currentSlide + 1), interval);
        }
    };
    const selectSlide = index => {
        showSlide(index);
        startAutoplay();
    };
    bannerCarousel.querySelector('[data-banner-previous]')?.addEventListener('click', () => selectSlide(currentSlide - 1));
    bannerCarousel.querySelector('[data-banner-next]')?.addEventListener('click', () => selectSlide(currentSlide + 1));
    dots.forEach((dot, index) => dot.addEventListener('click', () => selectSlide(index)));
    bannerCarousel.addEventListener('mouseenter', stopAutoplay);
    bannerCarousel.addEventListener('mouseleave', startAutoplay);
    bannerCarousel.addEventListener('focusin', stopAutoplay);
    bannerCarousel.addEventListener('focusout', startAutoplay);
    document.addEventListener('visibilitychange', () => document.hidden ? stopAutoplay() : startAutoplay());
    startAutoplay();
}

const accountToggle = document.querySelector('[data-account-toggle]');
if (accountToggle) {
    accountToggle.addEventListener('click', () => {
        const open = accountToggle.getAttribute('aria-expanded') === 'true';
        accountToggle.setAttribute('aria-expanded', String(!open));
        accountToggle.closest('.account-menu').classList.toggle('open', !open);
    });
    document.addEventListener('click', event => {
        if (!event.target.closest('.account-menu')) {
            accountToggle.setAttribute('aria-expanded', 'false');
            accountToggle.closest('.account-menu').classList.remove('open');
        }
    });
}

const proofInput = document.querySelector('#payment-proof');
if (proofInput) {
    const refreshProofRequirement = () => {
        const selected = document.querySelector('[name="payment_method_id"]:checked');
        const required = selected?.dataset.requiresProof === '1';
        const isIzipay = selected?.dataset.provider === 'izipay';
        proofInput.required = required;
        document.querySelector('[data-proof-required]').textContent = required ? '* Obligatoria' : 'Opcional';
        document.querySelector('[data-proof-upload]').classList.toggle('is-required', required);
        const izipayFields = document.querySelector('[data-izipay-fields]');
        if (izipayFields) {
            izipayFields.hidden = !isIzipay;
            izipayFields.querySelectorAll('input, select').forEach(input => input.required = isIzipay);
        }
    };
    proofInput.addEventListener('change', () => {
        const name = proofInput.files?.[0]?.name;
        document.querySelector('[data-proof-name]').textContent = name || 'JPG, PNG o PDF · máximo 5 MB';
        proofInput.closest('.proof-upload').classList.toggle('has-file', Boolean(name));
    });
    document.querySelectorAll('[name="payment_method_id"]').forEach(input => input.addEventListener('change', refreshProofRequirement));
    refreshProofRequirement();
}

const checkoutForm = document.querySelector('[data-checkout-form]');
if (checkoutForm) {
    window.storefrontTrack('begin_checkout', { currency: 'PEN' });
    const money = amount => new Intl.NumberFormat('es-PE', { style: 'currency', currency: 'PEN' }).format(amount / 100);
    const box = checkoutForm.querySelector('[data-quote-box]');
    const refresh = async () => {
        const fulfillmentType = checkoutForm.querySelector('[name="fulfillment_type"]:checked')?.value || 'delivery';
        const district = checkoutForm.querySelector('[name="district"]').value.trim();
        const pickupLocationId = checkoutForm.querySelector('[name="pickup_location_id"]:checked')?.value || null;
        if (fulfillmentType === 'delivery' && !district) {
            box.classList.add('needs-attention');
            box.querySelector('[data-quote-message]').innerHTML = '<strong>Falta un paso:</strong> selecciona tu distrito para calcular envío y total.';
            return;
        }
        if (fulfillmentType === 'pickup' && !pickupLocationId) {
            box.classList.add('needs-attention');
            box.querySelector('[data-quote-message]').innerHTML = '<strong>Falta un paso:</strong> selecciona el local o feria donde recogerás tu pedido.';
            return;
        }
        box.classList.remove('has-error', 'has-success', 'needs-attention');
        box.querySelector('[data-quote-message]').textContent = 'Calculando…';
        try {
            const { data } = await axios.post(checkoutForm.dataset.quoteUrl, {
                fulfillment_type: fulfillmentType,
                pickup_location_id: pickupLocationId,
                district,
                coupon_code: checkoutForm.querySelector('[name="coupon_code"]').value.trim(),
            });
            box.querySelector('[data-quote-subtotal]').textContent = money(data.subtotal_amount);
            box.querySelector('[data-quote-discount]').textContent = `− ${money(data.discount_amount)}`;
            box.querySelector('[data-quote-delivery]').textContent = money(data.delivery_amount);
            box.querySelector('[data-quote-total]').textContent = money(data.total_amount);
            box.querySelector('[data-quote-message]').textContent = data.coupon_code ? `Cupón ${data.coupon_code} aplicado.` : 'Resumen actualizado.';
            box.classList.add('has-success');
        } catch (error) {
            const errors = error.response?.data?.errors;
            box.querySelector('[data-quote-message]').textContent = errors ? Object.values(errors).flat()[0] : 'No pudimos calcular el resumen.';
            box.classList.add('has-error');
        }
    };
    const districtInput = checkoutForm.querySelector('[name="district"]');
    const districtError = checkoutForm.querySelector('[data-district-error]');
    const showDistrictError = () => {
        districtError.textContent = 'Selecciona el distrito de entrega antes de crear el pedido.';
        districtInput.setAttribute('aria-invalid', 'true');
        districtInput.closest('label').scrollIntoView({ behavior: 'smooth', block: 'center' });
        districtInput.focus();
    };
    districtInput.addEventListener('invalid', event => {
        event.preventDefault();
        showDistrictError();
    });
    districtInput.addEventListener('change', () => {
        districtError.textContent = '';
        districtInput.removeAttribute('aria-invalid');
        refresh();
    });
    checkoutForm.querySelector('[data-apply-coupon]').addEventListener('click', refresh);
    const deliveryFields = checkoutForm.querySelector('[data-delivery-fields]');
    const pickupFields = checkoutForm.querySelector('[data-pickup-fields]');
    const lineOneInput = checkoutForm.querySelector('[name="line_one"]');
    const provinceInput = checkoutForm.querySelector('[name="province"]');
    const departmentInput = checkoutForm.querySelector('[name="department"]');
    const pickupInputs = checkoutForm.querySelectorAll('[name="pickup_location_id"]');
    const updateFulfillment = () => {
        const isPickup = checkoutForm.querySelector('[name="fulfillment_type"]:checked')?.value === 'pickup';
        deliveryFields.hidden = isPickup;
        if (pickupFields) pickupFields.hidden = !isPickup;
        districtInput.required = !isPickup;
        lineOneInput.required = !isPickup;
        provinceInput.required = !isPickup;
        departmentInput.required = !isPickup;
        pickupInputs.forEach(input => input.required = isPickup);
        refresh();
    };
    checkoutForm.querySelectorAll('[name="fulfillment_type"]').forEach(input => input.addEventListener('change', updateFulfillment));
    pickupInputs.forEach(input => input.addEventListener('change', refresh));
    updateFulfillment();
}

const productHero = document.querySelector('[data-product-hero]');
if (productHero) {
    const showVariantImage = row => {
        if (!row.dataset.variantImage) return;
        productHero.src = row.dataset.variantImage;
        productHero.alt = row.dataset.variantAlt;
        document.querySelectorAll('[data-variant-image]').forEach(candidate => candidate.classList.toggle('is-previewing', candidate === row));
    };
    const restoreProductImage = () => {
        productHero.src = productHero.dataset.defaultSrc;
        productHero.alt = productHero.dataset.defaultAlt;
        document.querySelectorAll('[data-variant-image]').forEach(row => row.classList.remove('is-previewing'));
    };
    document.querySelectorAll('[data-variant-image]').forEach(row => {
        row.addEventListener('mouseenter', () => showVariantImage(row));
        row.addEventListener('focusin', () => showVariantImage(row));
    });
    document.querySelector('.variant-shop-list')?.addEventListener('mouseleave', restoreProductImage);
}

document.querySelectorAll('[data-variant-card-carousel]').forEach(carousel => {
    const slides = [...carousel.querySelectorAll('.variant-card-slide')];
    let current = 0;
    let timer = null;
    const show = index => {
        current = index % slides.length;
        slides.forEach((slide, position) => {
            const active = position === current;
            slide.classList.toggle('is-active', active);
            slide.setAttribute('aria-hidden', String(!active));
        });
    };
    const stop = () => {
        if (timer) window.clearInterval(timer);
        timer = null;
    };
    const start = () => {
        stop();
        if (slides.length < 2 || window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;
        timer = window.setInterval(() => show(current + 1), 1300);
    };
    const reset = () => {
        stop();
        show(0);
    };
    carousel.addEventListener('mouseenter', start);
    carousel.addEventListener('mouseleave', reset);
    carousel.addEventListener('focusin', start);
    carousel.addEventListener('focusout', reset);
});

const mapElement = document.querySelector('[data-address-map]');
if (mapElement) {
    const form = mapElement.closest('form');
    const latitude = form.querySelector('[name="latitude"]');
    const longitude = form.querySelector('[name="longitude"]');
    const status = form.querySelector('[data-map-status]');
    const initial = [Number(mapElement.dataset.latitude), Number(mapElement.dataset.longitude)];
    const hasLocation = mapElement.dataset.hasLocation === '1';
    const map = L.map(mapElement).setView(initial, hasLocation ? 17 : 13);
    L.tileLayer(mapElement.dataset.tileUrl, { attribution: mapElement.dataset.attribution, maxZoom: 19 }).addTo(map);
    let marker = null;
    const setPoint = (lat, lng) => {
        latitude.value = lat.toFixed(7);
        longitude.value = lng.toFixed(7);
        if (marker) marker.setLatLng([lat, lng]);
        else marker = L.circleMarker([lat, lng], { radius: 9, color: '#fff', weight: 3, fillColor: '#8a4e2e', fillOpacity: 1 }).addTo(map);
        status.textContent = 'Ubicación seleccionada. Puedes moverla haciendo clic en otro punto.';
    };
    if (hasLocation) setPoint(initial[0], initial[1]);
    map.on('click', event => setPoint(event.latlng.lat, event.latlng.lng));
    form.querySelector('[data-use-location]').addEventListener('click', () => {
        if (!navigator.geolocation) {
            status.textContent = 'Tu navegador no permite obtener la ubicación.';
            return;
        }
        status.textContent = 'Buscando tu ubicación…';
        navigator.geolocation.getCurrentPosition(position => {
            const point = [position.coords.latitude, position.coords.longitude];
            map.setView(point, 17);
            setPoint(point[0], point[1]);
        }, () => {
            status.textContent = 'No pudimos acceder a tu ubicación. Puedes marcarla manualmente.';
        }, { enableHighAccuracy: true, timeout: 10000 });
    });
}
