# Pending Yesterday Cash Shift

Administrators with `orders.manage` may select **Registrar jornada pendiente de ayer** under **Turno y caja**. This is different from historical sales without cash or inventory effects.

## Eligibility

- Only yesterday in the application's Peru timezone; the client cannot choose arbitrary dates.
- A mandatory opening reason and normal opening cash amount are recorded.
- No confirmed cash shift closure for yesterday, or inventory closure for yesterday or later.
- No shift opened today at that location, including one already closed.
- No stock movements today before opening. Subsequent sales from this pending shift are allowed; unrelated stock changes block further pending sales.
- No existing historical sales for yesterday at that location, to avoid duplicating them through regularization.
- Existing active-point and active-cashier uniqueness rules still apply.

## Effects and Audit

Sales use normal server-validated prices, payments and stock checks. They deduct current available stock and belong to yesterday's cash shift and commercial sales report. `opened_at`, `created_at`, payment records and inventory movement timestamps retain the real registration time. `cash_shifts.business_date` records the commercial date; legacy shifts without it fall back to `opened_at`.

Close this shift before opening today's shift. Cash counts and discrepancies are saved in the immutable shift snapshot. This feature does not reconstruct a historical inventory count, reopen a closed day, convert existing historical sales or allow negative stock. The regular inventory-count workflow remains a physical count of current balances.

## Deployment

Run the additive migration before serving the new backend. No existing balances or shifts are rewritten. Do not roll back the audit columns after a pending-day shift has been recorded.
