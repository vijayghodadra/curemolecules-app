#!/bin/sh
# =============================================================================
# Docker entrypoint for CureMolecules Laravel Application
# Works on both local Docker Compose AND Render / cloud deployments
# =============================================================================

set -e

echo "======================================================"
echo "  CureMolecules – Container Bootstrap"
echo "======================================================"

# ---------------------------------------------------------------------------
# 1. Ensure storage & cache directories exist with correct permissions
# ---------------------------------------------------------------------------
echo "[1/5] Setting up storage directories..."
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
echo "[2/5] Checking APP_KEY..."
if [ -z "$APP_KEY" ] || [ "$APP_KEY" = "base64:" ]; then
    echo "  --> Generating new APP_KEY..."
    php /var/www/html/artisan key:generate --force
else
    echo "  --> APP_KEY already set, skipping."
fi

# ---------------------------------------------------------------------------
# 3. Database readiness check (OPTIONAL – skips gracefully if unavailable)
# ---------------------------------------------------------------------------
echo "[3/5] Checking database connectivity..."

DB_READY=false

# Skip DB check if host is localhost/127.0.0.1 and we're NOT in docker-compose
if [ "${DB_HOST:-127.0.0.1}" = "127.0.0.1" ] || [ "${DB_HOST:-localhost}" = "localhost" ]; then
    # Check if there's actually a local MySQL running (docker-compose scenario)
    if php -r "
        @\$conn = new mysqli('127.0.0.1', getenv('DB_USERNAME') ?: 'root', getenv('DB_PASSWORD') ?: '', getenv('DB_DATABASE') ?: 'curemolecules', (int)(getenv('DB_PORT') ?: 3306));
        if (\$conn->connect_error) { exit(1); }
        exit(0);
    " 2>/dev/null; then
        DB_READY=true
        echo "  --> Local database is ready!"
    else
        echo "  --> No local database found (DB_HOST=127.0.0.1). Skipping DB setup."
        echo "  --> Set DB_HOST to your external database host in Render environment variables."
    fi
else
    # External database host – wait for it
    echo "  --> Waiting for external database (${DB_HOST}:${DB_PORT:-3306})..."
    MAX_TRIES=15
    TRIES=0
    until php -r "
        \$dsn = (getenv('DB_CONNECTION') ?: 'mysql') === 'pgsql'
            ? 'pgsql:host=' . (getenv('DB_HOST') ?: 'db') . ';port=' . (getenv('DB_PORT') ?: 5432) . ';dbname=' . (getenv('DB_DATABASE') ?: 'curemolecules')
            : 'mysql:host=' . (getenv('DB_HOST') ?: 'db') . ';port=' . (getenv('DB_PORT') ?: 3306) . ';dbname=' . (getenv('DB_DATABASE') ?: 'curemolecules');
        try {
            new PDO(\$dsn, getenv('DB_USERNAME') ?: 'root', getenv('DB_PASSWORD') ?: '');
            exit(0);
        } catch (Exception \$e) {
            exit(1);
        }
    " 2>/dev/null; do
        TRIES=$((TRIES + 1))
        if [ "$TRIES" -ge "$MAX_TRIES" ]; then
            echo "  WARNING: Database not reachable after ${MAX_TRIES} attempts."
            echo "  --> Starting app WITHOUT database migrations."
            break
        fi
        echo "  --> Attempt ${TRIES}/${MAX_TRIES} – retrying in 3s..."
        sleep 3
    done

    if [ "$TRIES" -lt "$MAX_TRIES" ]; then
        DB_READY=true
        echo "  --> Database is ready!"
    fi
fi

# ---------------------------------------------------------------------------
# 4. Run migrations (only if DB is available)
# ---------------------------------------------------------------------------
echo "[4/5] Database migrations..."
if [ "$DB_READY" = true ]; then
    php /var/www/html/artisan migrate --force --no-interaction || {
        echo "  WARNING: Migrations failed, but continuing startup."
    }
else
    echo "  --> Skipped (no database connection)."
fi

# ---------------------------------------------------------------------------
# 5. Cache configuration & routes
# ---------------------------------------------------------------------------
echo "[5/5] Caching config and routes..."
if [ "${APP_ENV:-local}" = "production" ]; then
    php /var/www/html/artisan config:cache || true
    php /var/www/html/artisan route:cache || true
    php /var/www/html/artisan view:cache || true
    echo "  --> Production caches built."
else
    php /var/www/html/artisan config:clear || true
    php /var/www/html/artisan route:clear || true
    php /var/www/html/artisan view:clear || true
    echo "  --> Dev mode: caches cleared."
fi

# ---------------------------------------------------------------------------
# Ensure supervisor log dir exists
# ---------------------------------------------------------------------------
mkdir -p /var/log/supervisor

echo "======================================================"
echo "  Bootstrap complete – handing off to supervisord"
echo "======================================================"

exec "$@"
