#!/bin/sh
# =============================================================================
# Docker entrypoint for CureMolecules Laravel Application
# Runs before the main CMD (supervisord)
# =============================================================================

set -e

echo "======================================================"
echo "  CureMolecules – Container Bootstrap"
echo "======================================================"

# ---------------------------------------------------------------------------
# 1. Ensure storage & cache directories exist with correct permissions
# ---------------------------------------------------------------------------
echo "[1/6] Setting up storage directories..."
mkdir -p \
    /var/www/html/storage/framework/sessions \
    /var/www/html/storage/framework/views \
    /var/www/html/storage/framework/cache \
    /var/www/html/storage/logs \
    /var/www/html/bootstrap/cache

chown -R www-data:www-data \
    /var/www/html/storage \
    /var/www/html/bootstrap/cache

chmod -R 775 \
    /var/www/html/storage \
    /var/www/html/bootstrap/cache

# ---------------------------------------------------------------------------
# 2. Generate APP_KEY if not already set
# ---------------------------------------------------------------------------
echo "[2/6] Checking APP_KEY..."
if [ -z "$APP_KEY" ] || [ "$APP_KEY" = "base64:" ]; then
    echo "  --> Generating new APP_KEY..."
    php /var/www/html/artisan key:generate --force
else
    echo "  --> APP_KEY already set, skipping."
fi

# ---------------------------------------------------------------------------
# 3. Wait for the database to be ready
# ---------------------------------------------------------------------------
echo "[3/6] Waiting for database (${DB_HOST:-db}:${DB_PORT:-3306})..."
MAX_TRIES=30
TRIES=0
until php -r "
    \$conn = @new mysqli(
        getenv('DB_HOST') ?: 'db',
        getenv('DB_USERNAME') ?: 'root',
        getenv('DB_PASSWORD') ?: '',
        getenv('DB_DATABASE') ?: 'curemolecules',
        (int)(getenv('DB_PORT') ?: 3306)
    );
    if (\$conn->connect_error) { exit(1); }
    exit(0);
" 2>/dev/null; do
    TRIES=$((TRIES + 1))
    if [ "$TRIES" -ge "$MAX_TRIES" ]; then
        echo "  ERROR: Database not reachable after ${MAX_TRIES} attempts. Aborting."
        exit 1
    fi
    echo "  --> Attempt ${TRIES}/${MAX_TRIES} – database not ready yet, retrying in 2s..."
    sleep 2
done
echo "  --> Database is ready!"

# ---------------------------------------------------------------------------
# 4. Run migrations
# ---------------------------------------------------------------------------
echo "[4/6] Running database migrations..."
php /var/www/html/artisan migrate --force --no-interaction

# ---------------------------------------------------------------------------
# 5. Cache configuration & routes (skip in debug/dev mode)
# ---------------------------------------------------------------------------
echo "[5/6] Caching config and routes..."
if [ "${APP_ENV:-local}" = "production" ]; then
    php /var/www/html/artisan config:cache
    php /var/www/html/artisan route:cache
    php /var/www/html/artisan view:cache
    echo "  --> Production caches built."
else
    php /var/www/html/artisan config:clear
    php /var/www/html/artisan route:clear
    php /var/www/html/artisan view:clear
    echo "  --> Dev mode: caches cleared."
fi

# ---------------------------------------------------------------------------
# 6. Ensure supervisor log dir exists
# ---------------------------------------------------------------------------
echo "[6/6] Preparing supervisor log directory..."
mkdir -p /var/log/supervisor

echo "======================================================"
echo "  Bootstrap complete – handing off to supervisord"
echo "======================================================"

exec "$@"
