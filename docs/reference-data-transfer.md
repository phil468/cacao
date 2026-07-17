# Reference data transfer

## Purpose

The reference data transfer moves catalog and business configuration from a
trusted environment to production without copying customers or transactional
history.

The package contains:

- categories, products, variants, and product images;
- delivery zones and rates;
- payment methods;
- coupons, with `usage_count` reset to zero;
- order status definitions;
- banners, FAQs, and business settings;
- roles, permissions, and role-permission definitions;
- public files referenced by products, banners, and payment methods.

The package always excludes users, addresses, sessions, tokens, carts, orders,
order items, status history, returns, payment proofs, inventory movements,
contact requests, push devices, campaigns, notification deliveries, queues,
cache data, and user-role assignments.

## Stock policy

Stock balances are excluded by default. This prevents a configuration import
from changing live inventory.

Use `--include-stock` only for the initial production load when the local stock
has been reviewed and represents the real physical inventory. Inventory
movement history is never exported. If stock is included, production receives
the current balance only.

## Create a package locally

From `backend/`:

```bash
php artisan data:export-reference storage/app/data-transfers/production-initial
```

For an explicitly reviewed initial stock load:

```bash
php artisan data:export-reference storage/app/data-transfers/production-initial --include-stock
```

Inspect `manifest.json`, especially row counts, missing assets, and the
`includes_stock` flag. The generated directory is ignored by Git and must not
be committed.

## Inspect in production

Upload the generated directory outside the public web root, for example:

```text
/home/u387243142/domains/cacaodelperu.com/cacao-app/shared/imports/production-initial
```

Run a production database backup first. Then inspect without writing:

```bash
cd /home/u387243142/domains/cacaodelperu.com/cacao-app/current
php artisan data:import-reference ../shared/imports/production-initial
```

The command shows the source environment, stock policy, row counts, and
excluded tables. It does not write unless `--apply` is present.

## Apply in production

After checking the manifest, database backup, and current production state:

```bash
php artisan data:import-reference ../shared/imports/production-initial \
  --apply \
  --backup-confirmed
```

The command asks for confirmation and applies all database changes in a single
transaction. Existing records are updated through stable business keys such as
category/product slugs, variant SKUs, payment codes, and setting keys. It does
not truncate production tables.

After importing:

```bash
php artisan storage:link
php artisan optimize:clear
php artisan optimize
```

Verify the storefront, product images, delivery quote, payment instructions,
coupon preview, and Filament dashboard before accepting production orders.
