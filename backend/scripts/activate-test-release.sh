#!/usr/bin/env bash
set -Eeuo pipefail
RELEASE_ID="$1"
ARCHIVE="$2"
PUBLIC_ROOT="$3"
ROOT="$(cd "$(dirname "$0")/.." && pwd -P)"
[[ "$ROOT" == /home/*/cacao-test-app && "$ROOT" != *..* ]]
[[ "$RELEASE_ID" =~ ^[a-f0-9]{40}-[0-9]+-[0-9]+$ ]]
[[ "$ARCHIVE" == "$ROOT/incoming/$RELEASE_ID.tar.gz" ]]
PUBLIC_ROOT="$(cd "$PUBLIC_ROOT" && pwd -P)"
[[ "$PUBLIC_ROOT" == /home/u387243142/domains/cacaodelperu.com/public_html/test ]]
[[ "$ROOT" == /home/u387243142/domains/cacaodelperu.com/cacao-test-app ]]
test -f "$ROOT/shared/.env"
test -f "$PUBLIC_ROOT/.htaccess"
if [ -L "$PUBLIC_ROOT/current" ]; then
    [[ "$(readlink -m "$PUBLIC_ROOT/current")" == "$(readlink -m "$ROOT/current/public")" ]]
elif [ -e "$PUBLIC_ROOT/current" ]; then
    echo 'Refusing to replace a non-symlink public directory.' >&2
    exit 1
fi
# Validate the isolated environment before database connections, migrations or public links.
php -r '
$values = parse_ini_file($argv[1], false, INI_SCANNER_RAW);
foreach (["APP_ENV"=>"staging", "APP_URL"=>"https://test.cacaodelperu.com", "DB_CONNECTION"=>"mysql", "MAIL_MAILER"=>"log", "SESSION_DOMAIN"=>"test.cacaodelperu.com", "SESSION_COOKIE"=>"cacao_test_session"] as $key=>$expected) {
    if (($values[$key] ?? null) !== $expected) { fwrite(STDERR, "Unsafe test configuration: ".$key.PHP_EOL); exit(1); }
}
foreach (["APP_DEBUG", "TELEGRAM_ENABLED", "IZIPAY_ENABLED"] as $key) { if (($values[$key] ?? "false") !== "false") exit(1); }
foreach (["WHATSAPP_CLOUD_ACCESS_TOKEN", "FCM_PROJECT_ID", "GOOGLE_APPLICATION_CREDENTIALS", "GOOGLE_CLIENT_SECRET"] as $key) { if (!empty($values[$key])) exit(1); }
if (empty($values["DB_DATABASE"]) || empty($values["DB_USERNAME"]) || empty($values["APP_KEY"])) exit(1);
if (($values["DB_DATABASE"] ?? "") !== ($values["TEST_DATABASE_NAME"] ?? "")) exit(1);
' "$ROOT/shared/.env"
RELEASE="$ROOT/releases/$RELEASE_ID"
test ! -e "$RELEASE"
mkdir -p "$RELEASE" "$ROOT/backups" "$ROOT/shared/storage/app/public" "$ROOT/shared/storage/framework/cache/data" "$ROOT/shared/storage/framework/sessions" "$ROOT/shared/storage/framework/views" "$ROOT/shared/storage/logs"
tar -xzf "$ARCHIVE" -C "$RELEASE"
test ! -e "$RELEASE/.env"
test ! -e "$RELEASE/storage"
ln -s ../../shared/.env "$RELEASE/.env"
ln -s ../../shared/storage "$RELEASE/storage"
cd "$RELEASE"
if command -v composer2 >/dev/null 2>&1; then composer2 install --no-dev --no-interaction --optimize-autoloader; else composer install --no-dev --no-interaction --optimize-autoloader; fi
# Shared storage puts both the old and new test release into maintenance.
# Never serve the old global-stock code while migrating location inventory.
if [ -f "$ROOT/current/artisan" ]; then
    (cd "$ROOT/current" && php artisan down --retry=60)
fi
php artisan deploy:backup "$ROOT/backups/database-$RELEASE_ID.sql"
chmod 600 "$ROOT/backups/database-$RELEASE_ID.sql"
php artisan migrate --force
php artisan db:seed --class=PromotionSeeder --force
php artisan db:seed --class=PointOfSaleSeeder --force
php artisan db:seed --class=PosAccessSeeder --force
ln -s ../../../shared/storage/app/public public/storage
printf 'User-agent: *\nDisallow: /\n' > public/robots.txt
php artisan filament:assets
php artisan optimize
# Inventory schema changes are not safely rolled back by switching old code.
# On failed activation leave test in maintenance for explicit recovery.
failed_activation() { php artisan down --retry=60 || true; }
trap failed_activation ERR
ln -sfn "releases/$RELEASE_ID" "$ROOT/current"
ln -sfn ../../cacao-test-app/current/public "$PUBLIC_ROOT/current"
php artisan up
curl --fail --silent --show-error --max-time 30 --retry 3 "https://test.cacaodelperu.com/up?release=$RELEASE_ID" >/dev/null
trap - ERR
echo "Test release activated. Production links and database were not targeted."
