# Mobile First Evolution

## Goal

The first mobile evolution turns the Ionic application into a faster commerce experience inspired by established delivery applications while preserving the premium Cacao del Perú identity. The application remains a single-store experience and does not reproduce third-party branding or marketplace concepts.

## Delivered experience

- Persistent five-item navigation: Home, Catalog, Favorites, Orders, and Account.
- Optional delivery address context. Customers can browse without an address and select a saved address when ready.
- Home search, premium hero, collection shortcuts, and featured products.
- Variant-first catalog with search, category, cacao percentage, availability, promotion, and price ordering controls.
- Variant-specific images, current stock, promotional prices, quick cart addition, and local feedback.
- Favorites available before authentication and synchronized with the customer account after login.
- Order list grouped into active, delivered, and cancelled states.
- Reorder flow that checks current availability, stock, and backend prices before adding items to the cart.
- Account hub for authentication, addresses, favorites, orders, and notification preferences.
- Persistent cart summary in the mobile navigation.

## Backend contracts

- `GET /api/v1/products` accepts `search`, `category`, `cacao`, `available`, `promotional`, and `featured`.
- `GET /api/v1/favorites` returns the authenticated customer variant identifiers.
- `PUT /api/v1/favorites/{variant}` stores an active variant idempotently.
- `DELETE /api/v1/favorites/{variant}` removes a favorite.
- Product resources expose variant-specific images.

Prices, stock, delivery fees, discounts, and order totals remain authoritative on the backend.

## Deferred to the second evolution

- GPS permission and map-based address confirmation.
- Free geocoding provider selection, rate limits, attribution, and privacy handling.
- Recently viewed and personalized recommendations.
- Remote feature flags and experimentation.
- Analytics events for search, product views, favorites, cart additions, checkout abandonment, and purchase.
- Promotion landing pages and richer push deep links.
- Native Android visual and accessibility validation on physical devices.

## Validation

The quality gates for this evolution are mobile ESLint, TypeScript compilation, Angular production compilation, backend Pint, focused API tests, and the complete backend test suite.
