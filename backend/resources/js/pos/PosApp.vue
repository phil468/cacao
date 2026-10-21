<script setup lang="ts">
import { computed, nextTick, onBeforeUnmount, onMounted, ref, watch } from 'vue';
import type { IScannerControls } from '@zxing/browser';
import { api, ApiError } from './api';
import PosOperations from './PosOperations.vue';
import type {OperationsState} from './operations';

type Location = { id: number; name: string; pickup_location_id: number };
type Session = { user: { id: number; name: string; can_discount: boolean; can_inventory: boolean; can_historical: boolean }; locations: Location[] };
type Variant = { id: number; product: string; name: string; sku: string; barcode: string | null; category: string; price: number; stock: number; image: string | null };
type Method = { id: number; code: string; name: string; requires_proof: boolean; can_omit_proof: boolean };
type Campaign = { name: string; minimum_amount: number; amount_per_code: number };
type Catalog = { variants: Variant[]; payment_methods: Method[]; promotion: Campaign | null };
type Receipt = { id: number; number: string; is_historical: boolean; sold_on: string; total_amount: number; subtotal_amount: number; discount_amount: number; customer_name: string; payment_proof_missing: boolean; payments: {method: string; amount: number; cash_received_amount: number | null; change_amount: number | null; proof_missing: boolean}[]; codes: string[]; items: { product_name: string; variant_name: string; quantity: number; line_total_amount: number }[] };
type PaymentRow = {key: string; methodId: string; amount: string; cashReceived: string; proof: File | null; proofName: string; proofMissing: boolean; uploadedPath: string | null};
type Sale = { location_id: number; pos_submission_id: string; is_historical: boolean; sold_on?: string; historical_reason?: string; customer_name: string; customer_email: string; customer_phone: string; items: { variant_id: number; quantity: number; unit_price_amount?: number }[]; discount_type: 'amount' | 'percentage'; discount_amount?: number; discount_percentage?: number; payment_confirmed: boolean; payments: {payment_method_id: number; amount: number; cash_received_amount?: number; proof_path: string | null; proof_missing: boolean}[] };

const session = ref<Session | null>(null);
const email = ref(''), password = ref(''), busy = ref(false), loading = ref(true), error = ref(''), notice = ref('');
const locationId = ref(''), selling = ref(false), search = ref(''), category = ref('Todas');
const catalog = ref<Catalog>({ variants: [], payment_methods: [], promotion: null });
const cart = ref<{ variant: Variant; quantity: number; historicalPrice: string }[]>([]);
const historical = ref(false), soldOn = ref(''), historicalReason = ref('');
const operations = ref<OperationsState | null>(null);
const pointRefreshing = ref(false);
const operationsLocked = ref(false);
const ownsShift = computed(() => operations.value?.shift?.cashier_id === session.value?.user.id && !operations.value?.other_shift_open);
const latestHistoricalDay = computed(() => {
    if (!operations.value) return '';
    const date = new Date(operations.value.today+'T12:00:00Z'); date.setUTCDate(date.getUTCDate()-1); return date.toISOString().slice(0,10);
});
const customer = ref('Consumidor final'), customerEmail = ref(''), phone = ref(''), discount = ref('0');
const discountType = ref<'amount' | 'percentage'>('amount');
const confirmed = ref(false);
let paymentKey = 0;
function newPayment(): PaymentRow { return {key: String(++paymentKey), methodId: '', amount: '0.00', cashReceived: '', proof: null, proofName: '', proofMissing: false, uploadedPath: null}; }
const payments = ref<PaymentRow[]>([newPayment()]);
const receipt = ref<Receipt | null>(null), codeInput = ref(''), productCode = ref('');
const pending = ref<Sale | null>(null);
const showCheckout = ref(false);
const scannerMode = ref<'product' | 'coupon' | null>(null), cameraStatus = ref(''), video = ref<HTMLVideoElement | null>(null);
let controls: IScannerControls | undefined;
let cameraGeneration = 0;
let noticeTimer: ReturnType<typeof setTimeout> | undefined;
function inform(message: string) {
    error.value = '';
    notice.value = message;
    clearTimeout(noticeTimer);
    noticeTimer = setTimeout(() => { notice.value = ''; }, 6000);
}
watch(error, value => { if (value) notice.value = ''; });
function clearPaymentProof(row: PaymentRow) { row.proof = null; row.proofName = ''; row.uploadedPath = null; }
function changeMethod(row: PaymentRow) { row.cashReceived = ''; row.proofMissing = false; clearPaymentProof(row); }
function omitProof(row: PaymentRow) { if (row.proofMissing) clearPaymentProof(row); }
function invalidField(event: Event) {
    const field = event.target as HTMLInputElement;
    error.value = field.validity.typeMismatch ? 'Revisa el formato del correo electrónico.'
        : field.validity.rangeOverflow || field.validity.rangeUnderflow || field.validity.badInput || field.validity.stepMismatch ? 'Revisa las cantidades y los importes ingresados.'
        : 'Completa los campos y las confirmaciones obligatorias antes de continuar.';
}
const money = (amount: number) => new Intl.NumberFormat('es-PE', { style: 'currency', currency: 'PEN' }).format(amount / 100);
const location = computed(() => session.value?.locations.find(l => String(l.id) === locationId.value));
const categories = computed(() => ['Todas', ...new Set(catalog.value.variants.map(v => v.category))]);
const visible = computed(() => catalog.value.variants.filter(v => (category.value === 'Todas' || v.category === category.value) && `${v.product} ${v.name} ${v.sku}`.toLocaleLowerCase().includes(search.value.toLocaleLowerCase())));
const subtotal = computed(() => cart.value.reduce((sum, row) => sum + (historical.value ? decimalUnits(row.historicalPrice) : row.variant.price) * row.quantity, 0));
function decimalUnits(value: string): number {
    const match = /^(\d+)(?:[.,](\d{0,2}))?$/.exec(String(value).trim());
    if (!match) return NaN;
    const units = Number(match[1]) * 100 + Number((match[2] ?? '').padEnd(2, '0'));
    return Number.isSafeInteger(units) ? units : NaN;
}
const discountUnits = computed(() => decimalUnits(discount.value || '0'));
const discountCents = computed(() => discountType.value === 'percentage' ? Math.floor((subtotal.value * discountUnits.value + 5000) / 10000) : discountUnits.value);
const total = computed(() => Math.max(0, subtotal.value - (session.value?.user.can_discount ? discountCents.value : 0)));
function selectedMethod(row: PaymentRow) { return catalog.value.payment_methods.find(m => String(m.id) === row.methodId); }
function cashChange(row: PaymentRow) { return decimalUnits(row.cashReceived) - decimalUnits(row.amount); }
const paid = computed(() => payments.value.reduce((sum, row) => sum + decimalUnits(row.amount), 0));
const remaining = computed(() => total.value - paid.value);
watch([total, () => payments.value.length], () => {
    if (payments.value.length === 1) payments.value[0].amount = Number.isSafeInteger(total.value) ? (total.value / 100).toFixed(2) : '0.00';
}, {flush: 'sync'});
function fillRemaining(row: PaymentRow) {
    const other = payments.value.filter(p => p !== row).reduce((sum, p) => sum + decimalUnits(p.amount), 0);
    if (!Number.isSafeInteger(other) || other > total.value) { error.value = 'Revisa los importes de los otros pagos.'; return; }
    row.amount = ((total.value - other) / 100).toFixed(2);
}
const locked = computed(() => busy.value || pending.value !== null || operationsLocked.value || pointRefreshing.value);
const couponLimit = computed(() => {
    const campaign = catalog.value.promotion;
    if (receipt.value?.is_historical || historical.value) return 0;
    const amount = receipt.value?.total_amount ?? total.value;
    return campaign && campaign.amount_per_code > 0 && amount >= campaign.minimum_amount ? Math.floor(amount / campaign.amount_per_code) : 0;
});

async function login() {
    busy.value = true; error.value = '';
    try { session.value = await api<Session>('login', { method: 'POST', body: JSON.stringify({ email: email.value, password: password.value }) }); password.value = ''; }
    catch (e) { report(e); }
    finally { busy.value = false; }
}
async function logout() {
    busy.value = true;
    try { await api('logout', { method: 'POST' }); resetSale(); stopCamera(); session.value = null; locationId.value = ''; catalog.value.variants = []; }
    catch (e) { report(e); } finally { busy.value = false; }
}
function report(e: unknown) { error.value = e instanceof Error ? e.message : 'No se pudo completar la operación.'; }
function goCheckout() { showCheckout.value = true; window.scrollTo({ top: 0, behavior: 'smooth' }); }
async function loadCatalog() {
    if (!locationId.value) return;
    loading.value = true; error.value = '';
    try { catalog.value = await api<Catalog>('catalog?location_id=' + encodeURIComponent(locationId.value) + (historical.value?'&historical=1':'')); }
    catch (e) { report(e); } finally { loading.value = false; }
}
async function refreshOperations() {
    if (!locationId.value) return;
    try { operations.value = await api<OperationsState>('operations?location_id='+locationId.value); }
    catch(e) { operations.value = null; report(e); }
}
async function refreshPoint() { pointRefreshing.value=true;try {await Promise.all([refreshOperations(), loadCatalog()]);}finally{pointRefreshing.value=false;} }
async function chooseLocation() { resetSale(); operations.value = null; await refreshPoint(); }
async function beginSale(previous = false) {
    if (operationsLocked.value) return;
    resetSale(); historical.value = previous; await refreshPoint();
    if (!previous && (!ownsShift.value || operations.value?.day_closed)) { error.value='Abre tu turno de caja antes de registrar ventas de hoy.'; return; }
    selling.value = true;
}
function resetSale() {
    cart.value = []; showCheckout.value = false; customer.value = 'Consumidor final'; customerEmail.value = ''; phone.value = ''; discount.value = '0';
    historical.value = false; soldOn.value = ''; historicalReason.value = '';
    discountType.value = 'amount'; payments.value = [newPayment()]; confirmed.value = false; receipt.value = null; pending.value = null; selling.value = false; error.value = ''; notice.value = ''; codeInput.value = ''; search.value = ''; category.value = 'Todas';
}
function add(variant: Variant) {
    if (locked.value || receipt.value) return;
    const row = cart.value.find(r => r.variant.id === variant.id);
    if (!historical.value && variant.stock <= (row?.quantity ?? 0)) { error.value = 'No hay más stock de esta presentación en el punto seleccionado.'; return; }
    if (row) row.quantity++; else cart.value.push({ variant, quantity: 1, historicalPrice:(variant.price/100).toFixed(2) });
    inform(`${variant.product} · ${variant.name} agregado.`);
}
function scannedProduct(value = productCode.value) {
    const matches = catalog.value.variants.filter(v => v.barcode === value.trim() || v.sku.toUpperCase() === value.trim().toUpperCase());
    if (matches.length !== 1) { error.value = 'El código no identifica una presentación única. Busca el producto en el catálogo o configura su código en Variantes.'; return; }
    add(matches[0]); productCode.value = '';
}
function selectProof(event: Event, row: PaymentRow) {
    const selected = (event.target as HTMLInputElement).files?.[0];
    if (!selected) return;
    if (selected.size > 5 * 1024 * 1024 || !['image/jpeg', 'image/png', 'image/webp', 'application/pdf'].includes(selected.type)) { error.value = 'Adjunta JPG, PNG, WebP o PDF de hasta 5 MB.'; return; }
    row.proof = selected; row.proofName = selected.name; row.uploadedPath = null;
}
async function saveSale() {
    if (busy.value) return;
    error.value = ''; busy.value = true;
    try {
        if (!pending.value) {
            if (!customer.value.trim() || !cart.value.length || payments.value.some(row => !selectedMethod(row)) || !confirmed.value) throw new Error('Completa cliente, productos y pago recibido.');
            if (cart.value.some(row => !Number.isInteger(row.quantity) || row.quantity < 1 || row.quantity > 1000 || (!historical.value && row.quantity > row.variant.stock))) throw new Error('Revisa las cantidades y el stock disponible.');
            if (historical.value && (!soldOn.value || soldOn.value > latestHistoricalDay.value || historicalReason.value.trim().length<5 || cart.value.some(row=>!Number.isSafeInteger(decimalUnits(row.historicalPrice))))) throw new Error('Indica fecha anterior, motivo y precios realmente cobrados.');
            if (!Number.isSafeInteger(discountCents.value) || discountCents.value < 0 || discountCents.value > subtotal.value || (discountType.value === 'percentage' && discountUnits.value > 10000)) throw new Error('El descuento no es válido. El porcentaje debe estar entre 0 y 100.');
            if (new Set(payments.value.map(p => p.methodId)).size !== payments.value.length) throw new Error('Usa cada medio de pago una sola vez.');
            if (!Number.isSafeInteger(paid.value) || remaining.value !== 0 || payments.value.some(p => decimalUnits(p.amount) < 0 || (total.value > 0 && decimalUnits(p.amount) === 0)) || (total.value === 0 && payments.value.length !== 1)) throw new Error('Los pagos deben sumar exactamente el total. Cada importe debe ser mayor que cero, salvo una venta gratuita con un solo medio.');
            for (const row of payments.value) {
                const method = selectedMethod(row)!;
                if (method.code === 'pos_cash' && (String(row.cashReceived).trim() === '' || !Number.isSafeInteger(decimalUnits(row.cashReceived)) || decimalUnits(row.cashReceived) > 1000000000 || !Number.isSafeInteger(cashChange(row)) || cashChange(row) < 0)) throw new Error('Indica cuánto efectivo recibiste. Debe cubrir el importe asignado al pago en efectivo.');
                if (method.requires_proof && !row.proof && !row.uploadedPath && !(method.can_omit_proof && row.proofMissing)) throw new Error(`${method.name}: adjunta la constancia${method.can_omit_proof ? ' o marca «No se tomó imagen»' : ''}.`);
                if (row.proof && !row.uploadedPath) {
                    const form = new FormData(); form.set('proof', row.proof);
                    row.uploadedPath = (await api<{ path: string }>('proofs', { method: 'POST', body: form })).path;
                }
            }
            pending.value = { location_id: Number(locationId.value), pos_submission_id: crypto.randomUUID(), customer_name: customer.value.trim(), customer_email: customerEmail.value, customer_phone: phone.value,
                is_historical:historical.value, ...(historical.value?{sold_on:soldOn.value,historical_reason:historicalReason.value.trim()}:{}),
                items: cart.value.map(row => ({ variant_id: row.variant.id, quantity: row.quantity, ...(historical.value?{unit_price_amount:decimalUnits(row.historicalPrice)}:{}) })),
                discount_type: session.value!.user.can_discount ? discountType.value : 'amount',
                ...(session.value!.user.can_discount && discountType.value === 'percentage' ? {discount_percentage: discountUnits.value} : {discount_amount: session.value!.user.can_discount ? discountCents.value : 0}),
                payment_confirmed: confirmed.value, payments: payments.value.map(row => ({payment_method_id: Number(row.methodId), amount: decimalUnits(row.amount), ...(selectedMethod(row)?.code === 'pos_cash' ? {cash_received_amount: decimalUnits(row.cashReceived)} : {}), proof_path: row.uploadedPath, proof_missing: !!selectedMethod(row)?.can_omit_proof && row.proofMissing})) };
        }
        receipt.value = await api<Receipt>('sales', { method: 'POST', body: JSON.stringify(pending.value) });
        pending.value = null; cart.value = []; payments.value = [newPayment()]; inform(receipt.value.is_historical?'Venta histórica registrada sin afectar stock ni caja actual.':'Venta registrada. Los productos ya fueron descontados del punto de venta.');
        await refreshPoint(); window.scrollTo({ top: 0, behavior: 'smooth' });
    } catch (e) {
        if (e instanceof ApiError && [400, 401, 403, 404, 409, 422].includes(e.status)) pending.value = null;
        report(e);
        if (pending.value) error.value += ' No se confirmó el resultado. Reintenta esta misma venta; no vuelvas a cobrar.';
    } finally { busy.value = false; }
}
async function handover(value = codeInput.value) {
    if (!receipt.value || busy.value) return;
    busy.value = true; error.value = '';
    try { receipt.value = await api<Receipt>(`sales/${receipt.value.id}/codes`, { method: 'POST', body: JSON.stringify({ code: value }) }); codeInput.value = ''; inform('Cupón habilitado y entrega registrada. El cliente debe registrarse en /promo.'); }
    catch (e) { report(e); } finally { busy.value = false; }
}
function stopCamera() {
    cameraGeneration++; controls?.stop(); controls = undefined;
    const stream = video.value?.srcObject;
    if (stream instanceof MediaStream) stream.getTracks().forEach(track => track.stop());
    if (video.value) video.value.srcObject = null;
    scannerMode.value = null;
}
async function startCamera(mode: 'product' | 'coupon') {
    stopCamera(); error.value = '';
    if (!window.isSecureContext || !navigator.mediaDevices?.getUserMedia) { error.value = 'La cámara requiere HTTPS o localhost y permisos del navegador.'; return; }
    scannerMode.value = mode; cameraStatus.value = 'Solicitando acceso a la cámara…';
    const generation = ++cameraGeneration;
    await nextTick();
    const element = video.value!;
    try {
        const { BrowserMultiFormatReader } = await import('@zxing/browser');
        if (generation !== cameraGeneration) return;
        const reader = new BrowserMultiFormatReader();
        const acquired = await reader.decodeFromConstraints({ video: { facingMode: { ideal: 'environment' } }, audio: false }, element, (result, _error, current) => {
            if (!result || generation !== cameraGeneration) return;
            const value = result.getText(); current.stop(); stopCamera();
            if (mode === 'product') scannedProduct(value); else void handover(value);
        });
        if (generation !== cameraGeneration) { acquired.stop(); return; }
        controls = acquired; cameraStatus.value = 'Apunta al código de barras o QR.';
    } catch { stopCamera(); error.value = 'No se pudo abrir la cámara. Revisa los permisos o ingresa el código manualmente.'; }
}
const hideCamera = () => { if (document.hidden) stopCamera(); };
onMounted(async () => {
    document.addEventListener('visibilitychange', hideCamera); window.addEventListener('pagehide', stopCamera);
    try { session.value = await api<Session>('session'); } catch (e) { if (!(e instanceof ApiError && [401, 403].includes(e.status))) report(e); }
    finally { loading.value = false; }
});
onBeforeUnmount(() => { clearTimeout(noticeTimer); stopCamera(); document.removeEventListener('visibilitychange', hideCamera); window.removeEventListener('pagehide', stopCamera); });
</script>

<template>
    <div class="pos-layout">
        <header class="pos-header"><a href="/pos" class="brand">CACAO <span>DEL PERÚ · CAJA</span></a><span v-if="session" class="staff">{{ session.user.name }}</span><button v-if="session" class="ghost" :disabled="locked" @click="logout">Salir</button></header>
        <section class="toast-stack" aria-label="Mensajes de caja">
            <div v-if="error" role="alert" class="alert error toast"><span>{{ error }}</span><button type="button" class="toast-close" aria-label="Cerrar error" @click="error = ''">×</button></div>
            <div v-if="notice" role="status" class="alert success toast"><span>{{ notice }}</span><button type="button" class="toast-close" aria-label="Cerrar notificación" @click="notice = ''">×</button></div>
        </section>
        <main @invalid.capture="invalidField">
            <section v-if="!session" class="login card">
                <p class="eyebrow">TU PUNTO DE VENTA, EN UN SOLO LUGAR</p><h1>Bienvenido a caja</h1><p>Ingresa con tu cuenta de administrador o vendedor.</p>
                <form @submit.prevent="login"><label>Correo<input v-model="email" type="email" autocomplete="username" required /></label><label>Contraseña<input v-model="password" type="password" autocomplete="current-password" required /></label><button class="primary" :disabled="busy || loading">{{ busy ? 'Ingresando…' : 'Ingresar' }}</button></form>
            </section>
            <template v-else>
                <section class="location-bar card"><label>Punto de venta<select v-model="locationId" :disabled="selling || locked" @change="chooseLocation"><option value="">Selecciona tu punto de venta</option><option v-for="point in session.locations" :key="point.id" :value="String(point.id)">{{ point.name }}</option></select></label><p v-if="!session.locations.length">No tienes puntos autorizados. Solicita una asignación al administrador.</p><span v-if="location">Stock exclusivo de {{ location.name }}</span></section>
                <section v-if="location && !selling && !receipt" class="welcome card"><p class="eyebrow">LISTO PARA ATENDER</p><h1>Una buena venta empieza aquí</h1><p>Catálogo visual, cobro y cupones en el mismo flujo.</p><p v-if="ownsShift">Tu turno #{{operations?.shift?.id}} está abierto.</p><p v-else>Abre tu turno en «Turno y caja» para registrar ventas de hoy.</p><button class="primary" :disabled="loading || locked || !ownsShift || operations?.day_closed" @click="beginSale()">Registrar venta</button><button v-if="session.user.can_historical" :disabled="loading || locked" @click="beginSale(true)">Registrar venta anterior</button></section>
                <PosOperations v-if="location && operations && !selling && !receipt" :location-id="Number(locationId)" :state="operations" :user="session.user" :methods="catalog.payment_methods" :refreshing="pointRefreshing" @refresh="refreshPoint" @message="inform" @error="error=$event" @lock="operationsLocked=$event" />
                <section v-if="receipt" class="receipt card"><p class="eyebrow">VENTA REGISTRADA</p><h1>{{ money(receipt.total_amount) }}</h1><p>{{ receipt.customer_name }}</p><small>Referencia interna: {{ receipt.number }}</small><ul><li v-for="(item, index) in receipt.items" :key="index">{{ item.quantity }} × {{ item.product_name }} · {{ item.variant_name }} <strong>{{ money(item.line_total_amount) }}</strong></li></ul>
                    <p v-if="receipt.is_historical" class="proof-warning">Venta histórica del {{receipt.sold_on}}. No modificó stock ni caja actual y no habilita cupones.</p>
                    <p v-if="receipt.payment_proof_missing" class="proof-warning">Sin imagen de respaldo: se registró que no se tomó imagen del pago.</p>
                    <p>Subtotal: {{ money(receipt.subtotal_amount) }} · Descuento: {{ money(receipt.discount_amount) }}</p>
                    <ul aria-label="Pagos registrados"><li v-for="(payment, index) in receipt.payments" :key="index">{{ payment.method }} <strong>{{ money(payment.amount) }}</strong><small v-if="payment.cash_received_amount != null">Efectivo recibido: {{ money(payment.cash_received_amount) }} · Vuelto entregado: {{ money(payment.change_amount ?? 0) }}</small><small v-if="payment.proof_missing">No se tomó imagen de este pago.</small></li></ul>
                    <section v-if="catalog.promotion && couponLimit > 0" class="coupon-panel"><h2>Entrega de cupones físicos</h2><p>{{ catalog.promotion.name }} · Hasta {{ couponLimit }} cupón(es) por esta compra.</p><p>Habilitados: {{ receipt.codes.length }} / {{ couponLimit }}</p><ul><li v-for="code in receipt.codes" :key="code">{{ code }}</li></ul><form v-if="receipt.codes.length < couponLimit" @submit.prevent="handover()"><label>Código del cupón<input v-model="codeInput" autocomplete="off" maxlength="2048" required :disabled="busy" /></label><div class="actions"><button type="button" :disabled="busy" @click="startCamera('coupon')">Escanear cupón</button><button class="primary" :disabled="busy">Habilitar y registrar entrega</button></div></form><p>El cliente completa después sus datos y aceptación de las bases en /promo.</p></section>
                    <button class="primary" :disabled="busy" @click="beginSale()">Nueva venta</button><button :disabled="busy" @click="resetSale(); refreshPoint()">Volver a operación y cierres</button>
                </section>
                <div v-if="selling && !receipt" class="sale-grid" :class="{ 'show-checkout': showCheckout }">
                    <section class="catalog card"><div class="section-heading"><div><p class="eyebrow">ELIGE Y AGREGA</p><h1>Productos</h1></div><button :disabled="locked" @click="startCamera('product')">Escanear producto</button></div>
                        <fieldset :disabled="locked"><label class="search-label">Buscar producto<input v-model="search" type="search" placeholder="Nombre, presentación o SKU" /></label><div class="categories"><button v-for="name in categories" :key="name" :class="{ selected: category === name }" @click="category = name">{{ name }}</button></div><form class="scan-input" @submit.prevent="scannedProduct()"><input v-model="productCode" aria-label="Código de barras o SKU" placeholder="Código de barras o SKU" autocomplete="off" /><button>Buscar código</button></form>
                            <p v-if="!visible.length">No hay productos que coincidan.</p><div class="products"><button v-for="variant in visible" :key="variant.id" class="product" :disabled="!historical && variant.stock < 1" @click="add(variant)"><img v-if="variant.image" :src="variant.image" alt="" loading="lazy" @error="($event.target as HTMLImageElement).style.display = 'none'" /><span v-else class="product-placeholder" aria-hidden="true">C</span><span class="product-name">{{ variant.product }}</span><span>{{ variant.name }}</span><strong>{{ money(variant.price) }}</strong><small>{{ historical?'Referencia actual: ingresa el precio realmente cobrado':variant.stock > 0 ? `Stock: ${variant.stock}` : 'Sin stock' }}</small></button></div>
                        </fieldset>
                    </section>
                    <section class="checkout card"><button type="button" class="mobile-only" :disabled="locked" @click="showCheckout = false">← Volver a productos</button><h2>Tu venta <span>{{ cart.length }} presentación(es)</span></h2><form @submit.prevent="saveSale"><fieldset :disabled="locked"><label>Cliente *<input v-model="customer" autocomplete="off" maxlength="120" required /></label><details><summary>Correo y celular (opcionales)</summary><label>Correo<input v-model="customerEmail" type="email" maxlength="255" /></label><label>Celular<input v-model="phone" type="tel" maxlength="30" /></label></details>
                                <section v-if="historical" class="proof"><h3>Venta anterior · sin stock ni caja actual</h3><label>Fecha real de la venta<input v-model="soldOn" type="date" :max="latestHistoricalDay" required /></label><label>Motivo del registro tardío<textarea v-model="historicalReason" minlength="5" maxlength="1000" required /></label><p>Ingresa los precios realmente cobrados. No se recalculan cierres anteriores ni se habilitan cupones.</p></section>
                                <p v-if="!cart.length" class="empty-cart">Agrega productos del catálogo.</p><article v-for="row in cart" :key="row.variant.id" class="cart-row"><div><strong>{{ row.variant.product }}</strong><small>{{ row.variant.name }} · {{ money(historical?decimalUnits(row.historicalPrice):row.variant.price) }} c/u</small></div><label>Cantidad<input v-model.number="row.quantity" type="number" inputmode="numeric" min="1" :max="historical?1000:Math.min(row.variant.stock, 1000)" step="1" required /></label><label v-if="historical" class="historical-price">Precio unitario realmente cobrado (S/)<input v-model="row.historicalPrice" type="number" min="0" step="0.01" required /></label><button type="button" class="remove" :aria-label="`Quitar ${row.variant.product}`" @click="cart = cart.filter(r => r !== row)">Quitar</button></article>
                                <section v-if="session.user.can_discount" class="discount-controls"><label>Tipo de descuento<select v-model="discountType" @change="discount = '0'"><option value="amount">Monto en soles (S/)</option><option value="percentage">Porcentaje (%)</option></select></label><label>{{ discountType === 'percentage' ? 'Descuento (%)' : 'Descuento (S/)' }}<input v-model="discount" type="number" inputmode="decimal" min="0" :max="discountType === 'percentage' ? 100 : subtotal / 100" step="0.01" /></label></section><div class="totals"><span>Subtotal</span><strong>{{ money(subtotal) }}</strong><span>Descuento{{ discountType === 'percentage' ? ` (${discount} %)` : '' }}</span><strong>− {{ money(session.user.can_discount ? discountCents : 0) }}</strong><span>Total a cobrar</span><strong class="grand-total">{{ money(total) }}</strong></div>
                                <section class="payment-list" aria-label="Distribución de pagos"><h3>Pago recibido</h3><article v-for="(row, index) in payments" :key="row.key" class="payment-row">
                                <label>Medio de pago {{ index + 1 }} *<select v-model="row.methodId" required @change="changeMethod(row)"><option value="">Selecciona un método</option><option v-for="payment in catalog.payment_methods" :key="payment.id" :value="String(payment.id)" :disabled="payments.some(p => p !== row && p.methodId === String(payment.id))">{{ payment.name }}</option></select></label>
                                <label>Importe del pago {{ index + 1 }} (S/) *<input v-model="row.amount" type="number" inputmode="decimal" min="0" :max="total / 100" step="0.01" required :readonly="payments.length === 1" /></label>
                                <section v-if="selectedMethod(row)?.code === 'pos_cash'" class="payment-balance" aria-label="Cálculo del vuelto">
                                    <label>Efectivo recibido (S/) *<input v-model="row.cashReceived" type="number" inputmode="decimal" min="0" max="10000000" step="0.01" required /></label>
                                    <button type="button" @click="row.cashReceived = (decimalUnits(row.amount) / 100).toFixed(2)">Pago exacto</button>
                                    <p v-if="String(row.cashReceived).trim() !== '' && Number.isSafeInteger(cashChange(row))" aria-live="polite" :class="{ 'proof-warning': cashChange(row) < 0 }"><strong>{{ cashChange(row) < 0 ? 'Falta recibir' : 'Vuelto a entregar' }}: {{ money(Math.abs(cashChange(row))) }}</strong></p>
                                    <small>En pagos mixtos, el vuelto corresponde solo a la parte en efectivo.</small>
                                </section>
                                <div v-if="payments.length > 1" class="actions"><button type="button" @click="fillRemaining(row)">Asignar saldo restante</button><button type="button" @click="payments = payments.filter(p => p !== row)">Quitar pago {{ index + 1 }}</button></div>
                                <section v-if="selectedMethod(row)?.requires_proof" :key="row.methodId" class="proof">
                                    <p>Adjunta la constancia. Confirma el pago en tu cuenta: la foto no verifica el abono.</p>
                                    <label v-if="selectedMethod(row)?.can_omit_proof" class="check"><input v-model="row.proofMissing" type="checkbox" @change="omitProof(row)" /><span>No se tomó imagen del pago {{ index + 1 }}</span></label>
                                    <p v-if="row.proofMissing" class="proof-warning">Este pago se guardará sin imagen de respaldo. La declaración quedará registrada; verifica que recibiste el dinero.</p>
                                    <template v-else><label class="file-button">Tomar foto del pago {{ index + 1 }}<input type="file" accept="image/jpeg,image/png,image/webp" capture="environment" @change="selectProof($event, row)" /></label><label class="file-button">Adjuntar captura / archivo del pago {{ index + 1 }}<input type="file" accept="image/jpeg,image/png,image/webp,application/pdf" @change="selectProof($event, row)" /></label><small v-if="row.proofName">{{ row.proofName }}</small></template>
                                </section>
                                </article><button v-if="payments.length < Math.min(5, catalog.payment_methods.length)" type="button" @click="payments.push(newPayment())">Agregar otro medio de pago</button><p class="payment-balance" :class="{ 'proof-warning': remaining !== 0 }" aria-live="polite">{{ remaining < 0 ? 'Exceso por corregir' : 'Saldo por distribuir' }}: {{ money(Math.abs(remaining)) }}</p></section>
                                <label class="check"><input v-model="confirmed" type="checkbox" required /><span>Confirmo que recibí el pago y entregué los productos.</span></label><p v-if="catalog.promotion && !historical">Esta compra puede recibir {{ couponLimit }} cupón(es). Podrás escanearlos después de guardar.</p>
                            </fieldset><button class="primary pay" :disabled="busy || (!pending && !cart.length)">{{ busy ? 'Registrando…' : pending ? 'Reintentar la misma venta' : `Registrar venta · ${money(total)}` }}</button><button type="button" :disabled="locked" @click="resetSale">Cancelar venta</button><p class="small">El servidor revalida precios y stock. Se necesita conexión; no se registran ventas sin internet.</p></form></section>
                </div>
            </template>
        </main>
        <button v-if="selling && !receipt && cart.length && !showCheckout && !scannerMode" class="cart-jump primary" @click="goCheckout">Ver venta · {{ cart.reduce((sum, row) => sum + row.quantity, 0) }} unidad(es) · {{ money(total) }}</button>
        <div v-if="scannerMode" class="scanner-overlay" role="dialog" aria-modal="true" aria-label="Escanear código"><section class="card"><h2>{{ scannerMode === 'product' ? 'Escanear producto' : 'Escanear cupón' }}</h2><video ref="video" playsinline muted></video><p role="status">{{ cameraStatus }}</p><button class="primary" @click="stopCamera">Cerrar cámara</button></section></div>
    </div>
</template>
