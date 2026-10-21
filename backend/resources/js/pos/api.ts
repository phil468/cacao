export class ApiError extends Error {
    constructor(message: string, public status: number) { super(message); }
}

export async function api<T>(path: string, options: RequestInit = {}): Promise<T> {
    const headers = new Headers(options.headers);
    headers.set('Accept', 'application/json');
    headers.set('X-CSRF-TOKEN', document.querySelector<HTMLMetaElement>('meta[name=csrf-token]')?.content ?? '');
    if (typeof options.body === 'string') headers.set('Content-Type', 'application/json');
    const response = await fetch('/pos/api/' + path, { ...options, headers, credentials: 'same-origin', cache: 'no-store', signal: AbortSignal.timeout(30000) });
    const data = await response.json().catch(() => ({}));
    if (data.csrf_token) document.querySelector<HTMLMetaElement>('meta[name=csrf-token]')!.content = data.csrf_token;
    if (!response.ok) {
        const validation = Object.values(data.errors ?? {}).flat().join(' ');
        throw new ApiError(validation || (response.status === 419 ? 'La sesión venció. Recarga la página antes de continuar.' : response.status === 403 ? 'No tienes autorización para realizar esta operación.' : response.status === 404 ? 'El registro o punto de venta ya no está disponible.' : data.message || 'No se pudo completar la operación.'), response.status);
    }
    return data as T;
}
