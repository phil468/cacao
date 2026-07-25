# Izipay integration

## Scope

The storefront supports Izipay Web Core as an additional payment provider. Order totals remain authoritative in Laravel. The browser never receives the API key or hash key.

The flow is:

1. Laravel creates the order and an internal `payment_transactions` record.
2. Laravel requests a session token from Izipay.
3. The storefront opens the official Izipay form with the public RSA key and session token.
4. Izipay sends the signed result to `/api/webhooks/izipay`.
5. Laravel verifies the HMAC signature, transaction identifier, currency, amount, and order number.
6. A successful transaction moves the order to `preparing`. Repeated callbacks are idempotent.

## Sandbox configuration

Request the Web Core sandbox credentials from Izipay and add the following values only to the server `.env`:

```dotenv
IZIPAY_ENABLED=true
IZIPAY_ENVIRONMENT=sandbox
IZIPAY_MERCHANT_CODE=
IZIPAY_API_KEY=
IZIPAY_API_KEY_HEADER=Authorization
IZIPAY_API_KEY_PREFIX=Bearer
IZIPAY_HASH_KEY=
IZIPAY_PUBLIC_KEY=
IZIPAY_SESSION_TOKEN_URL=
IZIPAY_POSTAL_CODE=11001
```

The session-token URL, authentication header, and prefix must match the values delivered for the merchant account. They are configurable because Izipay can provision different products and environments. Do not infer production credentials or endpoints from examples.

In Filament:

1. Open **Métodos de pago**.
2. Create a method with provider **Izipay**.
3. Keep **Requiere constancia** disabled.
4. Activate the method only after the sandbox checkout and webhook have been verified.

The webhook registered at Izipay must be:

```text
https://cacaodelperu.com/api/webhooks/izipay
```

Production also requires valid HTTPS and:

```dotenv
IZIPAY_ENVIRONMENT=production
```

After changing production environment variables, run:

```bash
php artisan optimize:clear
php artisan optimize
```

## Security notes

- Never expose `IZIPAY_API_KEY` or `IZIPAY_HASH_KEY` to JavaScript.
- Never mark an order as paid from an unsigned browser value.
- A `code` equal to `00` is accepted only after signature and amount validation.
- Keep webhook logs free of card data. The application stores the signed response for audit but does not store full card numbers.
- Test approved, rejected, abandoned, duplicated, and delayed-notification transactions before production activation.

Official references:

- <https://developers.izipay.pe/credentials/>
- <https://developers.izipay.pe/web-core/quickstart/>
- <https://developers.izipay.pe/web-core/modalidades/parameters/>
- <https://developers.izipay.pe/web-core/notifications/>
- <https://developers.izipay.pe/web-core/use-cases/pay/>
