# Cacao del Perú Engineering Guide

## Scope

These instructions apply to the complete monorepo.

## Language

- Code, class names, variables, database objects, routes, API fields, tests, documentation headings, and commits are written in English.
- Customer-facing UI copy is written in Spanish.
- API error messages intended for end users are written in Spanish.

## Architecture

- `backend/`: Laravel 12 application, Blade/Livewire storefront, Filament 4 admin panel, and `/api/v1` API.
- `mobile/`: Ionic 8, Angular 20, and Capacitor 8 application.
- `docs/`: architecture, data design, API, deployment, and implementation plan.
- Business logic belongs in application services, never in controllers or UI components.
- Order totals and stock changes are authoritative only on the backend.

## Quality gates

- Backend: Pint, Larastan, Pest, migrations, and Vite build.
- Mobile: ESLint, unit tests, and production build.
- Add authorization and validation for every mutation.
- Never commit secrets, production credentials, payment credentials, or a production `.env`.
- Preserve user changes and keep commits focused and in English.

## Delivery constraints

- Do not deploy, change DNS, or connect a real payment service without explicit authorization.
- Production timezone is `America/Lima`; currency is `PEN`.
- Money is stored as integer cents and never as floating-point values.

