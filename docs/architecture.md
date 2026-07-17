# Architecture

## Goals

Cacao del Perú is a modular monolith. Laravel owns identity, catalog, pricing,
inventory, checkout, orders, content, and administration. Blade and Livewire
render the public web storefront. Filament exposes the back office at `/admin`.
The Ionic application is a separate API client.

## Technology baseline

| Layer | Choice | Constraint |
|---|---|---|
| Runtime | PHP 8.2 | Hostinger Premium compatibility |
| Backend | Laravel 12 | Stable Laravel line supporting PHP 8.2 |
| Admin | Filament 4 | PHP 8.2 and Laravel 11.28+ |
| Authorization | Spatie Permission 6 | Supports Laravel 12 and PHP 8.2 |
| Web UI | Blade, Livewire 3, Tailwind 4 | Server-rendered SEO-friendly storefront |
| Mobile | Ionic 8, Angular 20 LTS, Capacitor 8 | Node 22 build environment |
| Database | MySQL 8 / SQLite in CI | InnoDB transactions in production |

## Containers

Containers are an optional local-development concern, not an application
boundary. A future Docker Compose stack may provide MySQL, mail testing, and
queue workers while Laravel and Ionic retain the same configuration contracts.
Hostinger Premium Web Hosting receives the native Laravel release over SSH.
Kubernetes is intentionally outside the MVP: it would require a VPS or managed
cluster and introduce orchestration, ingress, persistent-volume, observability,
and database-operational concerns without changing the commerce domain.

## Backend boundaries

- **Catalog:** categories, products, variants, and product images.
- **Inventory:** current variant stock and immutable stock movements.
- **Sales:** carts, coupons, checkout, orders, payments, and statuses.
- **Fulfillment:** addresses, delivery zones, delivery rates, and tracking state.
- **Content:** banners, FAQs, settings, and contact requests.
- **Identity:** customers and administrators share `users`; roles distinguish access.

HTTP controllers validate transport input with Form Requests and return API
Resources. Policies guard both Filament and HTTP operations. `CheckoutService`
re-reads prices, locks variants with `SELECT ... FOR UPDATE`, computes totals in
integer cents, creates immutable order item snapshots, and records stock changes
inside one database transaction.

## API conventions

- Base path: `/api/v1`.
- JSON uses snake_case fields and ISO-8601 timestamps.
- Sanctum bearer tokens authenticate mobile requests.
- Validation returns HTTP 422; authorization 403; conflicts such as insufficient
  stock return 409.
- Public catalog reads are rate limited separately from authentication and checkout.

## Payment extensibility

`PaymentGateway` is a domain-facing contract. The MVP binds it to
`ManualPaymentGateway`, which records a selected configurable manual payment
method and optional proof. A future Izipay adapter must implement the same
contract and translate provider responses outside the order domain.

## Observability and security

Order status changes and every inventory mutation are appended to audit tables.
Uploads use generated paths and validated MIME/size rules. Secrets remain in
environment variables. CI uses disposable credentials. Production uses HTTPS,
secure cookies, rate limits, policies, Form Requests, and database constraints.
