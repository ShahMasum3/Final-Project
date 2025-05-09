FROM php:8.1-cli
WORKDIR /var/www/html
COPY . .
RUN apt-get update && apt-get install -y libzip-dev unzip && docker-php-ext-install mysqli
CMD ["php", "-S", "0.0.0.0:10000", "-t", "."]
