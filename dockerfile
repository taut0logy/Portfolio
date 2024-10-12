FROM ubuntu:24.04

# Set noninteractive frontend for apt-get
RUN DEBIAN_FRONTEND=noninteractive apt-get update && apt-get install -y \
    software-properties-common \
    nginx \
    mysql-server \
    && add-apt-repository ppa:ondrej/php \
    && apt-get update && apt-get install -y \
    php7.4-fpm \
    php7.4-pdo \
    php7.4-mysql \
    php7.4-curl \
    php7.4-gd \
    php7.4-fileinfo \
    php7.4-mbstring \
    php7.4-soap \
    php7.4-xml \
    php7.4-xmlrpc \
    php7.4-zip \
    php7.4-cli

# Copy Nginx configuration
COPY ./server/nginx.conf /etc/nginx/sites-available/default

# Remove default Nginx index.html
RUN rm -rf /var/www/html/*

# Copy project files
COPY . /var/www/html/

# Give permission to project files
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 775 /var/www/html

# Expose ports
EXPOSE 80
EXPOSE 3306

# Create an entrypoint script to handle service management
COPY ./server/entrypoint.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/entrypoint.sh

# Set the entrypoint script
ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]
