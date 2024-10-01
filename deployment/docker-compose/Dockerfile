FROM php:8.2-fpm

RUN rm -rf /var/lib/apt/lists/*
# 创建阿里云源配置
RUN echo "deb http://mirrors.aliyun.com/debian/ bookworm main contrib non-free-firmware" >> /etc/apt/sources.list.d/aliyun.list && \
    echo "deb http://mirrors.aliyun.com/debian/ bookworm-updates main contrib non-free-firmware" >> /etc/apt/sources.list.d/aliyun.list && \
    echo "deb http://mirrors.aliyun.com/debian-security/ bookworm-security main contrib non-free-firmware" >> /etc/apt/sources.list.d/aliyun.list

RUN apt-get update && apt-get install -y \
		libfreetype-dev \
		libzip-dev \
		libjpeg62-turbo-dev \
		libpng-dev \
        libbrotli-dev \
        build-essential \
        pkg-config \
        libpcre3-dev \
        libssl-dev \
        libcurl4-openssl-dev \
	&& docker-php-ext-configure gd --with-freetype --with-jpeg \
	&& docker-php-ext-install -j$(nproc) gd
RUN docker-php-ext-install zip
RUN pecl install redis && docker-php-ext-enable redis
RUN apt-get install -y wget && wget https://mirrors.aliyun.com/composer/composer.phar && mv composer.phar /usr/bin/composer && chmod u+x /usr/bin/composer
RUN docker-php-ext-install mysqli pdo pdo_mysql bcmath pcntl
RUN pecl install swoole
RUN echo "extension=swoole" >> /usr/local/etc/php/conf.d/docker-php-ext-sodium.ini

RUN echo "post_max_size = 500M" >> /usr/local/etc/php/conf.d/docker-php-ext-bcmath.ini \
    && echo "upload_max_filesize = 500M" >> /usr/local/etc/php/conf.d/docker-php-ext-bcmath.ini

WORKDIR /var/www/html

COPY ../../../../../ /var/www/html
# 可选
#RUN composer config -g repo.packagist composer https://mirrors.aliyun.com/composer/
# 可选
#RUN composer install
