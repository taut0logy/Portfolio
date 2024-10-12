#!/bin/bash

# Start MySQL service
service mysql start

# Wait for MySQL to fully start up
until mysqladmin ping >/dev/null 2>&1; do
  echo "Waiting for MySQL to start..."
  sleep 2
done

# Check if the database already exists and initialize only if necessary
if ! mysql -u root -e "USE PORTFOLIO_DB"; then
    echo "Initializing the PORTFOLIO_DB..."
    mysql -u root -e "CREATE DATABASE PORTFOLIO_DB;"
    mysql -u root -e "CREATE USER 'portfolio'@'localhost' IDENTIFIED BY 'ki_kortesi_kisui_jani_na';"
    mysql -u root -e "GRANT ALL PRIVILEGES ON PORTFOLIO_DB.* TO 'portfolio'@'localhost';"
    mysql -u root -e "FLUSH PRIVILEGES;"
    mysql -u root PORTFOLIO_DB < /var/www/html/database/portfolio_db.sql
else
    echo "Database PORTFOLIO_DB already exists."
fi

# Start PHP-FPM
service php7.4-fpm start

# Start Nginx in the foreground (to keep the container alive)
nginx -g 'daemon off;'
