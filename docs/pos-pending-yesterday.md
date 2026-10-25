# Pending Yesterday Cash Shift

Administrators with `orders.manage` may select **Registrar jornada pendiente de ayer** under **Turno y caja**. This is different from historical sales without cash or inventory effects.

## Eligibility

- Only yesterday in the application's Peru timezone; the client cannot choose arbitrary dates.
- A mandatory opening reason and normal opening cash amount are recorded.
- No confirmed cash shift closure for yesterday, or inventory closure for yesterday or later.
- No shift opened today at that location, including one already closed.
- No stock movements today before opening, except central-to-point inbound transfers explicitly confirmed as physically received yesterday. Subsequent sales from this pending shift are allowed; unrelated stock changes block further pending sales.
- No existing historical sales for yesterday at that location, to avoid duplicating them through regularization.
- Existing active-point and active-cashier uniqueness rules still apply.

## Effects and Audit

Sales use normal server-validated prices, payments and stock checks. They deduct current available stock and belong to yesterday's cash shift and commercial sales report. `opened_at`, `created_at`, payment records and inventory movement timestamps retain the real registration time. `cash_shifts.business_date` records the commercial date; legacy shifts without it fall back to `opened_at`.

Close this shift before opening today's shift. Cash counts and discrepancies are saved in the immutable shift snapshot. This feature does not reconstruct a historical inventory count, reopen a closed day, convert existing historical sales or allow negative stock. The regular inventory-count workflow remains a physical count of current balances.

## Deployment

Run the additive migration before serving the new backend. No existing balances or shifts are rewritten. Do not roll back the audit columns after a pending-day shift has been recorded.

## Late Transfer Receipts

In **Turno y caja**, select the pending-yesterday option to review today's inbound transfers from central. An administrator with both order and inventory permissions may confirm the entire transfer as physically received yesterday, with a required reason and a separate immutable audit record. The review lists all products and quantities; a partly received transfer is not covered by this workflow.

Confirmation never repeats a transfer or updates its original timestamps or balances. The unique receipt record stores transfer ID, physical receipt date, confirming administrator, reason and actual confirmation timestamp. Matching retries return the existing record; changed data cannot overwrite it. The normal closed-day, today's-shift, historical-sale and unrelated-inventory-movement restrictions remain enforced. Every blocking inbound transfer must be confirmed separately; unconfirmed or non-central entries still prevent pending sales.
