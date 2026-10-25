<script setup lang="ts">
import {computed, onBeforeUnmount, ref, watch} from 'vue';
import {api, ApiError} from './api';
import {money, units} from './operations';
import type {OperationsState, Shift} from './operations';
const props = defineProps<{locationId: number; state: OperationsState; refreshing: boolean; user: {id: number; can_discount: boolean; can_inventory: boolean; can_historical: boolean}; methods: {id: number; name: string; code: string}[]}>();
const emit = defineEmits<{refresh: []; message: [text: string]; error: [text: string]; lock: [value: boolean]}>();
const tab = ref('shift'), search = ref(''), busy = ref(false), opening = ref('0'), reason = ref('');
const pendingYesterday = ref(false), pendingDayReason = ref('');
const counted = ref<Record<number, string>>({}), quantities = ref<Record<number, number>>({}), physical = ref<Record<number, string>>({}), held = ref<Record<number, string>>({});
const minimums = ref<Record<number, number>>({}), targets = ref<Record<number, number>>({}), requestQuantities = ref<Record<number, number>>({});
const restockView = ref<'request' | 'settings'>('request');
const kind = ref('gift'), entryKind = ref('in'), entryAmount = ref(''), entryMethod = ref(''), refundOrder = ref('');
type Review = {path: string; payload: Record<string, unknown>; title: string; lines: string[]};
const review = ref<Review | null>(null), pending = ref<Review | null>(null), lastClose = ref<Shift | null>(null);
type Report = {date: string; sales_total: number; sales_count: number; discount_total: number; historical_total: number; historical_count: number; unassigned_sales_total: number; payments: Record<string, number>; orders: {id: number; number: string; total: number; historical: boolean; registered_at: string}[]; shifts: {id: number; cashier: string; opened_at: string; closed_at: string | null; closing_snapshot: Shift | null}[]; inventory_closing: {snapshot: {rows: {variant_id: number; name: string; sku: string; opening: number; available: number; counted: number; difference: number; quarantine_counted: number; quarantine_difference: number; movements: Record<string,number>}[]}} | null; operations: {id: number; kind: string; reason: string; created_at: string; items: {variant_id: number; quantity: number}[]}[]};
const report = ref<Report | null>(null), reportDate = ref(props.state.today);
const locked = computed(() => busy.value || pending.value !== null || props.refreshing);
watch(() => busy.value || pending.value !== null || review.value !== null, value=>emit('lock',value), {immediate:true});
onBeforeUnmount(()=>emit('lock',false));
const visible = computed(() => props.state.inventory.filter(r => `${r.name} ${r.sku}`.toLowerCase().includes(search.value.toLowerCase())));
const kindNames: Record<string, string> = {gift:'Obsequio', sample:'Degustación', damaged:'Producto fallado → cuarentena', writeoff:'Merma definitiva de cuarentena', supplier_return:'Devolución al proveedor desde cuarentena', release:'Liberar cuarentena a vendible'};
watch(() => props.state, state => {
    counted.value = {}; quantities.value = {}; physical.value = {}; held.value = {}; minimums.value = {}; targets.value = {}; requestQuantities.value = {};
    for (const row of state.inventory) { held.value[row.variant_id] = row.quarantine ? '' : '0'; minimums.value[row.variant_id] = row.minimum; targets.value[row.variant_id] = row.target; requestQuantities.value[row.variant_id] = row.suggested; }
    entryMethod.value = String(props.methods.find(m=>m.code==='pos_cash')?.id ?? '');
}, {immediate: true});
function show(path: string, payload: Record<string, unknown>, title: string, lines: string[]) {
    if (locked.value) return;
    review.value = {path, payload: JSON.parse(JSON.stringify(payload)), title, lines};
}
async function confirm() {
    if (busy.value || (!pending.value && !review.value)) return;
    pending.value ??= review.value;
    busy.value = true;
    try {
        const result = await api<Record<string, unknown>>(pending.value!.path, {method:'POST', body:JSON.stringify(pending.value!.payload)});
        if (pending.value!.path.endsWith('/close')) lastClose.value = result as unknown as Shift;
        if (pending.value!.path === 'operations/shifts') { pendingYesterday.value = false; pendingDayReason.value = ''; }
        emit('message', `${pending.value!.title}: registrado correctamente.`); pending.value = null; review.value = null; reason.value = ''; emit('refresh');
    } catch(e) {
        if (e instanceof ApiError && [400,401,403,404,409,422].includes(e.status)) pending.value = null;
        emit('error', (e instanceof Error ? e.message : 'No se pudo registrar.') + (pending.value ? ' Resultado incierto: reintenta la misma operación; no abras otra ni recargues antes de revisar el historial.' : ''));
    } finally {busy.value = false;}
}
function prepareOpen() {
    const amount = units(opening.value); if (!Number.isSafeInteger(amount)) return emit('error','Ingresa un fondo inicial válido.');
    if (pendingYesterday.value && pendingDayReason.value.trim().length < 5) return emit('error','Explica el motivo del registro pendiente (mínimo 5 caracteres).');
    show('operations/shifts', {submission_id:crypto.randomUUID(), location_id:props.locationId, opening_cash:amount, ...(pendingYesterday.value ? {pending_yesterday:true,reason:pendingDayReason.value.trim()} : {})}, pendingYesterday.value ? 'Abrir jornada pendiente de ayer' : 'Abrir turno de hoy', [`Fondo inicial: ${money(amount)}.`, pendingYesterday.value ? 'Las ventas afectarán la caja de ayer y descontarán stock actual. Solo si ayer no tuvo cierre y hoy no hubo caja, conteo ni movimientos de inventario.' : 'El cajero responsable será tu usuario.', ...(pendingYesterday.value ? [pendingDayReason.value.trim()] : [])]);
}
function prepareClose() {
    if (!props.state.shift) return;
    const counts = props.state.shift.methods.map(m=>({payment_method_id:m.payment_method_id, counted_amount:m.code==='pos_cash' ? units(counted.value[m.payment_method_id]) : signedUnits(counted.value[m.payment_method_id])}));
    if (counts.some(r=>!Number.isSafeInteger(r.counted_amount))) return emit('error','Completa el efectivo contado y los cobros netos verificados para cada medio.');
    show(`operations/shifts/${props.state.shift.id}/close`, {counts, reason:reason.value}, 'Cerrar turno sin posibilidad de edición', props.state.shift.methods.map((m,i)=>`${m.name}: esperado ${money(m.expected)}, verificado ${money(counts[i].counted_amount)}, diferencia ${money(counts[i].counted_amount-m.expected)}.`));
}
function signedUnits(value: unknown) {const text=String(value ?? ''); return text.startsWith('-') ? -units(text.slice(1)) : units(text);}
function prepareEntry() {
    if (!props.state.shift) return;
    const amount=units(entryAmount.value); if (!Number.isSafeInteger(amount)||amount<=0) return emit('error','Ingresa un importe mayor que cero.');
    show(`operations/shifts/${props.state.shift.id}/entries`, {submission_id:crypto.randomUUID(), kind:entryKind.value, amount, payment_method_id:Number(entryMethod.value), reason:reason.value, ...(entryKind.value==='refund'?{order_id:Number(refundOrder.value)}:{})}, 'Movimiento de caja', [`${entryKind.value==='in'?'Entrada':entryKind.value==='out'?'Retiro':'Reembolso'}: ${money(amount)}.`, reason.value]);
}
function selectedItems(source: Record<number, number>) {return props.state.inventory.filter(r=>Number(source[r.variant_id] ?? 0)>0).map(r=>({variant_id:r.variant_id, quantity:Number(source[r.variant_id])}));}
function prepareOut() {
    const items=selectedItems(quantities.value); if(!items.length) return emit('error','Selecciona al menos una unidad.');
    show('operations/stock',{submission_id:crypto.randomUUID(),location_id:props.locationId,kind:kind.value,reason:reason.value,items},kindNames[kind.value],items.map(i=>`${props.state.inventory.find(r=>r.variant_id===i.variant_id)!.name}: ${i.quantity} unidad(es).`));
}
function prepareCount() {
    const counts=props.state.inventory.map(r=>({variant_id:r.variant_id,expected:r.available,counted:physical.value[r.variant_id] === undefined || physical.value[r.variant_id] === '' ? NaN:Number(physical.value[r.variant_id]),quarantine_expected:r.quarantine,quarantine_counted:held.value[r.variant_id] === '' ? NaN:Number(held.value[r.variant_id])}));
    if(counts.some(r=>!Number.isInteger(r.counted)||r.counted<0||!Number.isInteger(r.quarantine_counted)||r.quarantine_counted<0))return emit('error','Completa el conteo físico de todos los productos y de las unidades en cuarentena.');
    const differences=counts.filter(r=>r.counted!==r.expected||r.quarantine_counted!==r.quarantine_expected);
    if(differences.length&&!props.user.can_inventory)return emit('error','Hay diferencias. Solicita al administrador que revise y confirme el ajuste de inventario.');
    show('operations/inventory-close',{submission_id:crypto.randomUUID(),location_id:props.locationId,reason:reason.value,counts},'Cierre diario de inventario',[
        `${props.state.today}: ${counts.length} presentaciones verificadas. Después de cerrar no podrás registrar nuevas ventas ni salidas hoy.`,
        ...differences.map(r=>`${props.state.inventory.find(p=>p.variant_id===r.variant_id)!.name}: disponible ${r.expected} → ${r.counted}; cuarentena ${r.quarantine_expected} → ${r.quarantine_counted}.`), differences.length?'Las diferencias ajustarán el stock con tu usuario y motivo.':'Sin diferencias.']);
}
function useExpected() {for(const row of props.state.inventory){physical.value[row.variant_id]=String(row.available);held.value[row.variant_id]=String(row.quarantine);}}
function prepareRequest() {
    const items=selectedItems(requestQuantities.value);if(!items.length)return emit('error','Selecciona cantidades para solicitar.');
    show('operations/requests',{submission_id:crypto.randomUUID(),location_id:props.locationId,reason:reason.value,items},'Solicitar reposición (sin mover stock)',items.map(i=>`${props.state.inventory.find(r=>r.variant_id===i.variant_id)!.name}: ${i.quantity} unidad(es).`));
}
function prepareSettings() {
    if (!props.user.can_inventory) return;
    const rows = props.state.inventory.filter(r=>r.active);
    if (rows.some(r=>!Number.isInteger(minimums.value[r.variant_id]) || !Number.isInteger(targets.value[r.variant_id]) || minimums.value[r.variant_id]<0 || targets.value[r.variant_id]<minimums.value[r.variant_id] || targets.value[r.variant_id]>100000)) return emit('error','Ingresa mínimos y objetivos enteros entre 0 y 100000. El objetivo no puede ser menor que el mínimo.');
    const changed = rows.filter(r=>minimums.value[r.variant_id]!==r.minimum || targets.value[r.variant_id]!==r.target);
    if (!changed.length) return emit('error','No hay cambios de mínimos u objetivos para guardar.');
    show('operations/settings',{location_id:props.locationId,items:changed.map(r=>({variant_id:r.variant_id,minimum_quantity:minimums.value[r.variant_id],target_quantity:targets.value[r.variant_id]}))},'Guardar mínimos y objetivos',[
        'Solo guarda la configuración del punto seleccionado. No solicita productos ni modifica existencias.',
        ...changed.map(r=>`${r.name}: mínimo ${r.minimum} → ${minimums.value[r.variant_id]}; objetivo ${r.target} → ${targets.value[r.variant_id]}.`)]);
}
async function loadReport() {busy.value=true;try{report.value=await api<Report>(`operations/report?location_id=${props.locationId}&date=${reportDate.value}`);}catch(e){emit('error',e instanceof Error?e.message:'No se pudo consultar.');}finally{busy.value=false;}}
</script>

<template>
<section class="operations card">
 <h2>Operación del punto de venta</h2><p v-if="state.day_closed" class="proof-warning">Inventario de hoy cerrado. Los cierres confirmados no se modifican.</p>
 <details v-if="tab==='restock'" class="restock-help"><summary>¿Cómo se calcula la reposición y dónde se configura?</summary><p>La sugerencia descuenta lo disponible en este punto de venta del objetivo y se limita al stock central. Se precarga solo al alcanzar el mínimo; si central no tiene unidades, se precarga 0. Solicitar no reserva existencias.</p><p v-if="user.can_inventory">Usa «Configurar mínimos y objetivos» para cambiar las alertas sin solicitar productos. Revisa y confirma la configuración para guardarla. La vista «Solicitar productos» solo registra solicitudes.</p></details>
 <fieldset :disabled="locked || review !== null"><nav class="categories" aria-label="Operaciones"><button v-for="item in [{id:'shift',label:'Turno y caja'},{id:'out',label:'Salidas / fallados'},{id:'count',label:'Inventario diario'},{id:'restock',label:'Reposición'},...(user.can_discount?[{id:'report',label:'Reporte diario'}]:[])]" :key="item.id" type="button" :class="{selected:tab===item.id}" @click="tab=item.id;search=''">{{item.label}}</button></nav></fieldset>
 <section v-if="review" class="operation-review"><h3>{{review.title}}</h3><ul><li v-for="(line,index) in review.lines" :key="index">{{line}}</li></ul><p>Revisa antes de confirmar. Si se pierde la respuesta, reintenta esta misma operación.</p><div class="actions"><button :disabled="locked" @click="review=null">Volver a editar</button><button v-if="!pending" class="primary" :disabled="busy" @click="confirm">Confirmar operación</button></div></section>
 <button v-if="pending" class="primary" :disabled="busy" @click="confirm">{{busy?'Registrando…':'Reintentar la misma operación'}}</button>
 <fieldset v-if="!review" :disabled="locked">
 <section v-if="tab==='shift'">
  <template v-if="!state.shift"><p v-if="state.other_shift_open">Otro cajero tiene el turno abierto. Debe cerrarlo antes del relevo.</p><form v-else-if="!state.day_closed" @submit.prevent="prepareOpen"><label v-if="user.can_historical" class="check"><input v-model="pendingYesterday" type="checkbox" /> Registrar jornada pendiente de ayer (afecta caja e inventario)</label><template v-if="pendingYesterday"><p class="proof-warning">Primero completa y cierra ayer. No debe haber caja ni movimientos de inventario hoy. No se reabren cierres confirmados.</p><label>Motivo del registro pendiente<textarea v-model="pendingDayReason" minlength="5" maxlength="1000" required /></label></template><label>Fondo inicial en efectivo (S/)<input v-model="opening" type="number" min="0" step="0.01" required /></label><button class="primary">Revisar apertura de turno</button></form></template>
  <template v-else><h3>Turno #{{state.shift.id}} · {{state.shift.cashier}}</h3><p>Jornada: {{state.shift.business_date ?? state.shift.opened_at.slice(0,10)}}. Registrada: {{state.shift.opened_at}}. Ventas: {{state.shift.sales_count}} · {{money(state.shift.sales_total)}}. Descuentos: {{money(state.shift.discount_total)}}.</p>
   <p>Cuenta el efectivo físico, incluido el fondo. Para Yape y bancos verifica el movimiento neto cobrado, no el saldo total de la cuenta.</p>
   <form @submit.prevent="prepareClose"><article v-for="method in state.shift.methods" :key="method.payment_method_id" class="operation-row"><strong>{{method.name}}</strong><p>Fondo {{money(method.opening)}} + ventas {{money(method.sales)}} + entradas {{money(method.incoming)}} − salidas/reembolsos {{money(method.outgoing)}} = {{money(method.expected)}}</p><label>{{method.code==='pos_cash'?'Efectivo contado':'Cobros netos verificados'}} (S/)<input v-model="counted[method.payment_method_id]" type="number" :min="method.code==='pos_cash'?0:undefined" step="0.01" required /></label></article><label>Observación del cierre<textarea v-model="reason" minlength="5" maxlength="1000" required /></label><button class="primary">Revisar cierre de turno</button></form>
   <details><summary>Entrada, retiro o reembolso de dinero</summary><form @submit.prevent="prepareEntry"><label>Movimiento<select v-model="entryKind"><option value="in">Entrada de efectivo</option><option value="out">Retiro de efectivo</option><option v-if="user.can_discount" value="refund">Reembolso de devolución</option></select></label><label>Medio<select v-model="entryMethod" required><option v-for="method in methods.filter(m=>entryKind==='refund'||m.code==='pos_cash')" :key="method.id" :value="String(method.id)">{{method.name}}</option></select></label><label v-if="entryKind==='refund'">ID del pedido con devolución registrada<input v-model="refundOrder" type="number" min="1" required /></label><label>Importe (S/)<input v-model="entryAmount" type="number" min="0.01" step="0.01" required /></label><label>Motivo<textarea v-model="reason" minlength="5" maxlength="1000" required /></label><button>Revisar movimiento de caja</button></form></details>
  </template>
  <section v-if="lastClose"><h3>Turno #{{lastClose.id}} cerrado</h3><p v-for="method in lastClose.methods" :key="method.payment_method_id">{{method.name}}: esperado {{money(method.expected)}}, verificado {{money(method.counted??0)}}, diferencia {{money(method.difference??0)}}.</p></section>
 </section>
 <section v-if="tab==='out'&&!state.day_closed"><h3>Salidas en unidades completas</h3><p>No son ventas ni generan cupones. Los fallados se separan en cuarentena, sin destruirlos.</p><label>Tipo<select v-model="kind"><option v-for="(label,key) in kindNames" :key="key" :value="key" :disabled="['writeoff','supplier_return','release'].includes(key)&&!user.can_inventory">{{label}}</option></select></label><label>Buscar presentación<input v-model="search" type="search" /></label><form @submit.prevent="prepareOut"><article v-for="row in visible" :key="row.variant_id" class="operation-row"><strong>{{row.name}}</strong><small>Vendible: {{row.available}} · Cuarentena: {{row.quarantine}}</small><label>Unidades<input v-model.number="quantities[row.variant_id]" :aria-label="'Unidades de ' + row.name" type="number" min="0" :max="['writeoff','supplier_return','release'].includes(kind)?row.quarantine:row.available" step="1" /></label></article><label>Motivo de la salida<textarea v-model="reason" minlength="5" maxlength="1000" required /></label><button class="primary">Revisar salida de inventario</button></form></section>
 <section v-if="tab==='count'"><h3>Cierre diario de inventario · {{state.today}}</h3><p>Solo después de cerrar todos los turnos. Cuenta por separado las unidades vendibles y las falladas. Si hay diferencias, confirma un administrador con permiso de inventario.</p><template v-if="!state.day_closed"><button type="button" @click="useExpected">Completar con saldos del sistema (solo si verificaste físicamente)</button><label>Buscar producto del conteo<input v-model="search" type="search" /></label><form @submit.prevent="prepareCount"><article v-for="row in visible" :key="row.variant_id" class="operation-row"><strong>{{row.name}}</strong><small>Esperado: {{row.available}} · Cuarentena: {{row.quarantine}}</small><label>Conteo vendible<input v-model="physical[row.variant_id]" :aria-label="'Conteo vendible de ' + row.name" type="number" min="0" step="1" /></label><label v-if="row.quarantine>0">Conteo en cuarentena<input v-model="held[row.variant_id]" :aria-label="'Conteo en cuarentena de ' + row.name" type="number" min="0" step="1" /></label></article><label>Observación del conteo<textarea v-model="reason" minlength="5" maxlength="1000" required /></label><button class="primary">Revisar cierre diario de inventario</button></form></template></section>
 <section v-if="tab==='restock'">
  <div class="actions restock-views" role="group" aria-label="Vista de reposición">
   <button type="button" :aria-pressed="restockView==='request'" :class="{primary:restockView==='request'}" @click="restockView='request'">Solicitar productos</button>
   <button v-if="user.can_inventory" type="button" :aria-pressed="restockView==='settings'" :class="{primary:restockView==='settings'}" @click="restockView='settings'">Configurar mínimos y objetivos</button>
  </div>
  <template v-if="restockView==='request' || !user.can_inventory">
   <h3>Solicitud al almacén central</h3><p>Vista simplificada: indica solo las cantidades que necesitas. Solicitar no reserva ni aumenta stock; un administrador confirma la transferencia completa.</p>
   <label>Buscar producto para reposición<input v-model="search" type="search" /></label>
   <article v-for="row in visible.filter(r=>r.active)" :key="row.variant_id" class="operation-row"><strong>{{row.name}}</strong><small>Stock local: {{row.available}} · Central: {{row.central_available}}</small><p v-if="row.suggested>0" class="proof-warning">Sugerido: {{row.suggested}} unidad(es)</p><label>Cantidad a solicitar<input v-model.number="requestQuantities[row.variant_id]" :aria-label="'Cantidad a solicitar de ' + row.name" type="number" min="0" step="1" /></label></article>
   <form @submit.prevent="prepareRequest"><label>Motivo de reposición<textarea v-model="reason" minlength="5" maxlength="1000" required /></label><button class="primary">Revisar solicitud conjunta</button></form>
   <h3>Solicitudes recientes</h3><article v-for="request in state.requests" :key="request.id" class="operation-row"><strong>#{{request.id}} · {{request.status==='fulfilled'?'Transferida':'Pendiente'}}</strong><p>{{request.reason}}</p><ul><li v-for="item in request.items" :key="item.variant_id">{{state.inventory.find(r=>r.variant_id===item.variant_id)?.name??('Producto #'+item.variant_id)}}: {{item.quantity}} unidad(es)</li></ul><button v-if="user.can_inventory&&request.status==='pending'" type="button" @click="show(`operations/requests/${request.id}/fulfill`,{},'Transferir stock solicitado',request.items.map(i=>`${state.inventory.find(r=>r.variant_id===i.variant_id)?.name??i.variant_id}: ${i.quantity} unidad(es)`))">Revisar y transferir desde central</button><p v-if="request.inventory_transfer_id">Transferencia #{{request.inventory_transfer_id}}</p></article>
  </template>
  <template v-else>
   <h3>Configuración de mínimos y objetivos</h3><p>Solo configura las alertas de este punto de venta. No necesitas pedir productos ni indicar un motivo de reposición. El objetivo debe ser igual o mayor que el mínimo.</p>
   <label>Buscar producto para configurar<input v-model="search" type="search" /></label>
   <form @submit.prevent="prepareSettings">
    <article v-for="row in visible.filter(r=>r.active)" :key="row.variant_id" class="operation-row restock-settings-row">
     <div><strong>{{row.name}}</strong><small>Guardado: mínimo {{row.minimum}}, objetivo {{row.target}}</small></div>
     <div class="restock-settings-fields"><label>Mínimo<input v-model.number="minimums[row.variant_id]" :aria-label="'Mínimo de ' + row.name" type="number" min="0" max="100000" step="1" required /></label><label>Objetivo<input v-model.number="targets[row.variant_id]" :aria-label="'Objetivo de ' + row.name" type="number" :min="minimums[row.variant_id]" max="100000" step="1" required /></label></div>
    </article>
    <button class="primary">Revisar mínimos y objetivos</button>
   </form>
  </template>
 </section>
 <section v-if="tab==='report'&&user.can_discount"><h3>Reporte diario por punto</h3><form @submit.prevent="loadReport"><label>Fecha del reporte<input v-model="reportDate" type="date" :max="state.today" required /></label><button>Consultar reporte</button></form><template v-if="report"><p>{{report.sales_count}} venta(s) · Neto {{money(report.sales_total)}} · Descuentos {{money(report.discount_total)}}</p><p>Incorporaciones históricas posteriores: {{report.historical_count}} · {{money(report.historical_total)}}. No cambian los cierres originales.</p><p v-if="report.unassigned_sales_total">Ventas anteriores sin turno: {{money(report.unassigned_sales_total)}}.</p><p v-for="(amount,name) in report.payments" :key="name">{{name}}: {{money(amount)}} (ventas por fecha comercial; no es el saldo físico del turno).</p><h3>Turnos y cierres guardados</h3><article v-for="shift in report.shifts" :key="shift.id" class="operation-row"><strong>#{{shift.id}} · {{shift.cashier}} · {{shift.closed_at?'Cerrado':'Abierto'}}</strong><p>{{shift.opened_at}} → {{shift.closed_at??'pendiente'}}</p><p v-for="method in shift.closing_snapshot?.methods??[]" :key="method.payment_method_id">{{method.name}}: esperado {{money(method.expected)}}, contado/verificado {{money(method.counted??0)}}, diferencia {{money(method.difference??0)}}.</p></article><h3>Inventario al cierre</h3><p v-if="!report.inventory_closing">No se confirmó un conteo para este día.</p><article v-for="row in report.inventory_closing?.snapshot.rows??[]" :key="row.variant_id" class="operation-row"><strong>{{row.name}}</strong><p>Inicio: {{row.opening}} · Esperado: {{row.available}} · Contado: {{row.counted}} · Diferencia: {{row.difference}} · Cuarentena contada: {{row.quarantine_counted}} (diferencia {{row.quarantine_difference}})</p><small v-for="(quantity,type) in row.movements" :key="type">{{type}}: {{quantity}} · </small></article><h3>Salidas del día</h3><article v-for="operation in report.operations" :key="operation.id" class="operation-row"><strong>#{{operation.id}} · {{kindNames[operation.kind]}}</strong><p>{{operation.created_at}} · {{operation.reason}}</p><small v-for="item in operation.items" :key="item.variant_id">{{state.inventory.find(r=>r.variant_id===item.variant_id)?.name??('Producto #'+item.variant_id)}}: {{item.quantity}} unidad(es) · </small></article><h3>Ventas por fecha comercial</h3><p v-for="order in report.orders" :key="order.id">#{{order.id}} · {{money(order.total)}} · {{order.historical?'Histórica sin stock/caja actual':'Venta'}} · Registrada: {{order.registered_at}}</p></template></section>
 </fieldset><button type="button" :disabled="locked || review!==null" @click="emit('refresh')">Actualizar saldos y resúmenes</button>
</section>
</template>

<style scoped>
/* Keep whole-unit entry beside the product, without changing review or payloads. */
.operation-row:has(> small):has(> label) {
    display: grid;
    grid-template-columns: minmax(0, 1fr) minmax(110px, 150px);
    column-gap: 18px;
    row-gap: 6px;
    align-items: start;
}
.operation-row:has(> label) > strong,
.operation-row:has(> label) > small,
.operation-row:has(> label) > p { grid-column: 1; margin: 0; }
.operation-row:has(> small) > label { grid-column: 2; margin: 0; font-size: 11px; }
.operation-row:has(> small) > label:first-of-type { grid-row: 1 / span 2; }
.operation-row:has(> small) > .actions { grid-column: 1 / -1; justify-content: flex-end; margin-top: 8px; }
.operation-row:has(> small) > .actions > label { flex: 0 1 150px; margin: 0; font-size: 11px; }
.operation-row:has(> small) input[type="number"] { text-align: center; padding-inline: 8px; }
.restock-help { padding: 12px; background: #f4f6ed; border-radius: 10px; font-size: 13px; }
.restock-help summary { cursor: pointer; font-weight: 600; }
.restock-views { margin: 12px 0 20px; }
.restock-views button { flex: 1 1 180px; }
.restock-settings-row { display: grid; grid-template-columns: minmax(0, 1fr) minmax(0, 300px); gap: 16px; align-items: start; }
.restock-settings-fields { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 10px; }
.restock-settings-fields label { min-width: 0; margin: 0; font-size: 11px; }
.restock-settings-fields input { padding-inline: 8px; text-align: center; }
input[type="search"] {
    padding-left: 42px;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 24 24' fill='none' stroke='%23655b51' stroke-width='1.8' stroke-linecap='round'%3E%3Ccircle cx='10.5' cy='10.5' r='6.5'/%3E%3Cpath d='m16 16 4.5 4.5'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: 14px center;
}
@media (max-width: 480px) {
    .restock-settings-row { grid-template-columns: minmax(0, 1fr); }
    .operation-row:has(> small):has(> label) { grid-template-columns: minmax(0, 1fr) 110px; column-gap: 10px; }
    .operation-row:has(> small) > .actions > label { flex-basis: 110px; }
}
</style>
