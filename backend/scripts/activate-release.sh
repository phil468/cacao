#!/usr/bin/env bash
set -Eeuo pipefail
SHA="$1"; ARCHIVE="$2"; APP_URL="$3"; ROOT="$(cd "$(dirname "$0")/.." && pwd)"; RELEASE="$ROOT/releases/$SHA"; PREVIOUS="$(readlink "$ROOT/current" 2>/dev/null || true)"; BACKUP="$ROOT/backups/database-$SHA.sql"
rollback(){ if [ -n "$PREVIOUS" ]; then ln -sfn "$PREVIOUS" "$ROOT/current"; else rm -f "$ROOT/current"; fi; }
cleanup(){ rm -f "$ARCHIVE"; }
trap rollback ERR
trap cleanup EXIT
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
php artisan db:show >/dev/null; php artisan deploy:backup "$BACKUP"; php artisan migrate --force
rm -rf "$RELEASE/public/storage"
ln -s "../../../shared/storage/app/public" "$RELEASE/public/storage"
php artisan filament:assets; php artisan optimize
ln -sfn "releases/$SHA" "$ROOT/current"
PUBLIC_ROOT="$ROOT/../public_html"
if [ -d "$PUBLIC_ROOT" ]; then
    ln -sfn "../$(basename "$ROOT")/current/public" "$PUBLIC_ROOT/current"
fi
curl --fail --location --silent --show-error --max-time 30 \
    --retry 3 --retry-delay 2 \
    --header 'Cache-Control: no-cache' \
    "$APP_URL/up?release=$SHA" >/dev/null
trap - ERR
find "$ROOT/releases" -mindepth 1 -maxdepth 1 -type d | sort -r | tail -n +6 | xargs -r rm -rf
find "$ROOT/backups" -mindepth 1 -maxdepth 1 -type f -name 'database-*.sql' | sort -r | tail -n +11 | xargs -r rm -f
