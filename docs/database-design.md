# Database Design

All monetary columns use integer cents (`*_amount`). Timestamps are UTC in the
database and displayed in `America/Lima`. Business records use bigint primary
keys. Slugs and SKUs are unique.

## Main entities

| Table | Purpose and notable fields |
|---|---|
| users | Customers and administrators; name, email, phone, password, active flag, soft deletes |
| addresses | User delivery addresses; label, recipient, phone, district, province, department, reference, coordinates, default flag |
| categories | Hierarchical catalog taxonomy; parent, name, slug, description, active flag, sort order, soft deletes |
| products | Product content; category, name, slug, descriptions, active/featured flags, SEO fields, soft deletes |
| product_variants | Sellable unit; product, name, SKU, cacao percentage, grams, price, promotional price, stock, low-stock threshold, active flag, soft deletes |
| product_images | Product/optional variant image; path, alt text, primary flag, sort order |
| inventory_movements | Immutable stock ledger; variant, type, quantity delta, balance, reason, order, return, actor |
| carts / cart_items | Active server-side carts and requested variant quantities |
| order_statuses | Configurable status code, Spanish label, terminal flag, order |
| orders | Customer snapshot, address snapshot JSON, status, payment, subtotal, discount, delivery, total, notes, proof path |
| order_items | Immutable variant snapshot: product name, variant name, SKU, description, unit price, quantity, returned quantity, line total |
| order_returns / order_return_items | Audited partial or full customer returns; order, actor, reason, returned lines and quantities |
| order_status_histories | Immutable status audit with actor and note |
| payment_methods | Manual method code, Spanish instructions, proof requirement, active flag |
| delivery_zones / delivery_rates | Geographic zones and amount/minimum/free-delivery rules |
| coupons | Code, type, value, limits, date range, usage count, active flag, soft deletes |
| banners | Image, title, body, CTA, active window, order |
| faqs | Question, answer, active flag, order |
| business_settings | Unique key and JSON value |
| contact_requests | Contact identity, subject, message, status, internal note |
| roles / permissions | Spatie authorization tables |
| personal_access_tokens | Sanctum mobile authentication |

## Integrity rules

- A promotional price cannot be negative and is ignored when not lower than the
  regular price.
- Stock is non-negative. Checkout locks variant rows and aborts the transaction
  if any requested quantity is unavailable.
- Order item snapshots are never synchronized from catalog data.
- Coupon usage and stock changes occur in the same transaction as order creation.
- Opening stock creates an `initial_stock` ledger entry. Partial and full returns
  create `customer_return` entries and cannot cumulatively exceed the purchased
  quantity.
- Returns are accepted only for shipped or delivered orders. Each returned line,
  stock increment, and ledger movement is committed atomically.
- Historical orders reference users and variants with nullable foreign keys while
  retaining snapshots.
- Soft deletes apply to editable master data, not immutable audit/history rows.
