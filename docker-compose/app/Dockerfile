FROM php:fpm

# Arguments defined in docker-compose.yml
ARG user
ARG uid
RUN echo $(id -u)
# # Install system dependencies
# RUN apt-get update && apt-get install -y \
#     autoconf \
#     build-essential \
#     git \
#     curl \
#     libpng-dev \
#     libjpeg-dev \
#     libonig-dev \
#     libxml2-dev \
#     libpq-dev \
#     libzip-dev \
#     libmagick++-dev \
#     libmagickwand-dev \
#     libfreetype6-dev \
#     libjpeg62-turbo-dev \
#     zip \
#     unzip \
#     zlib1g-dev \
#     libmcrypt-dev \
#     libpng-dev \
#     libzip-dev \
#     libsodium-dev

# # Clear cache
# RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# # Configurando a extensão do GD
# RUN docker-php-ext-configure gd --with-freetype --with-jpeg=/usr/include/ --enable-gd

# # Install PHP extensions
# RUN docker-php-ext-install pdo pdo_pgsql pgsql mbstring xml exif pcntl bcmath gd zip sodium intl

# # Get latest Composer
# COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install Node LTS and NPM
# COPY --from=node:lts-slim /usr/local/lib /usr/local/lib
# COPY --from=node:lts-slim /usr/local/bin /usr/local/bin

# Install YARN
# RUN rm  /usr/local/bin/yarn*
# RUN npm install -g yarn

# Create system user to run Composer and Artisan Commands
RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

# Set working directory
WORKDIR /var/www

USER $user
