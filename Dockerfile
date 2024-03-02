FROM php:8.2-fpm

# Copia composer.lock e composer.json
#COPY composer.lock composer.json /var/www/html/

# Define o diretório de trabalho
WORKDIR /var/www

# Instala as dependências
RUN apt-get update && apt-get install -y \
    libzip-dev \
    libjpeg-dev \
    libpng-dev \
    build-essential \
    libfreetype6-dev \
    locales \
    libonig-dev \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    redis-server

# Limpa o cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Instala as extensões
RUN docker-php-ext-install mysqli pdo pdo_mysql mbstring zip exif pcntl

# Instala e configura a extensão GD
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install -j$(nproc) gd

# Instala e habilita a extensão Redis
RUN pecl install redis && docker-php-ext-enable redis

# Instala o Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Adiciona um usuário para a aplicação Laravel
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

# Copia o conteúdo do diretório da aplicação existente
COPY . /var/www

# Define as permissões do diretório da aplicação
RUN chown -R www:www /var/www

# Remove as pastas Nginx e PHP
#RUN rm -rf /var/www/nginx /var/www/php /var/www/Dockerfile /var/www/docker-compose.yml

# Altera o usuário atual para www
USER www

# Expõe a porta 9000 e inicia o servidor php-fpm
EXPOSE 9000
CMD ["php-fpm"]
