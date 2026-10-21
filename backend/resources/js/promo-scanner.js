import jsQR from 'jsqr';

function initialize() {
    document.querySelectorAll('[data-promo-scanner]').forEach((root) => {
        if (root.dataset.initialized) return;
        root.dataset.initialized = 'true';
        const video = root.querySelector('[data-video]');
        const start = root.querySelector('[data-start]');
        const stopButton = root.querySelector('[data-stop]');
        const status = root.querySelector('[data-status]');
        const canvas = document.createElement('canvas');
        const context = canvas.getContext('2d', { willReadFrequently: true });
        let stream;
        let timer;
        let generation = 0;
        const stop = () => {
            generation++;
            clearTimeout(timer);
            stream?.getTracks().forEach((track) => track.stop());
            stream = null;
            video.srcObject = null;
            video.hidden = true;
            start.disabled = false;
            stopButton.hidden = true;
        };
        const scan = async () => {
            if (!stream || !root.isConnected) { stop(); return; }
            if (video.readyState >= 2 && video.videoWidth) {
                canvas.width = Math.min(video.videoWidth, 800);
                canvas.height = Math.round(video.videoHeight * canvas.width / video.videoWidth);
                context.drawImage(video, 0, 0, canvas.width, canvas.height);
                const frame = context.getImageData(0, 0, canvas.width, canvas.height);
                const result = jsQR(frame.data, frame.width, frame.height, { inversionAttempts: 'dontInvert' });
                if (result) {
                    stop();
                    status.textContent = 'QR detectado. Buscando código…';
                    try {
                        const component = root.closest('[wire\\:id]');
                        await window.Livewire.find(component.getAttribute('wire:id')).call('searchScannedCode', result.data);
                        status.textContent = 'Búsqueda procesada. Revisa la tabla o el mensaje de validación.';
                    } catch { status.textContent = 'No se pudo buscar el código. Inténtalo nuevamente.'; }
                    return;
                }
            }
            timer = setTimeout(scan, 200);
        };
        start.addEventListener('click', async () => {
            if (!window.isSecureContext || !navigator.mediaDevices?.getUserMedia) {
                status.textContent = 'La cámara requiere HTTPS o localhost y un navegador compatible.';
                return;
            }
            start.disabled = true;
            stopButton.hidden = false;
            const request = ++generation;
            status.textContent = 'Solicitando acceso a la cámara…';
            try {
                const acquired = await navigator.mediaDevices.getUserMedia({ video: { facingMode: { ideal: 'environment' } }, audio: false });
                if (request !== generation || !root.isConnected) { acquired.getTracks().forEach((track) => track.stop()); return; }
                stream = acquired;
                video.srcObject = stream;
                video.hidden = false;
                await video.play();
                status.textContent = 'Apunta al QR del cupón.';
                scan();
            } catch {
                stop();
                status.textContent = 'No se pudo abrir la cámara. Revisa los permisos o usa el buscador manual.';
            }
        });
        stopButton.addEventListener('click', () => { stop(); status.textContent = 'Cámara cerrada.'; });
        document.addEventListener('livewire:navigating', stop);
        window.addEventListener('pagehide', stop);
        document.addEventListener('visibilitychange', () => { if (document.hidden) stop(); });
    });
}
initialize();
document.addEventListener('livewire:navigated', initialize);
