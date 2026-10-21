<x-filament-panels::page>
    <section data-promo-scanner wire:ignore class="rounded-xl border border-gray-300 p-4 dark:border-gray-700">
        <h2 class="text-lg font-semibold">Buscar código con cámara</h2>
        <p>Escanea el QR del cupón. También puedes escribir el código en el buscador de la tabla.</p>
        <button type="button" data-start class="mt-2 rounded-lg bg-primary-600 px-4 py-2 text-white">Abrir cámara</button>
        <button type="button" data-stop hidden class="mt-2 rounded-lg border px-4 py-2">Cerrar cámara</button>
        <video data-video hidden playsinline muted style="width:100%;max-width:480px;margin-top:12px"></video>
        <p data-status role="status" aria-live="polite"></p>
    </section>
    @error('scanner')<p role="alert">{{ $message }}</p>@enderror
    {{ $this->table }}
    @vite('resources/js/promo-scanner.js')
</x-filament-panels::page>
