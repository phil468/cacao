<x-filament-panels::page>
    <style>
        .inventory-transfer{--it-border:#dedbd4;--it-panel:#fff;--it-muted:#666;--it-accent:#a56409;--it-soft:#faf7ef;display:grid;gap:20px;color:inherit}
        .dark .inventory-transfer{--it-border:#44403c;--it-panel:#201f1e;--it-muted:#b8b2aa;--it-accent:#fbbf24;--it-soft:#29251e}
        .inventory-transfer,.inventory-transfer .it-panel{min-width:0}.inventory-transfer .it-panel{padding:20px;border:1px solid var(--it-border);border-radius:14px;background:var(--it-panel)}
        .inventory-transfer h2{font-size:20px;font-weight:700;margin:0 0 12px}.inventory-transfer p{line-height:1.6;margin:8px 0}.inventory-transfer .it-muted{color:var(--it-muted);font-size:13px}
        .inventory-transfer .it-fields,.inventory-transfer .it-filters{display:grid;grid-template-columns:1fr 1fr;gap:16px}.inventory-transfer label{display:grid;gap:7px;font-size:14px;font-weight:600}
        .inventory-transfer input,.inventory-transfer select,.inventory-transfer textarea{width:100%;border:1px solid var(--it-border);border-radius:8px;background:var(--it-panel);color:inherit;padding:10px;font:inherit;min-height:44px}
        .inventory-transfer input:focus,.inventory-transfer select:focus,.inventory-transfer textarea:focus{outline:2px solid var(--it-accent);outline-offset:2px}.inventory-transfer textarea{min-height:80px}
        .inventory-transfer .it-full{grid-column:1/-1}.inventory-transfer .it-check{display:flex;align-items:center;gap:10px;font-weight:400}.inventory-transfer .it-check input{width:20px;min-height:20px}
        .inventory-transfer .it-table{overflow:auto;margin-top:16px}.inventory-transfer table{width:100%;border-collapse:collapse;font-size:14px}.inventory-transfer th{text-align:left;font-size:12px;color:var(--it-muted);padding:12px 10px;background:var(--it-soft);white-space:nowrap}.inventory-transfer td{padding:14px 10px;border-bottom:1px solid var(--it-border);vertical-align:middle}.inventory-transfer td strong{font-weight:600}.inventory-transfer td small{display:block;color:var(--it-muted);font-size:12px;margin-top:4px}
        .inventory-transfer .it-counter{display:flex;align-items:center;gap:5px;width:180px}.inventory-transfer .it-counter input{width:78px;text-align:center;padding:8px 2px}.inventory-transfer button,.inventory-transfer .it-link{display:inline-flex;align-items:center;justify-content:center;min-height:44px;border:1px solid var(--it-border);border-radius:9px;background:var(--it-panel);padding:10px 16px;font:inherit;font-size:14px;font-weight:600;color:inherit;text-decoration:none;cursor:pointer}
        .inventory-transfer .it-counter button{width:44px;padding:6px;font-size:22px;flex-shrink:0}.inventory-transfer button:disabled{opacity:.45;cursor:not-allowed}.inventory-transfer .it-primary{background:#a16207;color:#fff;border-color:#a16207}.dark .inventory-transfer .it-primary{background:#fbbf24;color:#211b0f;border-color:#fbbf24}
        .inventory-transfer .it-actions{display:flex;gap:12px;flex-wrap:wrap;align-items:center}.inventory-transfer .it-footer{position:sticky;bottom:12px;z-index:10;background:var(--it-panel);box-shadow:0 4px 20px #0002;display:flex;align-items:center;justify-content:space-between;gap:16px}.inventory-transfer .it-footer p{margin:0}.inventory-transfer .it-error{border:1px solid #be5b49;border-radius:12px;padding:16px;background:var(--it-soft)}.inventory-transfer .it-error ul{list-style:disc;padding-left:20px}.inventory-transfer .it-success{border-left:5px solid #498057}.inventory-transfer .it-summary{display:flex;gap:24px;flex-wrap:wrap}.inventory-transfer .it-summary strong{display:block}.inventory-transfer .it-badge{font-size:11px;color:var(--it-muted)}
        @media(max-width:700px){.inventory-transfer .it-fields,.inventory-transfer .it-filters{grid-template-columns:1fr}.inventory-transfer .it-panel{padding:14px}.inventory-transfer .it-footer{display:grid;bottom:6px}.inventory-transfer .it-footer .it-primary{width:100%}.inventory-transfer table{min-width:480px}.inventory-transfer .it-summary-table{min-width:650px}.inventory-transfer .it-actions>*{flex:1}.inventory-transfer .it-counter{width:160px}.inventory-transfer .it-counter input{width:62px}}
        @media(max-width:700px){.inventory-transfer .it-products-table,.inventory-transfer .it-summary-table{display:block;min-width:0}.inventory-transfer .it-products-table thead,.inventory-transfer .it-summary-table thead{display:none}.inventory-transfer .it-products-table tbody,.inventory-transfer .it-summary-table tbody{display:block}.inventory-transfer .it-products-table tr{display:grid;grid-template-columns:minmax(0,1fr) 160px;gap:4px 8px;padding:12px 0;border-bottom:1px solid var(--it-border)}.inventory-transfer .it-products-table td{border:0;padding:4px 0;overflow-wrap:anywhere}.inventory-transfer .it-products-table td:first-child{grid-column:1;grid-row:1}.inventory-transfer .it-products-table td:nth-child(2){grid-column:1;grid-row:2;font-size:12px}.inventory-transfer .it-products-table td:nth-child(2)::before{content:'Disponible: ';color:var(--it-muted)}.inventory-transfer .it-products-table td:nth-child(3){grid-column:2;grid-row:1/3;align-self:center}.inventory-transfer .it-summary-table tr{display:grid;grid-template-columns:1fr 1fr;gap:8px;padding:14px 0;border-bottom:1px solid var(--it-border)}.inventory-transfer .it-summary-table td{padding:4px 0;border:0;overflow-wrap:anywhere}.inventory-transfer .it-summary-table td:first-child,.inventory-transfer .it-summary-table td:nth-child(2){grid-column:1/-1}.inventory-transfer .it-summary-table td[data-label]::before{content:attr(data-label) ': ';display:block;font-size:12px;color:var(--it-muted)}}
    </style>
    <div class="inventory-transfer" x-data="{ quantities: $wire.entangle('quantities') }" x-on:transfer-review-ready.window="window.scrollTo({top: 0, behavior: 'smooth'})">
        @if($errors->any())
            <div class="it-error" role="alert"><strong>No se pudo completar la operación</strong><ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
        @endif

        @if($transferId !== null)
            <section class="it-panel it-success" role="status">
                <h2>Transferencia #{{ $transferId }} registrada</h2>
                <p>Se transfirieron {{ $reviewData['units'] }} unidades de {{ $reviewData['presentations'] }} presentaciones, de <strong>{{ $reviewData['from_name'] }}</strong> a <strong>{{ $reviewData['to_name'] }}</strong>.</p>
                <p>Todos los movimientos quedaron registrados en una sola operación. No vuelvas a confirmar esta transferencia.</p>
                <div class="it-actions"><a class="it-link" href="{{ $indexUrl }}">Volver a ubicaciones</a><a class="it-link" href="{{ $newUrl }}">Nueva transferencia</a></div>
            </section>
        @elseif($reviewData)
            <section class="it-panel">
                <p class="it-muted">PASO 2 DE 2 · REVISAR Y CONFIRMAR</p><h2>Resumen de la transferencia</h2>
                <div class="it-summary"><div>Origen<strong>{{ $reviewData['from_name'] }}</strong></div><div>Destino<strong>{{ $reviewData['to_name'] }}</strong></div><div>Presentaciones<strong>{{ $reviewData['presentations'] }}</strong></div><div>Unidades<strong>{{ $reviewData['units'] }}</strong></div></div>
                <p><strong>Motivo:</strong> {{ $reviewData['payload']['reason'] }}</p>
                <p class="it-muted">Revisar no mueve stock ni lo reserva. Los saldos son referenciales: al confirmar se revalida el stock actual. Si un producto no alcanza, no se transfiere ninguno.</p>
                <div class="it-table"><table class="it-summary-table"><thead><tr><th>Producto / presentación</th><th>Cantidad</th><th>Origen · antes → después</th><th>Destino · antes → después</th></tr></thead><tbody>
                    @foreach($reviewData['rows'] as $row)
                        <tr><td><strong>{{ $row['name'] }}</strong><small>{{ $row['sku'] }}</small></td><td data-label="Cantidad">{{ $row['quantity'] }}</td><td data-label="Origen · antes → después">{{ $row['from_before'] }} → {{ $row['from_after'] }}</td><td data-label="Destino · antes → después">{{ $row['to_before'] }} → {{ $row['to_after'] }}</td></tr>
                    @endforeach
                </tbody></table></div>
            </section>
            <section class="it-panel it-footer">
                <p><strong>{{ $reviewData['units'] }} unidades</strong> · {{ $reviewData['presentations'] }} presentaciones</p>
                <div class="it-actions"><button type="button" wire:click="back" wire:loading.attr="disabled">Volver a editar</button><button type="button" class="it-primary" wire:click="confirm" wire:loading.attr="disabled"><span wire:loading.remove wire:target="confirm">Confirmar transferencia</span><span wire:loading wire:target="confirm">Registrando…</span></button></div>
            </section>
            <p class="it-muted">Si se interrumpe la respuesta, reintenta esta misma confirmación. No recargues ni abras otra transferencia antes de revisar los movimientos.</p>
        @else
            <form wire:submit="review" style="display:contents">
                <section class="it-panel">
                    <p class="it-muted">PASO 1 DE 2 · ELEGIR CANTIDADES</p><h2>Origen: {{ $source->name }}</h2>
                    <div class="it-fields">
                        <label>Destino *<select wire:model="to_location_id" required><option value="">Selecciona el destino</option>@foreach($destinations as $destination)<option value="{{ $destination->id }}">{{ $destination->name }}</option>@endforeach</select></label>
                        <label>Motivo *<textarea wire:model="reason" minlength="5" maxlength="500" required placeholder="Ej.: abastecimiento para atención en tienda"></textarea></label>
                    </div>
                </section>
                <section class="it-panel">
                    <h2>Productos y cantidades</h2><p class="it-muted">Deja en cero lo que no vas a enviar. Se muestran todas las presentaciones no archivadas, incluso inactivas; mover stock no las habilita para vender. Máximo 100 presentaciones por operación.</p>
                    <div class="it-filters">
                        <label>Buscar producto o SKU<input type="search" wire:model.live.debounce.300ms="search" placeholder="Nombre, presentación o código" /></label>
                        <label>Categoría<select wire:model.live="category"><option value="">Todas</option>@foreach($categories as $name)<option value="{{ $name }}">{{ $name }}</option>@endforeach</select></label>
                        <label class="it-check"><input type="checkbox" wire:model.live="selectedOnly" /> Solo seleccionados</label>
                        <button type="button" wire:click="refreshCatalog" wire:loading.attr="disabled">Actualizar saldos</button>
                    </div>
                    <div class="it-table"><table class="it-products-table"><thead><tr><th>Producto / presentación</th><th>Disponible en origen</th><th>Cantidad a transferir</th></tr></thead><tbody>
                        @forelse($rows as $row)
                            <tr wire:key="transfer-variant-{{ $row['id'] }}"><td><strong>{{ $row['name'] }}</strong><small>{{ $row['sku'] }} · {{ $row['category'] }}</small>@unless($row['active'])<span class="it-badge">Inactivo para venta</span>@endunless</td><td>{{ $row['stock'] }}</td><td><div class="it-counter">
                                <button type="button" aria-label="Disminuir {{ $row['sku'] }}" x-on:click="quantities['{{ $row['id'] }}'] = Math.max(0, Number(quantities['{{ $row['id'] }}'] || 0) - 1)" x-bind:disabled="Number(quantities['{{ $row['id'] }}'] || 0) &lt;= 0">−</button>
                                <input type="number" aria-label="Cantidad {{ $row['sku'] }}" x-model.number="quantities['{{ $row['id'] }}']" min="0" max="{{ min(100000, $row['stock']) }}" step="1" inputmode="numeric" />
                                <button type="button" aria-label="Aumentar {{ $row['sku'] }}" x-on:click="quantities['{{ $row['id'] }}'] = Math.min({{ min(100000, $row['stock']) }}, Number(quantities['{{ $row['id'] }}'] || 0) + 1)" x-bind:disabled="Number(quantities['{{ $row['id'] }}'] || 0) &gt;= {{ min(100000, $row['stock']) }}">+</button>
                            </div></td></tr>
                        @empty<tr><td colspan="3">No hay productos que coincidan con los filtros.</td></tr>@endforelse
                    </tbody></table></div>
                    <p class="it-muted">Filtrar no borra cantidades de productos que queden ocultos. Usa «Solo seleccionados» para revisarlos.</p>
                </section>
                <section class="it-panel it-footer">
                    <p><strong x-text="Object.values(quantities).filter(value => Number(value) > 0).length">0</strong> presentaciones · <strong x-text="Object.values(quantities).reduce((sum, value) => sum + Math.max(0, Number(value) || 0), 0)">0</strong> unidades</p>
                    <div class="it-actions"><a class="it-link" href="{{ $indexUrl }}">Cancelar</a><button type="submit" class="it-primary" wire:loading.attr="disabled"><span wire:loading.remove wire:target="review">Revisar transferencia</span><span wire:loading wire:target="review">Revisando…</span></button></div>
                </section>
            </form>
        @endif
    </div>
</x-filament-panels::page>
