# REST API v1

Base URL: `https://cacaodelperu.com/api/v1`. Send `Accept: application/json`.
Amounts are integer PEN cents. Protected endpoints use
`Authorization: Bearer <sanctum-token>`.

| Method | Endpoint | Auth | Purpose |
|---|---|---:|---|
| POST | `/auth/register` | No | Create customer and mobile token |
| POST | `/auth/login` | No | Create mobile token; requires `device_name` |
| POST | `/auth/logout` | Yes | Revoke current token |
| GET | `/products` | No | Paginated catalog; supports `search`, `category`, `page` |
| GET | `/products/{slug}` | No | Product, images, and active variants |
| GET | `/addresses` | Yes | List the customer's delivery addresses |
| POST | `/addresses` | Yes | Create an address; the first becomes default |
| PUT/PATCH | `/addresses/{address}` | Yes | Update an owned address |
| DELETE | `/addresses/{address}` | Yes | Soft-delete an owned address |
| PATCH | `/addresses/{address}/default` | Yes | Set the owned address as default |
| GET | `/commerce-options` | Yes | Active payment methods, zones, districts, and delivery rates |
| POST | `/checkout/quote` | Yes | Authoritative coupon, delivery, and total preview |
| GET | `/orders` | Yes | Current customer's paginated order history |
| GET | `/orders/{order}` | Yes | Owned order and immutable item snapshots |
| POST | `/checkout` | Yes | Validate and atomically create an order |
| POST | `/push-devices` | Yes | Register a native device token and notification preferences |
| DELETE | `/push-devices` | Yes | Remove an owned native device token |
| GET | `/webhooks/whatsapp` | Meta | Verify the Meta webhook subscription |
| POST | `/webhooks/whatsapp` | Signed | Receive WhatsApp delivery receipts |

## Checkout quote request

```json
{
  "items": [{"variant_id": 1, "quantity": 2}],
  "district": "Ica",
  "coupon_code": "CACAO10"
}
```

The response contains `subtotal_amount`, `discount_amount`, `delivery_amount`,
`total_amount`, `coupon_code`, and the authoritative `delivery_rate_id`. The
checkout validates the rate against the submitted address again.

## Checkout request

```json
{
  "items": [{"variant_id": 1, "quantity": 2}],
  "address": {
    "recipient_name": "Ana Pérez", "phone": "999999999",
    "line_one": "Av. Principal 123", "district": "Miraflores",
    "province": "Lima", "department": "Lima"
  },
  "payment_method_id": 1,
  "delivery_rate_id": 1,
  "coupon_code": "BIENVENIDA",
  "whatsapp_updates_opt_in": true
}
```

For a proof file, send the same fields as `multipart/form-data` and include
`payment_proof` (JPEG, PNG, or PDF, maximum 5 MB). Client prices and totals are
ignored. HTTP 409 means stock became unavailable. HTTP 422 contains validation
errors; 401 and 403 represent authentication and ownership failures.

## Response envelope

Single resources use `{ "data": {...} }`; collections include `data`, `links`,
and `meta`. Authentication returns `{ "token": "...", "user": {...} }`.
Timestamps are ISO-8601 and API field names are snake_case.
