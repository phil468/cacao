<!doctype html><html lang="es"><head><meta charset="utf-8"><style>
@page { margin: 0; size: A4 portrait; }
body { margin: 0; font-family: 'DejaVu Sans', sans-serif; color: {{ $settings['ink'] }}; }
.sheet { position: relative; width: 210mm; height: 296mm; page-break-after: always; }
.sheet:last-child { page-break-after: auto; }
.coupon { position: absolute; width: {{ $settings['width'] }}mm; height: {{ $settings['height'] }}mm; box-sizing: border-box; text-align: center; background: {{ $settings['paper'] }}; }
.logo { position:absolute; left:{{ $logoLayout['left'] }}mm; top:{{ $logoLayout['top'] }}mm; width:{{ $logoLayout['width'] }}mm; height:{{ $logoLayout['height'] }}mm; }
.gold-frame { position:absolute; left:.8mm; top:.8mm; width:28.4mm; height:48.4mm; border:.2mm solid #b49349; box-sizing:border-box; }
.gold-rule { position:absolute; left:10mm; top:10.5mm; width:10mm; border-top:.35mm solid #b49349; }
.title { position:absolute; left:2mm; top:11mm; width:26mm; font-size:5.5pt; font-weight:bold; letter-spacing:.3pt; line-height:1.2; }
.code { position:absolute; left:0; top:16mm; width:30mm; font-family:'DejaVu Sans Mono',monospace; font-size:13pt; font-weight:bold; }
.qr { position:absolute; left:5mm; top:22mm; width:20mm; height:20mm; }
.url { position:absolute; left:0; top:42mm; width:30mm; font-size:4.5pt; }
.date { position:absolute; left:0; top:45mm; width:30mm; font-size:7.5pt; font-weight:bold; color:#896b2d; }
.back .title { top:4mm; font-size:8pt; }
.steps { position:absolute; left:2mm; top:16mm; width:26mm; }
.back p { font-size:6.5pt; line-height:1.35; margin:1mm 0; }
.back .date { top:43mm; font-size:7pt; }
.cut-h,.cut-v { position:absolute; border-color:#888; border-style:solid; border-width:0; }
.cut-h { width:1mm; border-top-width:.15mm; }
.cut-v { height:1mm; border-left-width:.15mm; }
</style></head><body>
@foreach($pages as $items)
<div class="sheet">
@foreach($items as $index => $item)
@php
    $column = $index % 6;
    if ($side === 'back') { $column = 5 - $column; }
    $x = $settings['left'] + $column * ($settings['width'] + $settings['gap']);
    $y = $settings['top'] + intdiv($index, 6) * ($settings['height'] + $settings['gap']);
@endphp
<div class="coupon {{ $side === 'back' ? 'back' : '' }}" style="left:{{ $x }}mm;top:{{ $y }}mm;">
    <div class="gold-frame"></div>
    @if($side === 'front')
        <div class="gold-rule"></div>
        <img class="logo" src="{{ $logo }}" alt="Cacao del Perú"><div class="title">SORTEO DE ANIVERSARIO</div>
        <div class="code">{{ $item['code'] }}</div><img class="qr" src="{{ $item['qr'] }}" alt="QR">
        <div class="url">{{ $displayUrl }}</div><div class="date">{{ $drawLabel }}</div>
    @else
        <div class="title">REGISTRA TU CÓDIGO</div>
        <div class="steps"><p>1. Escanea el QR</p><p>2. Ingresa tus datos</p><p>3. Registra tu código</p><p>4. ¡Ya estás participando!</p></div>
        <div class="date">Sorteo {{ $drawLabel }}</div>
    @endif
</div>
@foreach([$y, $y + $settings['height']] as $edge)
<div class="cut-h" style="left:{{ $x - 1 }}mm;top:{{ $edge }}mm"></div><div class="cut-h" style="left:{{ $x + $settings['width'] }}mm;top:{{ $edge }}mm"></div>
@endforeach
@foreach([$x, $x + $settings['width']] as $edge)
<div class="cut-v" style="left:{{ $edge }}mm;top:{{ $y - 1 }}mm"></div><div class="cut-v" style="left:{{ $edge }}mm;top:{{ $y + $settings['height'] }}mm"></div>
@endforeach
@endforeach
</div>
@endforeach
</body></html>
