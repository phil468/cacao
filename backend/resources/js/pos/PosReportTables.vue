<script setup lang="ts">
import {computed, ref} from 'vue';
import {money} from './operations';
import type {Shift} from './operations';
type Row = {variant_id:number; name:string; available:number; quarantine?:number; opening?:number; counted?:number; difference?:number; quarantine_counted?:number};
const props = defineProps<{rows:Row[]; shifts:{id:number; summary:Shift}[]; closed:boolean}>();
const search = ref('');
const visible = computed(()=>props.rows.filter(row=>row.name.toLocaleLowerCase().includes(search.value.toLocaleLowerCase())));
</script>

<template>
 <section class="report-tables">
  <h3>Resumen de inventario</h3>
  <p>{{closed?'Cierre guardado: los valores no cambian con movimientos posteriores.':'Saldo actual en curso. No es un cierre físico ni una reconstrucción histórica.'}}</p>
  <label>Buscar en el resumen<input v-model="search" type="search" /></label>
  <div class="table-scroll" tabindex="0" role="region" aria-label="Resumen de inventario desplazable">
   <table><caption>Unidades por presentación</caption><thead><tr><th scope="col">Producto / presentación</th><th v-if="closed" scope="col">Inicio del período de cierre</th><th scope="col">{{closed?'Esperado':'Vendible actual'}}</th><th v-if="closed" scope="col">Contado</th><th v-if="closed" scope="col">Diferencia</th><th scope="col">Cuarentena{{closed?' contada':''}}</th></tr></thead>
    <tbody><tr v-for="row in visible" :key="row.variant_id"><th scope="row">{{row.name}}</th><td v-if="closed">{{row.opening??'—'}}</td><td>{{row.available}}</td><td v-if="closed">{{row.counted??'—'}}</td><td v-if="closed">{{row.difference??'—'}}</td><td>{{closed?(row.quarantine_counted??'—'):(row.quarantine??0)}}</td></tr></tbody>
   </table>
  </div>
  <p v-if="!rows.length">No hay un cierre guardado para esta fecha. No se sustituye por el stock de hoy.</p>
  <p v-else-if="!visible.length">No hay productos que coincidan con la búsqueda.</p>
  <h3>Resumen de caja por turno y medio de pago</h3>
  <p>Esperado = fondo + cobros + entradas − salidas y reembolsos. No representa utilidad. Los turnos abiertos todavía no tienen un conteo confirmado.</p>
  <div class="table-scroll" tabindex="0" role="region" aria-label="Resumen de caja desplazable">
   <table><caption>Importes en soles</caption><thead><tr><th scope="col">Turno / medio</th><th scope="col">Estado</th><th scope="col">Fondo</th><th scope="col">Cobros</th><th scope="col">Entradas</th><th scope="col">Salidas / reembolsos</th><th scope="col">Esperado</th><th scope="col">Contado / verificado</th><th scope="col">Diferencia</th></tr></thead>
    <tbody><template v-for="shift in shifts" :key="shift.id"><tr v-for="method in shift.summary.methods" :key="method.payment_method_id"><th scope="row">#{{shift.id}} · {{shift.summary.cashier}}<br />{{method.name}}</th><td>{{shift.summary.closed_at?'Cerrado':'En curso'}}</td><td>{{money(method.opening)}}</td><td>{{money(method.sales)}}</td><td>{{money(method.incoming)}}</td><td>{{money(method.outgoing)}}</td><td>{{money(method.expected)}}</td><td>{{method.counted==null?'—':money(method.counted)}}</td><td>{{method.difference==null?'—':money(method.difference)}}</td></tr></template></tbody>
   </table>
  </div>
  <p v-if="!shifts.length">No hay turnos para esta fecha y punto de venta.</p>
 </section>
</template>

<style scoped>
.report-tables { min-width: 0; }
.table-scroll { max-width: 100%; max-height: 480px; overflow: auto; border: 1px solid #ded5c9; border-radius: 12px; margin-block: 16px; }
table { border-collapse: separate; border-spacing: 0; width: 100%; font-size: 13px; }
caption { text-align: left; padding: 12px; color: #655b51; }
th, td { padding: 12px; border-bottom: 1px solid #e8e0d5; text-align: right; white-space: nowrap; }
thead th { position: sticky; top: 0; z-index: 2; background: #eceede; }
tr > th:first-child { position: sticky; left: 0; z-index: 1; background: #fffdf8; text-align: left; min-width: 160px; max-width: 230px; white-space: normal; }
thead tr > th:first-child { z-index: 3; background: #eceede; }
tbody tr:hover td, tbody tr:hover th { background: #f4f6ed; }
</style>
