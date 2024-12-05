# Base image
FROM hyperf/hyperf:8.3-alpine-v3.19-swoole
LABEL maintainer="Hyperf Developers <group@hyperf.io>" version="1.0" license="MIT" app.name="Hyperf"

## ---------- Environment Variables ----------
ARG timezone=Asia/Shanghai

ENV TIMEZONE=${timezone} \
    APP_ENV=prod \
    SCAN_CACHEABLE=true

## ---------- Install Dependencies ----------
RUN set -ex \
    # Show PHP version and extensions
    && php -v \
    && php -m \
    && php --ri swoole \
    # Configure PHP settings
    && cd /etc/php* \
    && { \
        echo "upload_max_filesize=128M"; \
        echo "post_max_size=128M"; \
        echo "memory_limit=1G"; \
        echo "date.timezone=${TIMEZONE}"; \
    } | tee conf.d/99_overrides.ini \
    # Set timezone
    && ln -sf /usr/share/zoneinfo/${TIMEZONE} /etc/localtime \
    && echo "${TIMEZONE}" > /etc/timezone \
    # Install required PHP extensions and dependencies
    && apk add --no-cache php-redis \
    && rm -rf /var/cache/apk/* /tmp/* /usr/share/man \
    && mkdir -p /opt/www \
    && echo -e "\033[42;37m Build Completed :).\033[0m\n"

## ---------- Working Directory ----------
WORKDIR /opt/www

## ---------- Copy Application Files ----------
COPY ./ /opt/www/

## ---------- Composer Installation ----------
RUN curl -sS https://getcomposer.org/installer | php \
    && php composer.phar install --no-dev -o

## ---------- Expose Ports ----------
EXPOSE 9501

## ---------- Migrate Both Databases ----------
# This script will migrate both production and testing databases when the container is built.
RUN set -ex \
    && if [ "$APP_ENV" = "production" ]; then \
        php bin/hyperf.php migrate:fresh --force; \
    else \
        php bin/hyperf.php migrate:fresh --env=testing --force; \
    fi

## ---------- Run the Hyperf Application ----------
CMD ["php", "bin/hyperf.php", "start"]
