# Isolated Test Deployment

Target: `https://test.cacaodelperu.com`. The `Deploy test` workflow is manual and uses the GitHub environment **test**, never **production**. Do not push unreviewed changes to `main`: the existing production workflow remains automatic there.

## Required Hostinger Information

Owner-confirmed hPanel settings: SSH host `147.93.39.74`, port `65002`, user `u387243142`, test document root `/home/u387243142/domains/cacaodelperu.com/public_html/test`. The chosen isolated application root is `/home/u387243142/domains/cacaodelperu.com/cacao-test-app`. The workflow and activation script require these exact paths; they reject the parent production document root. Confirm the resolved paths over trusted SSH before deployment.

Create a separate application directory ending in `cacao-test-app`, outside every public document root. It holds `incoming`, `scripts`, `releases`, `shared` and `backups`. Configure only the existing **test database**, with a dedicated user restricted to it. Do not copy production customer records, storage or `.env`.

The test document root uses `backend/scripts/test-public.htaccess`: serve existing assets through `current/` and route all other paths directly to `current/index.php`. A generic rewrite to `current/$1` is insufficient because the existing application has no public `.htaccess` of its own. The public symlink must be relative (`../../cacao-test-app/current/public`) for Hostinger's web/SSH filesystem mapping. Do not modify the production document root. Restrict test access with hPanel directory protection if possible; `noindex` is not access control.

## Test Environment File

Create `cacao-test-app/shared/.env` securely on Hostinger; never commit it. Use a new APP_KEY and these settings, plus the real test database credentials:

```dotenv
APP_NAME="Cacao del Perú - Pruebas"
APP_ENV=staging
APP_DEBUG=false
APP_URL=https://test.cacaodelperu.com
APP_TIMEZONE=America/Lima
APP_KEY=base64:REPLACE_WITH_NEW_KEY
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=REPLACE_TEST_DATABASE
TEST_DATABASE_NAME=REPLACE_TEST_DATABASE
DB_USERNAME=REPLACE_TEST_ONLY_USER
DB_PASSWORD="REPLACE_SECURELY"
SESSION_DRIVER=database
SESSION_DOMAIN=test.cacaodelperu.com
SESSION_COOKIE=cacao_test_session
SESSION_SECURE_COOKIE=true
CACHE_STORE=database
QUEUE_CONNECTION=database
FILESYSTEM_DISK=public
MAIL_MAILER=log
TELEGRAM_ENABLED=false
IZIPAY_ENABLED=false
```

Leave Google OAuth, WhatsApp Cloud, FCM, analytics and real payment credentials unset. Configure test-only manual payment methods after installation. Never configure a worker with production credentials. Log mail can contain personal information: use synthetic participants and restrict logs/backups.

## GitHub Environment Secrets

In repository Settings → Environments → **test**, add:

- `TEST_HOSTINGER_HOST`, `TEST_HOSTINGER_PORT`, `TEST_HOSTINGER_USER`.
- `TEST_HOSTINGER_SSH_KEY`: dedicated deployment private key; authorize its public key on Hostinger.
- `TEST_HOSTINGER_KNOWN_HOSTS`: independently verified host key line.
- `TEST_HOSTINGER_DEPLOY_PATH`: absolute isolated `cacao-test-app` path.
- `TEST_HOSTINGER_PUBLIC_PATH`: exact test document root, not production.

Upload credentials only through Hostinger/GitHub secure settings, not this chat. Run **Deploy test** against the reviewed feature/development branch after the workflow is available in GitHub. GitHub manual-dispatch discoverability can require the workflow on the default branch; do not merge simply to expose this button without reviewing the automatic production deployment. No automatic develop-branch trigger is enabled until the repository's actual Gitflow branch names are confirmed.

The workflow runs backend gates, builds assets, excludes all SQLite files, `.env*` and local storage, backs up only the configured test DB, migrates, seeds feature permissions/cash payment idempotently and switches the isolated link. Inventory migrations require test-only maintenance before migration. Failed activation leaves test in maintenance for explicit recovery: switching back to old global-stock code after location inventory migration is unsafe. Database rollback is manual. Backups and releases are deliberately not deleted automatically; monitor disk usage and retain at least one known-good release/backup.

## First Run and Verification

Initialize only required empty-database master data deliberately; avoid demo credentials or production data. Create an administrator with `php artisan admin:create YOUR_TEST_EMAIL` (interactive password). If the database is entirely empty, initialize order statuses/catalog/pickup locations via the admin or reviewed seeders before testing POS. `PromotionSeeder` and `PointOfSaleSeeder` do not create order statuses or an administrator.

Use `php artisan promotions:prepare-legal --apply` once to install the agreed legal text; this deactivates the campaign until human review in admin. Set the campaign dates from the test DB and review before activation.

Verify `/up`, `/admin`, `/promo`, legal dates, permissions, full physical sale and stock rollback, returns, coupon handover, camera permissions on HTTPS and a real phone, PDF output, test-only session cookie, no-index headers, and that outgoing mail/payment integrations remain disabled. The current application draw is not automated: selecting actual winners requires a separately implemented/audited draw workflow.

## Current Delivery Status

### POS Percentage Discounts and Split Payments — 2026-10-19

Owner-authorized test-only working-tree snapshot:
`811c8112dc7a215f03d545991eefe81e7653d78a-1792427294-1`.
Archive SHA-256:
`f2a26380919c3da57a57ecd4ede04a5d6ecf69b16bc722ee99c17da65214161a`.
The activation script created a nonempty private SQL backup, applied
`2026_10_19_000001_add_pos_split_payments.php` and activated the release.
No historical payment rows were fabricated; the new table is empty and old
orders retain null discount-mode metadata. Existing order fields, promotions,
coupon ownership, 60 variants, point balances and transfers have matching
before/after fingerprints. The dedicated test database now contains 53 tables.

Prior gates passed: full Pest 183 tests / 1341 assertions, additional focused
settlement coverage 13 tests / 48 assertions, Pint, targeted Larastan, POS
TypeScript and Vite production build. Authenticated HTTPS browser checks passed
for percentage calculation, amount mode, two payment methods, remainder helper,
per-payment image omission, outgoing payload and mobile/desktop layout without
JavaScript errors. The browser intercepted the sale POST before it reached the
server; no sale, proof, coupon or stock change was created during staging QA.
Test and production health return 200 and the production release fingerprint
is unchanged. No Git push, production deployment, local SQLite, environment or
storage upload was performed.

### Central Stock Adjustment Dialogs — 2026-10-19

Owner-authorized test-only working-tree snapshot:
`811c8112dc7a215f03d545991eefe81e7653d78a-1792422614-1`.
Archive SHA-256:
`d8f39d4690de74521d09c527179c19430dde037ba65f88e3bea9b190e410a057`.
Adds individual and selected-row central stock adjustments directly from
`/admin/product-variants`, with required reasons, audit movements, row locks
and stale-balance rejection. Focused local gates passed: 7 tests / 23 assertions,
Pint, targeted Larastan and Vite build. No schema migration was required.
The activation script created a private test SQL backup before activation.
Before/after fingerprints match for orders, promotions, coupons, participants,
variants, point balances and transfers. Test and production health return 200;
the production release fingerprint is unchanged. No local SQLite, environment
or storage was uploaded. No Git push or production deployment was performed.
Authenticated browser checks passed for the single adjustment dialog, selecting
two variants and opening the bulk dialog, required reason visibility and mobile
modal layout without horizontal overflow or JavaScript errors. No adjustment
was submitted during verification.

### Bulk Inventory Transfers — 2026-10-18

Owner-authorized test-only release:
`811c8112dc7a215f03d545991eefe81e7653d78a-1792336239-1`.
Archive SHA-256:
`ea16bbba637cf6c4ff9107fb033f9ea21d61ac5eaa9678220bcc4007cdba1f05`.
The validated working-tree snapshot adds multi-product quantity counters,
search/filter persistence and a read-only summary before atomic confirmation.
Prior local gates passed: 165 tests / 1274 assertions, Pint, targeted Larastan,
POS TypeScript and Vite build. No schema migration was required.

The activation script created a private SQL backup before activation.
Authenticated staging browser checks passed for the resource link, quantities,
summary, back/edit persistence and responsive 390px layout without JavaScript
errors. No transfer was confirmed. Before/after fingerprints match for orders,
promotions, coupons, participants, variants, location stocks and transfers.
Test and production health endpoints return 200; the production release
fingerprint is unchanged. No production deployment, Git push or local SQLite,
environment or storage upload was performed.

### Floating POS Notifications and Missing Payment Image — 2026-10-17

Owner-authorized test-only release:
`811c8112dc7a215f03d545991eefe81e7653d78a-1792256116-1`.
Archive SHA-256:
`52bb5fda8db82c47fadcb716a6fc0317d3548f514d3e5ee931756239d6439b23`.
This manual deployment includes the current validated working tree: floating
POS messages, explicit missing-image declarations for manual Yape/transfers,
the stricter unissued-legacy-coupon registration rule and masked participant
summaries. No GitHub push, DNS or production deployment was performed.

Prior local gates passed: 149 tests / 1193 assertions, Pint, targeted Larastan,
POS TypeScript checking and Vite build. The deployment excluded `.env*`, SQLite
files, local storage, vendor/node directories and test fixtures. Composer
installed production dependencies on Hostinger. The isolated test site entered
maintenance before a private SQL backup at
`cacao-test-app/backups/database-811c8112dc7a215f03d545991eefe81e7653d78a-1792256116-1.sql`
(mode 0600). Migration
`2026_10_17_000002_add_pos_payment_proof_missing_to_orders` ran successfully,
defaulting the new field to false on existing orders.

Read-only row fingerprints before/after matched for existing order fields,
campaigns, coupons, participants, variants, point balances and transfer records.
Counts stayed at 3 orders, 10 coupons, 0 participants, 59 variants, 3 point
balance records and 3 transfers. No campaign dates, legal content or activation
were changed, no local data was imported, and no stock transfer was performed.

An authenticated HTTPS browser check at 390 × 844 verified point/catalog loading,
floating validation while scrolled, dismissal, both Yape/transfer omission
options, clearing the option on method change and the no-image save payload.
The save request was intercepted in the browser and not sent to the server, so
verification created no sale or uploaded proof. Actual persistence/retry/private
upload flows were tested using the separate disposable local fixture. Test POS
and production health returned HTTP 200. Production release fingerprint remains
`8d380b37d1d41fa3d5184a654d10e80b9845a385328c163705dffc4bcdaa9d0a`.

### Legal Placeholder False Positive Fix — 2026-10-17

Test-only release:
`811c8112dc7a215f03d545991eefe81e7653d78a-1792245550-1`.
Archive SHA-256:
`57818c82cbd012ffa0775d76ea74b1924893d3037d4f353f006c0cbcf2c5c1f2`.
Activation now detects only explicit square-bracket markers starting with the
word `PENDIENTE`, case-insensitively, rather than rejecting every occurrence of
that substring. Ordinary legal language such as `reclamos pendientes` no longer
blocks activation. Unfinished terms/privacy markers report an error on their
respective field. Required dates, approved legal content and single-active-
campaign restrictions remain unchanged.

The promotion-focused suites passed: 50 tests / 700 assertions, including an
admin edit using the complete generated terms/privacy content and rejected
placeholder variants. Pint and targeted Larastan passed. This is a code-only
correction; no campaign content, dates or activation were changed. A private SQL
backup is retained at
`cacao-test-app/backups/database-811c8112dc7a215f03d545991eefe81e7653d78a-1792245550-1.sql`.
The deployed browser check confirmed that an explicit unfinished privacy marker
produces a field-specific error and notification without saving. The campaign
fingerprint before/after remained
`f177d84f98150f1cf36a3e6a4a0b71f36c3288e454f415168618c623b4ebbd0a`;
order/code counts stayed 3/10. Test admin/POS and production health returned 200,
and the production release fingerprint remained unchanged.

### Promotion Edit Validation Fix — 2026-10-17

Authorized test-only release:
`811c8112dc7a215f03d545991eefe81e7653d78a-1792244775-1`.
Archive SHA-256:
`e2d51f7bb143faaef4f708b4b696a8276c38149cf4b1c81c018c12d7e56f5767`.
Model validation errors on promotion editing now map to Filament's `data.*`
fields and display a persistent failure notification. Ordinary form validation
also displays the notification; valid edits keep the standard saved message.
The activation rules were not weakened or removed.

Three isolated local regression tests passed (24 assertions), covering valid
persisted edits/success notification, blocked activation/field error/failure
notification, and missing required dates. Pint and targeted Larastan passed.
The browser check on the deployed site submitted an intentionally invalid
activation with legal approval disabled and confirmed both the visible field
error and failure notification, without submitting a valid update. Application
code blocks and rolls back that attempted change. Existing campaign dates,
legal text and activation were not configured by this deployment.

A private SQL backup was made before activation at
`cacao-test-app/backups/database-811c8112dc7a215f03d545991eefe81e7653d78a-1792244775-1.sql`.
No new migration was pending. Test admin/POS and production health returned 200.
Production was not deployed; no GitHub push or DNS changes were performed.

### Mobile POS Update — 2026-10-17

The owner authorized a second manual SSH deployment of the validated working-tree
snapshot. Release: `811c8112dc7a215f03d545991eefe81e7653d78a-1792230358-1`.
Archive SHA-256: `e83906945a31756b79900c57464032e52967b07bb612c2ee31d66054fbfa02ec`.
It includes the Vue POS, location inventory migration and seller permissions.
Local gates passed before packaging: 126 Pest tests / 1016 assertions, Pint,
Larastan, POS TypeScript checking and Vite build.

The archive excluded vendor/node directories, environment files, all SQLite
files and local storage; Composer installed production dependencies remotely.
The isolated test site entered maintenance before a successful SQL backup at
`cacao-test-app/backups/database-811c8112dc7a215f03d545991eefe81e7653d78a-1792230358-1.sql`
(mode 0600). Migration and idempotent feature seeders succeeded; existing test
configuration, catalog, users and campaign were retained. No full demo seeder,
automatic point-stock transfer or new sale was run.

`/pos`, `/admin/login` and health checks return HTTP 200 over HTTPS. The POS
response enables same-origin camera access and uses a secure HTTP-only host-only
session cookie. A 390 × 844 browser check also passed actual administrator login,
point selection, catalog loading, no horizontal overflow and no JavaScript
errors. It did not create a sale or change inventory. Real phone camera testing
remains an owner acceptance step. The test DB remains isolated from production. The production
release fingerprint remained
`8d380b37d1d41fa3d5184a654d10e80b9845a385328c163705dffc4bcdaa9d0a`,
and production `/up` remains 200. No GitHub push, production deployment, DNS
change or `ventas` subdomain setup was performed.

Before testing sales, transfer selected quantities from central to the chosen
test point and assign sellers. Test actual phone camera permission/scanning on
`https://test.cacaodelperu.com/pos`. The campaign still requires human date/legal
configuration before activation; deployment does not activate it automatically.

### Initial Deployment History

The first test environment is live at `https://test.cacaodelperu.com`. This was an explicitly authorized **manual SSH deployment of the current local working-tree snapshot**, not a GitHub Actions run or a push to `main`. The base Git commit remains `811c8112dc7a215f03d545991eefe81e7653d78a`; uncommitted application changes were included. Release ID: `811c8112dc7a215f03d545991eefe81e7653d78a-1792196055-1`. Uploaded archive SHA-256: `3a1a530a579a25b59b3eaa235427d233802614cc0df4bc37ce43dcdaba688bdc`. Deployment excludes local databases, storage, environments and local vendor/node directories; Composer installed production dependencies on Hostinger.

The owner explicitly authorized trusting the presented host key on first use. SSH authentication with the existing ignored local deployment key succeeded after restricting that private file's Windows ACL to its owner. PHP CLI is 8.3.35 with GD and PDO MySQL; Composer 2 is available. The exact test public root resolves as expected and initially contains only Hostinger's `default.php`.

The private test environment was completed through hPanel and checked without printing credentials. The test DB was empty before installation; its identity and APP_KEY differ from production, and the DB user has no detected global or production-schema grants. A pre-migration MySQL dump was created under the private `backups` directory. All migrations ran, and first-run master seeders initialized 13 products, statuses and permissions. No production/local customer, order, storage or SQLite data was copied. A MegaPlaza Ica pickup location and one random-password test administrator were initialized; there were zero orders after setup. The legal texts are populated but the campaign remains inactive, without registration dates, for review/configuration.

Initial admin email: `admin.pruebas@cacaodelperu.test`. Read the generated password only in hPanel at `cacao-test-app/shared/initial-admin.txt` (mode 0600). Change it through **Usuarios administrativos**, then delete that private credential file. Neither the password nor APP_KEY was printed in the chat or committed. The environment file is also mode 0600.

HTTP checks passed for `/up`, `/`, `/promo`, `/promo/terminos`, `/politica-de-privacidad`, `/admin/login` and `/api/v1/products`; `.env` returns 403. Private/no-store and no-index headers were verified. Browser checks at 390px verified the promotion/legal/login pages, legal copy and first-party CSS/JavaScript loading without page errors. Production `/up` remains 200 and its release-link fingerprint is unchanged. Authenticated staging login/POS hardware camera checks remain for the owner; equivalent application flows were tested locally.

Automatic deployment is **not yet enabled**: publish/review the workflow safely and configure the **test** environment secrets. Do not push `main` inadvertently, as the existing production pipeline is automatic.

### Remaining hPanel Cron Setup

No test `schedule:run` entry was found. Add separate test-only jobs through hPanel, keeping existing production jobs unchanged:

```cron
* * * * * /usr/bin/php /home/u387243142/domains/cacaodelperu.com/cacao-test-app/current/artisan schedule:run >> /dev/null 2>&1
* * * * * /usr/bin/php /home/u387243142/domains/cacaodelperu.com/cacao-test-app/current/artisan queue:work --stop-when-empty --tries=3 --timeout=60 >> /dev/null 2>&1
```

Use hPanel's minimum allowed interval if every minute is unavailable. Until scheduler configuration, the retention command is installed but does not run unattended. Mail remains log-only and real payment/notification integrations remain disabled.
