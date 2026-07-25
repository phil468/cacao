# SEO and marketing measurement

## Primary objective

Position Cacao del Perú for transactional searches in Ica and measure the complete path from acquisition to order:

`impression -> organic or campaign click -> product view -> add to cart -> checkout -> purchase`

## Initial keyword clusters

- Transactional local: `chocolates en Ica`, `comprar chocolate en Ica`, `delivery de chocolates Ica`.
- Gift intent: `regalos de chocolate en Ica`, `chocolates para regalo Ica`.
- Product intent: `chocolate 70% cacao`, `chocolate 80% cacao`, `chocolate 100% cacao`, `grageas de chocolate`.
- Brand and trust: `Cacao del Perú Ica`, payment methods, delivery districts, contact and order tracking.

Every page must answer a real customer need. Do not create near-duplicate district pages or repeat keywords unnaturally.

## Measurement configuration

Production environment variables:

```dotenv
GOOGLE_ANALYTICS_ID=G-XXXXXXXXXX
GOOGLE_SITE_VERIFICATION=verification-token
```

Analytics is loaded only after the visitor accepts measurement. The storefront sends `view_item`, `add_to_cart`, `view_cart`, `begin_checkout`, `purchase`, `contact`, and `select_content`.

Campaign links must use consistent UTM parameters:

```text
https://cacaodelperu.com/chocolates-en-ica?utm_source=instagram&utm_medium=social&utm_campaign=ica_launch&utm_content=reel_70_cacao
```

Allowed naming convention:

- `utm_source`: `instagram`, `facebook`, `whatsapp`, `google`, `email`.
- `utm_medium`: `social`, `paid_social`, `organic`, `referral`, `email`.
- `utm_campaign`: lowercase business objective, for example `ica_launch` or `fathers_day_2026`.
- `utm_content`: specific creative or placement.

The last captured UTM attribution is stored with the order and is visible in Filament.

## Weekly dashboard

Review weekly, comparing with the prior four weeks:

- Search impressions, clicks, click-through rate and average position.
- Users and sessions by source/medium and campaign.
- Product view to add-to-cart rate.
- Add-to-cart to checkout rate.
- Checkout to purchase rate.
- Revenue, average order value and units per order.
- Orders and revenue by UTM campaign.
- WhatsApp contact clicks.
- Search terms with impressions but low click-through rate.

Do not optimize for traffic alone. The primary business metrics are completed orders, contribution margin, repeat purchase and customer acquisition cost.

## 90-day execution

### Days 1–15

- Verify Search Console and submit `/sitemap.xml`.
- Configure GA4 and validate events in DebugView.
- Complete Google Business Profile with consistent name, phone, website, service area, photographs and opening hours.
- Publish the local landing page and request indexing.
- Establish the UTM naming convention.

### Days 16–45

- Publish useful content answering purchase questions: cacao percentages, choosing gifts, storage and delivery in Ica.
- Request genuine reviews after completed orders without review gating.
- Improve product photographs, descriptions and alternative text.
- Run small local creative tests and compare purchase conversion, not likes.

### Days 46–90

- Create seasonal landing content only when the offer is real.
- Build local mentions with legitimate Ica businesses, fairs and media.
- Evaluate Google Merchant Center availability for Peru before depending on free listings.
- Retarget only visitors who gave the applicable consent.

## Required business information

Before enabling full local business markup and Google Business Profile, confirm:

- Public business name and exact address, or whether it is a service-area business.
- Customer service hours.
- Delivery districts and conditions.
- Official Instagram and Facebook URLs.
- Return, privacy, cookie and shipping policies.
