#!/usr/bin/env bash
set -Eeuo pipefail
SHA="$1"; ARCHIVE="$2"; APP_URL="$3"; ROOT="$(cd "$(dirname "$0")/.." && pwd)"; RELEASE="$ROOT/releases/$SHA"; PREVIOUS="$(readlink "$ROOT/current" 2>/dev/null || true)"; BACKUP="$ROOT/backups/database-$SHA.sql"
[[ "$ROOT" == /home/*/domains/cacaodelperu.com/cacao-app && "$ROOT" != *..* ]]
[[ "$SHA" =~ ^[a-f0-9]{40}-[0-9]+-[0-9]+$ ]]
[[ "$ARCHIVE" == "$ROOT/incoming/cacao-$SHA.tar.gz" ]]
[[ "${APP_URL%/}" == https://cacaodelperu.com ]]
test ! -e "$RELEASE"
test -f "$ROOT/shared/.env"
php -r '
$values = parse_ini_file($argv[1], false, INI_SCANNER_RAW);
if (($values["APP_ENV"] ?? "") !== "production" || rtrim($values["APP_URL"] ?? "", "/") !== "https://cacaodelperu.com" || ($values["DB_CONNECTION"] ?? "") !== "mysql" || empty($values["DB_DATABASE"]) || empty($values["APP_KEY"])) {
    fwrite(STDERR, "Refusing an unexpected production environment.".PHP_EOL); exit(1);
}
' "$ROOT/shared/.env"
MIGRATIONS_STARTED=0
MAINTENANCE_STARTED=0
rollback(){
    if [ "$MIGRATIONS_STARTED" -eq 1 ]; then
        # Old inventory code cannot safely run against the new location schema.
        php artisan down --retry=60 || true
        echo 'Deployment failed after migrations started. Site remains in maintenance; recover forward or review the private backup.' >&2
    elif [ "$MAINTENANCE_STARTED" -eq 1 ] && [ -f "$ROOT/current/artisan" ]; then
        (cd "$ROOT/current" && php artisan up) || true
    fi
}
trap rollback ERR
mkdir -p "$RELEASE" "$ROOT/shared/storage/app/public" "$ROOT/shared/storage/framework/cache/data" "$ROOT/shared/storage/framework/sessions" "$ROOT/shared/storage/framework/views" "$ROOT/shared/storage/logs" "$ROOT/backups"
tar -xzf "$ARCHIVE" -C "$RELEASE"
test -f "$ROOT/shared/.env"
# Hostinger can expose a chrooted path over SSH while its web server resolves
# symlinks from the host filesystem. Relative links work correctly in both
# contexts and remain valid when a release directory is moved or activated.
ln -s "../../shared/.env" "$RELEASE/.env"
rm -rf "$RELEASE/storage"
ln -s "../../shared/storage" "$RELEASE/storage"
if command -v composer2 >/dev/null 2>&1; then COMPOSER=composer2; else COMPOSER=composer; fi
cd "$RELEASE"; "$COMPOSER" install --no-dev --no-interaction --optimize-autoloader
php artisan db:show >/dev/null
if [ -f "$ROOT/current/artisan" ]; then
    (cd "$ROOT/current" && php artisan down --retry=60)
    MAINTENANCE_STARTED=1
    (cd "$ROOT/current" && php artisan queue:restart)
    sleep 5
fi
php artisan deploy:backup "$BACKUP"
test -s "$BACKUP"
chmod 600 "$BACKUP"
MIGRATIONS_STARTED=1
php artisan migrate --force
# Only idempotent operational permissions/defaults. Never run demo/catalog seeders.
php artisan db:seed --class=PromotionSeeder --force
php artisan db:seed --class=PointOfSaleSeeder --force
php artisan db:seed --class=PosAccessSeeder --force
rm -rf "$RELEASE/public/storage"
ln -s "../../../shared/storage/app/public" "$RELEASE/public/storage"
php artisan filament:assets; php artisan optimize
ln -sfn "releases/$SHA" "$ROOT/current"
PUBLIC_ROOT="$ROOT/../public_html"
if [ -d "$PUBLIC_ROOT" ]; then
    ln -sfn "../$(basename "$ROOT")/current/public" "$PUBLIC_ROOT/current"
fi
php artisan up
curl --fail --location --silent --show-error --max-time 30 \
    --retry 3 --retry-delay 2 \
    --header 'Cache-Control: no-cache' \
    "$APP_URL/up?release=$SHA" >/dev/null
trap - ERR
rm -f -- "$ARCHIVE"
# Keep the active release and the newest inactive release. Never follow links.
ACTIVE_RELEASE="$(readlink -f "$ROOT/current")"
KEPT_PREVIOUS=0
find "$ROOT/releases" -mindepth 1 -maxdepth 1 -type d -printf '%T@ %p\n' | sort -nr | cut -d' ' -f2- | while IFS= read -r release_path; do
    [[ "$release_path" == "$ROOT/releases/"* && ! -L "$release_path" ]]
    [[ "$(dirname "$(realpath "$release_path")")" == "$ROOT/releases" ]]
    [[ "$(basename "$release_path")" =~ ^[a-f0-9]{40}-[0-9]+-[0-9]+$ ]]
    [ "$release_path" = "$ACTIVE_RELEASE" ] && continue
    if [ "$KEPT_PREVIOUS" -eq 0 ]; then KEPT_PREVIOUS=1; continue; fi
    rm -rf -- "$release_path"
done

find "$ROOT/backups" -mindepth 1 -maxdepth 1 -type f -name 'database-*.sql' -printf '%T@ %p\n' \
    | sort -nr \
    | tail -n +11 \
    | cut -d' ' -f2- \
    | while IFS= read -r backup_path; do
        [ -n "$backup_path" ] && rm -f -- "$backup_path"
    done
