# Customer notifications

## Active channel strategy

Transactional order updates are sent by email and, only after explicit customer
consent, through an approved WhatsApp utility template. The current flow ends if
WhatsApp cannot deliver the message. It never attempts an SMS fallback.

SMS remains represented by the provider-neutral `SmsOrderNotifier` contract and
the `DisabledSmsOrderNotifier` implementation so it can be added later without
coupling orders to a provider. It is disabled in every environment.

Push notifications are sent to authenticated devices that enabled order
updates. Promotional push campaigns are sent only to devices that separately
enabled promotions.

## Delivery and idempotency

Notification attempts are stored in `notification_deliveries`. A unique order,
event, and channel combination prevents duplicate transactional messages.
Provider delivery receipts update the stored WhatsApp delivery status through a
signed webhook.

The jobs use Laravel queues. Production therefore requires a persistent worker
or a scheduled `php artisan queue:work --stop-when-empty` command.

## Consent

Checkout displays an unchecked WhatsApp consent control. Transactional consent
is stored on the historical order and is not reused for marketing. Promotional
push consent is managed independently for every registered device.

Customer email is stored both on the user and as a historical snapshot on the
order. Transactional order emails do not require marketing consent. Future
email campaigns must introduce a separate, explicit marketing opt-in and an
unsubscribe mechanism.

## WhatsApp template

Register a Spanish utility template matching the four parameters sent by the
application, for example `order_status_update_v1`:

```text
Hola {{1}}. Tu pedido {{2}} está ahora: {{3}}. Total: S/ {{4}}.
```

Do not include promotions, coupons, or unrelated content in this utility
template.

## Configuration

No credentials belong in the repository. Runtime configuration uses:

```dotenv
WHATSAPP_CLOUD_ACCESS_TOKEN=
WHATSAPP_CLOUD_PHONE_NUMBER_ID=
WHATSAPP_CLOUD_GRAPH_VERSION=
WHATSAPP_CLOUD_ORDER_TEMPLATE=order_status_update_v1
WHATSAPP_CLOUD_APP_SECRET=
WHATSAPP_WEBHOOK_VERIFY_TOKEN=

FCM_PROJECT_ID=
GOOGLE_APPLICATION_CREDENTIALS=

SMS_ENABLED=false
```