# Cacao del Perú

Monorepo for the `cacaodelperu.com` ecommerce platform.

## Requirements

- PHP 8.2 with common Laravel extensions
- Composer 2
- MySQL 8
- Node.js 22 and npm 10+

### Portable Windows toolchain

On Windows, the required PHP, Composer, Node/npm, and Git versions can be
installed inside `.tools/` without changing the system installation:

```powershell
powershell -NoProfile -ExecutionPolicy Bypass -File .\scripts\install-local-tools.ps1
powershell -NoProfile -ExecutionPolicy Bypass -Command ". .\scripts\activate-local-tools.ps1; php --version; composer --version; node --version; git --version"
```

The `.tools/` directory is ignored by Git. Docker is optional for local MySQL
and supporting services; production on Hostinger Premium Web Hosting uses the
native PHP/MySQL release described in `docs/deployment.md`.

## Backend setup

```bash
cd backend
cp .env.example .env
composer install
php artisan key:generate
npm ci
php artisan migrate --seed
npm run build
php artisan serve
```

The development administrator is created only when `APP_ENV=local` or
`APP_ENV=testing`: `admin@cacaodelperu.test` / `ChangeMe123!`. Change it on
first use. The admin panel is available at `/admin`.

## Mobile setup

```bash
cd mobile
cp src/environments/environment.example.ts src/environments/environment.ts
npm ci
npm start
```

To prepare Android after installing Android Studio:

```bash
npm run build
npx cap add android
npx cap sync android
```

See [architecture](docs/architecture.md), [database design](docs/database-design.md),
[implementation plan](docs/implementation-plan.md), [API](docs/api.md), and
[deployment](docs/deployment.md).
