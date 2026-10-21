# Mobile Point of Sale

## Architecture and Scope

The new `/pos` application is Vue 3 + TypeScript, compiled by the existing Vite build and served by Laravel. It has its own responsive layout rather than a Filament form. No permanent Node process, external vision API, model subscription, external image upload for recognition, or second order database is introduced. The main domain, API and POS share the existing authoritative Laravel services.

The interface supports administrator/seller login, authorized location selection, categorized visual catalog, exact SKU/barcode/QR lookup, manual quantity entry, customer default `Consumidor final` (required/editable), optional email/phone, manual payments and a camera/file input for Yape evidence. No receipt number is requested; orders keep their generated internal reference. Evidence is not payment verification: the operator must verify receipt of money.

The mobile catalog and checkout are separate steps, with a floating cart button. Desktop displays both panels. Prices are revalidated by the backend, amounts are integer cents, and stock is never committed by the browser. The camera decoder is lazy-loaded only when requested. No customer/cart data or bearer token is persisted in localStorage. There is no offline sales mode.

The newest **local-only** extension requires an explicit cashier shift for
ordinary sales and adds a separate administrator historical-sales process,
whole-unit gifts/samples, defect quarantine, immutable daily inventory counts
and point-specific central replenishment. See [daily POS operations](pos-daily-operations.md)
for permissions, opening/closing, migration precautions and stock-neutral
historical reporting. It is not yet published to Hostinger test or production.

POS notifications now float in the viewport, including while checkout is
scrolled. Errors persist until dismissed; success messages can be dismissed and
expire after six seconds. Native required-field/format failures also generate a
floating message, without removing browser field validation. Alerts do not
steal focus or change scroll position.

## Inventory Migration

### POS Discounts and Split Payments

The local `/pos` checkout supports one mutually exclusive discount mode:
**Monto en soles** or **Porcentaje** (0–100, up to two decimal places).
The backend recalculates the subtotal using current prices, then rounds a
percentage discount half-up to cents using integer basis points (1000 = 10%).
Only users with the existing `orders.manage` permission may discount sales.
The persisted `discount_amount` remains cents, so inventory, returns and coupon
entitlement continue to use the existing order totals. No extra discount is
applied per payment or per line.

Add up to five distinct active manual payment methods to one sale. Each has its
own amount and private proof or explicit permitted omission. One payment tracks
the total automatically; split payments have editable amounts and an
**Asignar saldo restante** helper. The sum must equal the net total exactly:
no underpayment, excess/change or zero installments are accepted. A fully
discounted sale may have one zero payment. Confirm receipt of all money before
saving; a screenshot does not verify a bank transaction.

Migration `2026_10_19_000001_add_pos_split_payments.php` adds nullable discount
mode/basis-point fields to orders and immutable `order_payments` rows for new
POS sales. Existing historical orders are not backfilled. The original order
payment method/proof remains the first payment for compatibility, not a claim
that it covered the whole sale. Consult **Desglose de pagos recibidos en caja**
in the order editor or the POS receipt for all amounts and proofs. New POS rows
also show every method in the sales listing. Web checkout is unchanged.
Private proof download accepts `payment_id` only within its authorized order.

The existing submission UUID freezes the complete discount/payment payload
after an uncertain response; retry the same sale rather than charging again.
All payments, the order, inventory movements and attached coupon handovers
commit or roll back together. Returns preserve original payment history and
restore the original stock location; refunds remain a separate manual operation
and are not automatically sent to payment providers.

Back up the local MySQL before applying this migration; do not run demo seeders.
This feature was published only to test on 2026-10-19, release
`811c8112dc7a215f03d545991eefe81e7653d78a-1792427294-1`.
SQLite fixtures, local `.env` and storage were excluded from the deployment.
The migration was applied to local MySQL after a private JSON snapshot under
`backend/storage/app/local-backups/`; preservation checks passed for existing
order fields, campaigns, coupon ownership, variants, point balances and transfers.
No historical payments were fabricated and no business sale was created in QA.

`2026_10_17_000001_create_location_inventory_and_pos_access.php` introduces:

- `inventory_locations`: a protected central warehouse and inventory locations linked one-to-one to pickup/sales points.
- `location_stocks`: **point-only** variant balances, initially zero.
- `inventory_location_user`: seller assignments.
- `inventory_transfers` and `inventory_transfer_items`: immutable, idempotent transfer records.
- Location/transfer references on movements and location references on orders.
- Optional unique variant barcodes and coupon activation metadata.

**`product_variants.stock` becomes the authoritative central-warehouse balance**, not a global total and not a duplicated cache. Keeping that existing column preserves storefront/mobile availability, adjustments, imports and historical quantities. The migration does not copy those quantities into a second balance table. Total physical inventory is central stock plus point balances. Existing pickup points get locations with zero branch balance. Newly created pickup points require an inventory location in admin.

All historical orders and movements are assigned to central: both earlier web and POS sales consumed the former global balance. Their physical pickup address is not evidence that stock was held there. New web orders consume central; new physical sales consume their selected point; returns/cancellations restore the recorded origin, including archived variants or inactive locations. Transfers lock locations and variants, subtract and add in one transaction, write both ledger entries, and deduplicate on a submission UUID.

Location identity/type cannot be changed after creation, the central warehouse cannot be deactivated, and location deletion is not offered. A schema rollback refuses when branch stock or transfer history exists. Prefer an operational rollback with data intact. Never roll back this migration to an old application while distributed stock remains unreconciled.

## Installation on an Existing Environment

Back up MySQL and record stock totals, orders, participants and code ownership before applying. Put all writers (web, mobile, admin, jobs) into maintenance during deployment: old and new inventory semantics must not run simultaneously against the migrated schema.

```bash
cd backend
composer install
npm ci
npm run typecheck:pos
npm run build
php artisan migrate
php artisan db:seed --class=PosAccessSeeder
php artisan db:seed --class=PointOfSaleSeeder
php artisan optimize:clear
```

Use `--force` for the reviewed commands on staging/production. Do not run the full `DatabaseSeeder` on an existing business database. It resets master stock, and is now explicitly refused after location transfers exist. Feature seeders above are idempotent and do not move stock. No production or Hostinger deployment is authorized merely by preparing these files.

In admin:

1. Open **Almacenes y puntos de venta**, check the central balance with **Ver saldos**, and ensure each active pickup point has an inventory location.
2. Use **Transferir stock** on central to open the bulk transfer screen. Select destination/reason and enter quantities beside each product. Review the summary, then confirm the whole batch. Reverse/replenishment transfers are also supported; inspect **Movimientos de inventario** for location and transfer audit.
3. Under **Usuarios administrativos**, create a user with role `seller` and assign its authorized points, or assign sellers when editing an inventory location. Sellers cannot access Filament just because they can use POS. Creation/edit no longer silently grants them administrator.
4. Add exact product barcodes under **Variantes**. A printed SKU is also supported. Avoid a barcode that equals another variant's SKU: ambiguous scans are rejected, not guessed.
5. Open `/pos`, sign in, choose an assigned point, register a sale and check the resulting order/movement in admin. Points with zero stock cannot sell from central implicitly.

The previous `/admin/point-of-sales/create` form remains compatible as a legacy administrative entry, with an **Abrir caja móvil** shortcut in the listing. The new POS is the preferred cashier UI. Sale/transfer retries use the same UUID to avoid duplicate stock changes. If a save response is lost, the client freezes its submitted payload and offers a retry of the same sale, not another charge. Keep the page open until resolved: a reload loses that in-memory retry state; review admin orders before charging again.

## Bulk Stock Transfers

### Central Stock Adjustments from the Variant List

In `/admin/product-variants`, **Stock central** is the central warehouse balance,
not the sum of all points. **Ajustar stock** opens an in-place dialog. To correct
several balances, select rows and use **Ajustar stock central de seleccionadas**.
Enter final balances (not increments), review current/new values and confirm
with a required reason. At most 100 variants can be adjusted together.
The backend requires an active administrator with `inventory.manage`, checks
the selected record scope, validates integer balances and records manual
inventory movements with actor and reason. All adjustments use a transaction
and row locks. If any balance changed after opening the dialog, no adjustment
is saved: cancel and reopen to inspect fresh balances. Unchanged rows do not
create movements. Point balances are never changed by this action; continue
using transfers to move existing stock. This addition was published only to
test on 2026-10-19, release
`811c8112dc7a215f03d545991eefe81e7653d78a-1792422614-1`;
it requires no database migration. Production is unchanged.
Focused verification: `CentralStockAdjustmentTest` passed 7 tests / 23 assertions,
including the actual Filament single/bulk action forms, stale-balance rollback,
validation, unchanged rows and authorization. Pint and targeted Larastan passed.

From **Almacenes y puntos de venta → Transferir stock**, the route
`/admin/inventory-locations/{record}/transfer` replaces the one-product modal.
The origin is fixed by the selected row; its active destinations exclude itself.
The screen lists non-archived presentations with SKU, category, available origin
stock and a zero-initialized quantity counter. Inactive-for-sale presentations
are marked; moving inventory does not activate their sale. Search, categories
and **Solo seleccionados** preserve quantities on hidden rows. Numeric entry and
plus/minus controls operate locally, and an on-screen total tracks units and
presentations. Mobile rows keep product and counter together without horizontal
scroll; the summary stacks both locations' balances.

**Revisar transferencia** is read-only: it shows the selected rows, quantities,
origin/destination, reason, total units and estimated before/after balances.
Returning to edit preserves the selection and refreshes displayed stock. Only
**Confirmar transferencia** commits. The backend rechecks permissions, active
locations, distinct origin/destination and actual stock under locks. If any row
fails, the entire transaction rolls back. Existing limits remain: at most 100
distinct presentations per operation, 1–100000 units per selected presentation,
and a required 5–500 character reason.

The server-reviewed payload, source and UUID are locked against client changes.
Confirmation does not read editable fields left in browser state. Identical
retries reuse the same transfer; a changed payload under an already processed
UUID is rejected rather than silently reported as another operation. Going back
to edit does not replace the UUID. If a response is lost, retry confirmation on
the same screen; do not refresh/open another draft until movements have been
checked. The success screen explicitly offers **Nueva transferencia** for a
deliberately separate operation. No database migration is needed for this UI.

This bulk-transfer change was published to the isolated test environment on
2026-10-18, release `811c8112dc7a215f03d545991eefe81e7653d78a-1792336239-1`.
Authenticated staging checks covered quantities, review, back/edit persistence
and mobile layout without confirming a transfer. Verification transfers use a
separate disposable SQLite fixture, not business MySQL or either remote
environment. Real stock is not moved simply by opening or reviewing the form.

## Proofs and Session Security

### Explicit Missing-Image Declaration

For manual Yape and bank transfers (`yape`, `transfer`, `bank_transfer`), the
cashier must either attach evidence or explicitly select **No se tomó imagen**.
Selecting that option clears any selected file; changing the payment method or
starting a new sale clears the declaration. It cannot be submitted together
with an attachment, and it is unavailable for cash, Plin or other methods. A
false/absent flag does not waive evidence. The confirmation that payment was
received and products delivered remains mandatory in every case.

Migration `2026_10_17_000002_add_pos_payment_proof_missing_to_orders.php` adds
`orders.payment_proof_missing`, default false for existing records. The service
stores an explicit declaration, the order's cashier/payment confirmation time,
and a status-history note with the acting cashier. The POS receipt and the
administrator order form display the declaration; it does not pretend an image
was uploaded or independently verify the transfer. Existing private evidence
validation remains unchanged. Web/mobile online checkout does not accept this
POS exception and still requires proof when configured.

The declaration is part of the immutable payload retained during uncertain
network outcomes and same-UUID retry, not an opportunity to charge or decrement
stock twice. This change was installed only in local MySQL after a private data
snapshot; existing order fields, campaigns, coupon rows and stock were checked
unchanged. The owner subsequently authorized publication to the isolated test
environment on 2026-10-17 (release
`811c8112dc7a215f03d545991eefe81e7653d78a-1792256116-1`), after a private SQL
backup. The migration is now installed in test; production remains unchanged.

New POS evidence is stored under the private `local` disk in a user-scoped random path. The API validates size/MIME, path format and ownership, and download requires the creating cashier's current point authorization or order-management permission. Private evidence is available to authorized administrators; it is not copied into `/storage`. Existing public legacy order proofs remain readable under their original disk; this change does not retroactively relocate them.

The POS uses a host-only `cacao_pos_session` cookie, HTTP-only session handling and CSRF on the existing web middleware stack, not a cross-subdomain localStorage token. The session store's actual cookie name is updated even if a provider resolved it before middleware; both initial session lookup and login can refresh the frontend CSRF token. Login is rate limited. Inactive accounts and unassigned points are rejected by the backend on every operation. The cookie must be secure on HTTPS. Logout rotates the session/token. Camera access is enabled only for POS and the existing admin code scanner, and is stopped on detection, closing, visibility loss or navigation.

Unlinked uploaded proofs can remain if a sale is abandoned. A reviewed retention/cleanup policy for private payment evidence, application logs and backups is still required; do not apply campaign participant-retention rules to financial evidence indiscriminately.

## Printed Coupons

Coupon stock (`status=available`) and permission to participate (`activation_mode`) are separate:

- `reserve`: newly generated/printable, but not yet eligible to register.
- `sale`: enabled and handed over against a qualifying shipped/delivered sale.
- `courtesy`: enabled without a sale by an administrator, with a required reason and audit.
- `legacy`: historical codes; a new registration requires an existing order and recorded physical delivery, or a new explicit sale/courtesy activation. The label alone never authorizes registration.

Existing registered ownership and entries are unchanged. Unissued available legacy codes remain in stock but can no longer be registered merely because they predate activation metadata. Register their physical handover or explicitly enable a courtesy first. An administrator can explicitly select up to 100 unassigned codes and **Poner en reserva** if those old printed codes should not yet circulate. Only available codes without a participant/order can be reserved. **Habilitar cortesías sin venta** likewise handles up to 100 selected codes and leaves an audit. Registered/disabled coupons cannot be reused through these actions.

After saving a sale, scan each printed coupon on the receipt screen to enable and record physical handover. The backend rechecks campaign dates/activation, batch status, order eligibility, returned items and the eligible product amount excluding shipping. Handovers are idempotent; another sale cannot steal a coupon. No codes are generated digitally by payment. The customer subsequently enters their own identity and consents at `/promo`; optional checkout email is not used to create an entry or accept terms. Recover and invalidate physical coupons on returns as documented in the promotion guide.

## Hostinger and ventas.cacaodelperu.com

Before deployment, create the subdomain and SSL in hPanel and confirm its actual document root. Serve the **same deployed Laravel application/public directory**, not an independently configured production DB copy. Set `POS_DOMAIN=ventas.cacaodelperu.com`: requests to that host's root redirect to `/pos`; all POS requests use relative same-origin API paths, so cross-origin cookie/CORS workarounds are unnecessary. Keep the main `APP_URL` unchanged for the storefront. Host-only POS sessions avoid sharing the storefront/admin session cookie across domains.

The browser build is already included in the backend artifact. Hostinger's public bridge must serve existing `/build` assets and route other paths to `current/index.php`; relative symlinks are required in the known hosting layout. Confirm the exact new path before installing a bridge. Do not point the existing **test** environment's database at production or reuse its APP_KEY to achieve integration. For initial remote validation, use the isolated test environment and synthetic identities before authorizing a release against the live inventory.

The owner authorized deployment to the isolated test environment on 2026-10-17;
the POS is available at `https://test.cacaodelperu.com/pos`. Its database was
backed up and migrated during test-only maintenance. No local SQLite, local
business data, payment evidence or environment files were uploaded. Production
and DNS remain unchanged; `ventas.cacaodelperu.com` has not been configured.

## On-Device Recognition Assessment (Future, Not Implemented)

An optional later experiment can train a small classifier on product-only photographs, then run inference in the browser using [TensorFlow.js transfer learning](https://www.tensorflow.org/js/tutorials/transfer/image_classification) or [ONNX Runtime Web](https://onnxruntime.ai/docs/tutorials/web/). Neither runtime nor a trained model is installed in this delivery. Barcode/QR reading is deterministic decoding, not visual AI recognition.

Collect labeled examples per SKU/presentation across angles, packaging revisions, backgrounds, lighting and actual phone cameras; exclude faces, customer information and Yape evidence. Separate capture sessions/devices between training and evaluation to avoid measuring duplicate-photo memorization. Include unknown/non-product examples. Measure confusion between near-identical wrappers, rejection of unknowns, model download size, latency and memory on the lowest supported phone. Require cashier confirmation and retain barcode/manual fallback; do not change stock, price or presentation from a low-confidence prediction. Choose thresholds only from evaluation results, not an invented accuracy guarantee.

Training may use a local workstation or a small browser experiment; heavy model training is not part of the shared PHP hosting workflow. A self-hosted model can avoid per-request external inference charges, but preparation, training, device resource use and maintenance are still real costs. Offline recognition would not make offline sales safe: stock and final sale confirmation must remain authoritative online.

## Verification

Latest full local suite: Pest **207 tests / 1443 assertions passed**. The new
daily-operations extension also passed **22 focused tests / 100 assertions**
and the mobile browser workflow described in [daily POS operations](pos-daily-operations.md).
Earlier additional
focused settlement coverage passed **13 tests / 48 assertions**, including
read-only administrative display and cross-order proof-download isolation. Pint
passed, targeted Larastan analysis of the changed backend classes reported no
errors, and POS TypeScript checking and Vite production build passed.
Settlement browser QA used only new disposable SQLite fixtures, not business
MySQL: mobile percentage/amount calculations, per-payment amounts and omission,
remaining-balance helper, rejection/correction of invalid sums, real button
submission, a lost response after server commit, locked retry, coupon handover,
receipt/reset and desktop/mobile overflow checks passed. No live payment service
was called. After owner authorization, staging checks verified the same checkout
controls and outgoing split-payment payload by intercepting the sale request in
the browser: no remote sale, proof upload, coupon or stock mutation was performed.
Historical business-field fingerprints match before/after the test migration;
the new payment table is empty and historical discount metadata remains null.
Production was not deployed or modified.

Bulk-transfer verification on 2026-10-18 included 16 new regression cases for
read-only review, multi-row atomic commit/rollback, filtered selections, invalid
quantities, active/distinct locations, locked payloads, revoked access,
idempotent retry/mismatch rejection and reverse transfers. Desktop and 390px
browser checks confirmed real Alpine counters, search persistence, summary
balances, returning to edit, one committed transfer and responsive selection/
review without horizontal scrolling. Mutations used disposable SQLite only;
business MySQL and both remote environments were not altered.

The missing-image/browser check used a separate disposable SQLite fixture at
390 × 844: floating validation while scrolled, native email validation,
dismissal, Yape/transfer declarations, clearing state on method/new-sale changes,
same-payload retry after a committed sale's response was lost, actual private
file upload and no horizontal overflow all passed. It did not mutate the local
business database or either remote database.

Local verification on 2026-10-17 included migration against the existing
`cacao_del_peru_local` MySQL database after a private JSON data snapshot under
`backend/storage/app/local-backups/`. Central stock and order/coupon counts
were preserved; no stock was automatically transferred to points and campaign
legal content was not overwritten. `/pos` returned HTTP 200 on the local server.
Keep backups private: they contain application data and are excluded from Git.

An isolated synthetic browser fixture at 390 × 844 verified seller login,
catalog/SKU entry, manual quantities, required private Yape evidence, sale
confirmation, simulated camera coupon scanning and recovery from a lost sale
response without a duplicate order. The browser fixture used a separate ignored
SQLite file, not the local business MySQL or either remote database. Actual
camera hardware over HTTPS remains a separate acceptance check.

Run Pest (including `LocationPosTest`), Pint, Larastan, POS TypeScript checking and Vite production build. Feature tests cover central migration/history, conservation and idempotent transfers, branch stock, returns, authorization, login, proof ownership/privacy, sale retry and coupon reserve/sale/courtesy handling. Browser checks must use real CSRF/session middleware, mobile dimensions, a sale with Yape evidence, coupon scanning and lost-response recovery. Camera simulation is not a substitute for a real phone HTTPS check. Actual concurrent MySQL transactions and device hardware require staging validation.
