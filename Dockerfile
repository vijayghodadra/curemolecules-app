# =============================================================================
# Stage 1: Composer dependencies
# =============================================================================
FROM composer:2.7 AS composer

WORKDIR /app

# Copy only files needed for dependency resolution first (better layer caching)
COPY composer.json composer.lock ./

# Install production dependencies only (skip dev & scripts)
RUN composer install \
    --no-dev \
    --no-interaction \
    --no-progress \
    --no-scripts \
    --optimize-autoloader \
    --ignore-platform-reqs

# =============================================================================
# Stage 2: Final production image
# =============================================================================
FROM php:8.2-fpm-alpine

LABEL maintainer="DevSeas Global <hello@devseas.com>"
LABEL description="CureMolecules Laravel Application"

# ---------------------------------------------------------------------------
# System dependencies & PHP extensions
# ---------------------------------------------------------------------------
RUN apk add --no-cache \
    nginx \
    supervisor \
    curl \
    zip \
    unzip \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    libzip-dev \
    icu-dev \
    oniguruma-dev \
    libpq-dev \
    postgresql-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install \
        pdo \
        pdo_mysql \
        pdo_pgsql \
        gd \
        zip \
        intl \
        mbstring \
        bcmath \
        opcache \
    && rm -rf /var/cache/apk/*

# ---------------------------------------------------------------------------
# Copy Composer-installed vendor directory from Stage 1
# ---------------------------------------------------------------------------
WORKDIR /var/www/html

COPY --from=composer /app/vendor ./vendor

# Copy the rest of the application
COPY . .

# ---------------------------------------------------------------------------
# PHP / OPcache configuration
# ---------------------------------------------------------------------------
COPY docker/php/php.ini /usr/local/etc/php/conf.d/custom.ini
COPY docker/php/opcache.ini /usr/local/etc/php/conf.d/opcache.ini

# ---------------------------------------------------------------------------
# Nginx configuration
# ---------------------------------------------------------------------------
COPY docker/nginx/nginx.conf /etc/nginx/nginx.conf
COPY docker/nginx/default.conf /etc/nginx/http.d/default.conf

# ---------------------------------------------------------------------------
# Supervisor (manages nginx + php-fpm together in one container)
# ---------------------------------------------------------------------------
COPY docker/supervisor/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# ---------------------------------------------------------------------------
# Permissions & storage bootstrap
# ---------------------------------------------------------------------------
RUN mkdir -p storage/framework/{sessions,views,cache} \
              bootstrap/cache \
    && chown -R www-data:www-data /var/www/html \
    && chmod -R 775 storage bootstrap/cache

# ---------------------------------------------------------------------------
# Entrypoint script
# ---------------------------------------------------------------------------
COPY docker/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

# ---------------------------------------------------------------------------
# Default Production Environment (can be overridden by Render)
# ---------------------------------------------------------------------------
ENV APP_ENV=production
ENV APP_DEBUG=false
ENV LOG_CHANNEL=stderr
ENV DB_CONNECTION=pgsql
ENV SESSION_DRIVER=cookie
ENV CACHE_STORE=file

# ---------------------------------------------------------------------------
# Expose port & start
# ---------------------------------------------------------------------------
EXPOSE 80

ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
