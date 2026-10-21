export type InventoryRow = {variant_id: number; name: string; sku: string; available: number; quarantine: number; minimum: number; target: number; central_available: number; suggested: number; active: boolean};
export type ShiftMethod = {payment_method_id: number; name: string; code: string; opening: number; sales: number; incoming: number; outgoing: number; expected: number; counted?: number; difference?: number};
export type Shift = {id: number; cashier_id: number; cashier: string; opened_at: string; closed_at: string | null; opening_cash: number; methods: ShiftMethod[]; sales_count: number; sales_total: number; discount_total: number; reason?: string};
export type OperationsState = {today: string; inventory: InventoryRow[]; shift: Shift | null; other_shift_open: boolean; day_closed: boolean; requests: {id: number; status: string; reason: string; items: {variant_id: number; quantity: number}[]; inventory_transfer_id: number | null}[]};
export const money = (cents: number) => new Intl.NumberFormat('es-PE', {style: 'currency', currency: 'PEN'}).format(cents / 100);
export function units(value: unknown): number {
    const match = /^(\d+)(?:[.,](\d{0,2}))?$/.exec(String(value).trim());
    if (!match) return NaN;
    const result = Number(match[1]) * 100 + Number((match[2] ?? '').padEnd(2, '0'));
    return Number.isSafeInteger(result) ? result : NaN;
}
