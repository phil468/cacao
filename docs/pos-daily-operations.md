# POS Daily Operations

## Scope and Availability

This extension is installed **locally only**, not on Hostinger test or production.
It reuses Laravel's existing orders, payments, location inventory, promotions
and transfer services. No new subscription, daemon or payment gateway is added.
The POS has Spanish, mobile-responsive controls with review and confirmation.

Migration `2026_10_20_000001_create_pos_operations.php` adds cash shifts/entries,
inventory operations, quarantine balances, inventory closings, point replenishment
settings/requests, commercial sale dates and historical-order flags. Existing
orders/payments/stock are not backfilled, reset or silently assigned to turns.

## Cash Received and Change

En `/pos`, al elegir Efectivo indica el **Efectivo recibido** o pulsa **Pago exacto**.
El vuelto se calcula automáticamente sobre el importe asignado al efectivo,
incluso en pagos mixtos. Ejemplo: venta S/ 66, efectivo S/ 20 y Yape S/ 46;
si recibes S/ 50 en billetes, entrega S/ 30 de vuelto. Caja registra S/ 20,
no S/ 50. El servidor rechaza efectivo insuficiente y calcula el vuelto otra vez.
El comprobante conserva recibido y vuelto. Los pagos antiguos permanecen sin
estos datos (no se inventan importes históricos). La migración adicional es
`2026_10_20_000002_add_cash_change_to_order_payments.php`.

## Local Installation

Activate local tools, back up MySQL, stop local writers and run from `backend`:

```powershell
php artisan migrate
npm run typecheck:pos
npm run build
```

The local migration was applied after a private JSON snapshot under
`backend/storage/app/local-backups/`, with preservation checks for existing
orders/items/payments/returns, promotions/participants/coupons, variant and point
balances and transfer/movement history. No operational records were fabricated.
MySQL indexes have explicit short names. The migration can continue the observed
partial MySQL DDL state without dropping tables; it repairs the quarantine
unique index/foreign keys. It refuses rollback when operational records or new
order-date/shift metadata exists. Do not roll back to code that would restock a
historical order. Do not run the full demo seeder on business inventory.

Deployment requires separate approval. Back up the isolated target DB and put
all target writers into maintenance before applying. Do not upload local `.env`,
SQLite fixtures or storage. No DNS or production change is included here.

## Cashier Shifts

1. Sign in to `/pos`, select the authorized point and open **Turno y caja**.
2. Enter the actual **Fondo inicial en efectivo**, review and confirm. At a
   handover, enter the cash actually received, not an automatic sum of old floats.
3. Use **Registrar venta**. The server requires an open shift owned by the selling
   user at that point, opened on the current Peru calendar day. It attaches the
   shift automatically; changing a request cannot bypass this requirement.
4. Before handing over, count the physical cash including the opening float.
   For digital methods, verify net receipts/refunds, not the bank account balance.
5. Enter each verification amount and a reason/observation, review differences
   and confirm the closing. No bank transfers or actual cash movements are
   initiated by recording these figures.

Only one active shift per point and one per cashier is allowed. Several
cashiers/turns per day are supported sequentially. A previous-day shift must be
closed before today's sales. An authorized manager can close another cashier's
shift; the snapshot preserves both cashier and closing actor. Closed shifts are
not reopened or edited. Repeating an identical close returns its original
snapshot; different data is rejected. Do not sum successive cash floats as if
they were new sales revenue.

The `pos_cash` method represents physical cash. Admin code/provider fields are
immutable after creation to avoid reclassifying past receipts or opening floats;
create a new method instead. Names/activation can still be maintained.

### Entries, Withdrawals and Refunds

Use the shift's **Entrada, retiro o reembolso de dinero** section. A UUID, actor,
amount and reason are retained. Cash withdrawals/refunds cannot exceed expected
cash on hand. Entries/withdrawals are cash-only. Digital payments are not cash
in the drawer and have their own expected totals.

A manager can record an already executed refund for a POS order from that
point with a registered product return. It cannot exceed what was collected by
that method less previous refunds. Historical regularizations are excluded.
Refunds are manual decisions, not automatic valuation of a partial return, and
do not call external payment providers. They affect the current open shift,
never rewrite the original closed shift. Digital net verification may be negative
when an older receipt is refunded in a later shift.

## Historical Sales

Administrators with `orders.manage` use **Registrar venta anterior**, not the
ordinary sale button. Select the real commercial date (strictly before today),
explain the late entry and enter prices actually charged per presentation.
Current prices are only an initial reference. Existing archived presentations
can be selected; active-point authorization still applies.

Historical sales preserve today's `created_at`, actor, submitted prices and
actual commercial `sold_on`. They may use the same exclusive discount and split
payments/proof policy but **never** subtract current inventory, enter the current
cash shift, set a fictitious current payment-confirmation timestamp or enable
new promotional coupons. Product returns against them likewise never restore
stock. Any separately justified present-day stock adjustment remains an explicit
inventory operation; it is not implied by late registration.

Reports show historical incorporations on their commercial date, labeled with
their later registration time. Previously saved closing snapshots stay unchanged.
Pre-extension orders retain their registration date as a reporting fallback and
are identified as not assigned to shifts; no historical dates are invented.

## Gifts, Samples and Defective Products

Use **Salidas / fallados**. Search products, enter whole-unit quantities beside
each presentation, provide a reason, review the selected rows and confirm once.

| Operation | Available stock | Quarantine | Sales/cash/coupons |
| --- | --- | --- | --- |
| Obsequio | Decreases | Unchanged | None |
| Degustación | Decreases | Unchanged | None |
| Producto fallado | Decreases | Increases | None |
| Merma definitiva | Unchanged | Decreases | None |
| Devolver al proveedor | Unchanged | Decreases | None |
| Liberar a vendible | Increases | Decreases | None |

Samples consume complete sale units/packs, not grams or individual portions.
Releasing stock does not activate an archived/inactive product for sale.
Disposal, supplier returns and release require `inventory.manage`; assigned
sellers may register gifts, samples and defects at their points. All rows commit
or roll back together and create actor/reason movement history. Quarantine is
never included in availability to the POS, web or transfer services.

In order administration, **Registrar devolución** has a defective-product toggle.
Those returned units go directly to quarantine, not briefly onto the shelf.
Historical returns remain stock-neutral regardless of the toggle. Central
warehouse quarantine from web returns is resolved through **Gestionar cuarentena
central** under **Almacenes y puntos de venta**. Monetary refunds are separate.

## Daily Inventory Closing

After the final cashier shift closes, use **Inventario diario**. Count available
units and quarantine separately for every listed presentation. Search does not
discard other counts. The explicit helper for copying expected balances is only
for balances already physically verified; it is not an automatic count.

Review before confirming. The server checks the complete variant set and fresh
expected balances under locks. Changes during counting require refresh/recount.
Differences require an inventory manager and create reasoned adjustment movements;
sellers cannot silently reconcile discrepancies. The snapshot records expected,
counted, differences, opening balance and movement totals by type, plus the
movement-ID high-water mark. Same-second later transfers are not lost from the
next reporting interval.

There is one immutable inventory close per point/Peru date. After closing, no
new shifts, ordinary sales or POS stock-out operations are allowed that day.
The administrator can still regularize sales of earlier days without stock/cash
effects. Authorized later returns/warehouse transfers retain their real movement
time and belong to the next inventory interval; they do not rewrite the snapshot.

## Replenishment

**Reposición** displays available units, central availability, minimum and target
per presentation/point. Until a point override is saved, the variant threshold
is the default minimum and three times that minimum is the default target.
At or below the minimum, the suggested quantity is `max(0, target - available)`.
Central shortage is flagged separately. Quarantine units are not usable stock.

An inventory manager may edit/save point-specific minimum/target settings. A
seller can prepare one multi-product request, adjust whole-unit quantities,
provide a reason and review/confirm. A request does not reserve or change stock.
The manager reviews **Revisar y transferir desde central** and confirms the existing
atomic transfer flow. If one product is short, none transfers and the request
remains pending. An identical retry cannot duplicate a transfer. Requests and
their fulfillment transfer IDs remain visible.

## Reporting and Safety

Managers use **Reporte diario** to select a commercial date. It shows net sales,
discounts, receipts by method, separately marked historical incorporations,
stored cashier closings/differences, inventory closing, and unit-out history.
Sales totals are not a physical cash balance. Inventory daily snapshots and
cashier snapshots are independently retained instead of being rebuilt from
mutable present-day stock.

Mutations have server-side validation, point/role checks, transactions and
idempotency. The POS freezes uncertain submissions and offers **Reintentar la
misma operación**. Do not refresh/start another request after an uncertain
response until checking the report/history. UI editing is blocked during posting,
retry and state refresh. Neither a screenshot nor closing verification confirms
receipt of funds with a bank.
Point changes, logout and starting another sale are also blocked while an
operation is under review, posting or awaiting an uncertain-result retry.

## Verification

### Replenishment Suggestions

Automatic quantities apply when a presentation is at or below its minimum.
They deduct the point's available balance from the target and cap the result
at central available stock: `min(max(central, 0), max(target - available, 0))`.
An empty central warehouse suggests zero; points above minimum suggest zero.
The user can still enter a different request quantity deliberately. Requests do
not reserve stock; confirmation revalidates the complete transfer atomically.

En **Reposición**, un usuario con permiso de inventario puede editar **Mínimo**
y **Objetivo** por producto y punto de venta. Debe pulsar **Revisar mínimos y
objetivos** y confirmar para guardarlos; editar los campos no basta. El objetivo
no puede ser menor que el mínimo. La cantidad sugerida usa los valores guardados
y se actualiza al refrescar los saldos después de confirmar.

Whole-unit operation rows use a compact two-column layout, with product details
on the left and quantities on the right. Search fields include an inline SVG
magnifier without adding an icon package or an external asset request.

Full regression suite: **207 tests / 1443 assertions passed**. Focused operation
coverage passed **22 tests / 100 assertions**, including stock-neutral historical
sales/returns, current-date shifts, stable closings after late entries, split
receipts/cash movements/refunds, whole-unit gifts/samples, quarantine, physical
count concurrency/authorization, same-second post-close transfers, migration
continuation/rollback safeguards, central web-return quarantine administration
and idempotent central replenishment. Pint, targeted Larastan, POS TypeScript
checking and Vite build passed.

Two disposable SQLite browser fixtures were used, never business MySQL. The
final mobile run exercised historical actual prices without an open shift or
stock change, explicit opening, a live shift sale and physical coupon handover,
gift/defect batches, lost-response retry without duplicate stock, minimum/target
settings, request-without-stock-change, atomic fulfillment, cash closing, daily
inventory sealing and saved reports. Mobile/desktop overflow and JavaScript
checks passed, including disabled point/sale navigation during a pending retry.
The final fixture retained exactly two sales (one historical), two stock-out
records, one fulfilled request, one closed cashier shift and one inventory close.

Local MySQL was compared again against the **first pre-migration snapshot** after
QA: existing domain fields and all stock remain unchanged. New operational
tables contain no fabricated business records. Temporary QA servers were stopped;
the ordinary local `/pos` remains available. No Hostinger deployment occurred.
