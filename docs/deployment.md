# Production Deployment

## Hostinger prerequisites

Create a PHP 8.2 website for `cacaodelperu.com`, provision MySQL, enable SSH,
and enable SSL. Configure the production `.env` directly on the server; it is
never part of a release artifact.

In hPanel:

1. Select PHP 8.2 and enable the Laravel extensions (`ctype`, `curl`, `dom`,
   `fileinfo`, `filter`, `hash`, `mbstring`, `openssl`, `pcre`, `pdo_mysql`,
   `session`, `tokenizer`, and `xml`).
2. Create a MySQL database and database user.
3. Enable SSH and copy its host, port, and username.
4. Confirm that SSL works for the production domain.

Hostinger SSH is restricted to the hosting account home directory. Use an
application directory outside the public document root:

```text
/home/u12345678/domains/cacaodelperu.com/
├── cacao-app/
│   ├── current -> releases/<commit>
│   ├── releases/
│   ├── shared/
│   ├── backups/
│   └── scripts/
└── public_html/
    └── current -> ../cacao-app/current/public
```

Create this structure once over SSH, replacing both absolute paths:

```bash
DEPLOY_ROOT=/home/u12345678/domains/cacaodelperu.com/cacao-app
PUBLIC_ROOT=/home/u12345678/domains/cacaodelperu.com/public_html
mkdir -p "$DEPLOY_ROOT"/{releases,shared,backups,scripts}
ln -s "$DEPLOY_ROOT/current/public" "$PUBLIC_ROOT/current"
```

Keep `public_html` as Hostinger's document root and add this bridge to
`public_html/.htaccess`:

```apache
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteRule ^\.well-known/ - [L]
    RewriteRule ^current/ - [L]
    RewriteRule ^(.*)$ current/$1 [L]
</IfModule>
```

The `current` link can be temporarily dangling before the first deployment.
Confirm that the account follows this symlink before enabling automatic
deployment. Do not place `.env`, application source, `vendor`, storage, or
backups directly inside `public_html`.

## Production environment

Create `HOSTINGER_DEPLOY_PATH/shared/.env` manually over SSH. At minimum:

```dotenv
APP_NAME="Cacao del Perú"
APP_ENV=production
APP_KEY=base64:GENERATE_THIS_LOCALLY
APP_DEBUG=false
APP_URL=https://cacaodelperu.com
APP_LOCALE=es
APP_FALLBACK_LOCALE=es
APP_TIMEZONE=America/Lima

DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=HOSTINGER_DATABASE
DB_USERNAME=HOSTINGER_DATABASE_USER
DB_PASSWORD=HOSTINGER_DATABASE_PASSWORD
DB_DUMP_BINARY=mysqldump

SESSION_DRIVER=database
SESSION_DOMAIN=.cacaodelperu.com
CACHE_STORE=database
QUEUE_CONNECTION=database
FILESYSTEM_DISK=public

MAIL_MAILER=smtp
MAIL_HOST=MAIL_PROVIDER_HOST
MAIL_PORT=587
MAIL_USERNAME=MAIL_PROVIDER_USER
MAIL_PASSWORD=MAIL_PROVIDER_PASSWORD
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=hola@cacaodelperu.com
MAIL_FROM_NAME="Cacao del Perú"
```

Generate `APP_KEY` locally with `php artisan key:generate --show`; do not
regenerate it during deployments. Add Google, Telegram, WhatsApp Cloud, FCM,
and other provider values only when those integrations are enabled.

## GitHub production environment

Create a `production` environment in repository **Settings → Environments**.
Restrict it to `main` and add a required reviewer when the repository plan
supports it.

Required environment secrets:

- `HOSTINGER_HOST`: SSH host shown in hPanel.
- `HOSTINGER_PORT`: SSH port shown in hPanel.
- `HOSTINGER_USER`: SSH username shown in hPanel.
- `HOSTINGER_SSH_KEY`: complete private deployment key.
- `HOSTINGER_KNOWN_HOSTS`: complete, independently verified SSH host-key line.
- `HOSTINGER_DEPLOY_PATH`: absolute `cacao-app` directory.
- `HOSTINGER_APP_URL`: `https://cacaodelperu.com`, without a trailing slash.

Generate a dedicated deployment key locally:

```bash
ssh-keygen -t ed25519 -C "github-actions-cacaodelperu" -f hostinger_deploy
```

Append `hostinger_deploy.pub` to `~/.ssh/authorized_keys` on Hostinger. Store the
complete private key as `HOSTINGER_SSH_KEY`. Obtain and verify the host key from
a trusted connection:

```bash
ssh-keyscan -p HOSTINGER_PORT HOSTINGER_HOST
```

Store the complete output line as `HOSTINGER_KNOWN_HOSTS`; the workflow never
disables strict host-key checking.

## CI/CD flow

Backend CI runs for pull requests and again when backend changes reach `main`.
A successful `Backend CI` run on `main` triggers `Deploy production`. GitHub
waits for the `production` environment approval when configured.
`workflow_dispatch` remains available for an explicit redeployment.

The deployment workflow:

1. Checks out the exact commit that passed CI.
2. Installs optimized production PHP dependencies.
3. Builds Vite assets.
4. Creates an artifact that excludes `.env` and `node_modules`.
5. Uploads the artifact and activation script using SSH.
6. Creates a database backup.
7. Runs `composer2 install --no-dev --optimize-autoloader` on Hostinger.
8. Runs `php artisan migrate --force`, storage linking, Filament assets, and
   `php artisan optimize`.
9. Atomically switches `current`.
10. Checks `/up`; an error restores the previous release link.

Five releases and ten database backups are retained. Database restoration is
manual because an automatic restore could delete orders placed after a release.

After the first successful deployment only, initialize master data and create
the production administrator interactively:

```bash
cd /home/u12345678/domains/cacaodelperu.com/cacao-app/current
php artisan db:seed --force
php artisan admin:create owner@cacaodelperu.com
```

The administrator password is requested without echoing it. It is never passed
through GitHub Actions or stored in the repository. Do not run the local demo
administrator in production.

## Hostinger cron jobs

Hostinger cron schedules use UTC. Add these custom commands after the first
successful deployment, replacing the absolute path:

```cron
* * * * * /usr/bin/php /home/u12345678/domains/cacaodelperu.com/cacao-app/current/artisan schedule:run >> /dev/null 2>&1
* * * * * /usr/bin/php /home/u12345678/domains/cacaodelperu.com/cacao-app/current/artisan queue:work --stop-when-empty --tries=3 --timeout=60 >> /dev/null 2>&1
```

If hPanel enforces a longer minimum interval, use the minimum allowed interval
and expect notification jobs to wait up to that interval.

## Manual verification

After a release, verify:

- `/up`, `/`, `/admin`, and `/api/v1/products`.
- Product and payment images under `/storage`.
- Login, cart, checkout, stock decrement, and order status transitions.
- Database backup creation.
- Queue and cron execution.
- Transactional email, Telegram, and WhatsApp using test recipients.

DNS changes and an actual deployment require explicit owner approval.

## Customer communication

Configure `WHATSAPP_NUMBER` in international format without `+` or spaces.
Telegram requires `TELEGRAM_BOT_TOKEN` and `TELEGRAM_CHAT_ID`. Customer order
updates require the approved WhatsApp utility template and the
`WHATSAPP_CLOUD_*` values. FCM requires `FCM_PROJECT_ID` and a service-account
JSON outside the repository. SMS remains disabled.
