FROM php:8.3-fpm

# Atualização e instalação de dependências necessárias
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip && \
    docker-php-ext-install pdo_mysql mbstring exif bcmath gd && \
    apt-get clean && rm -rf /var/lib/apt/lists/*

# Permission for PHP to write in volumes
RUN usermod -u 1000 www-data

# Definição do diretório de trabalho
WORKDIR /var/www/html
