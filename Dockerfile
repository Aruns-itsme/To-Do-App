FROM php:7.4-apache

# Install required extensions
RUN docker-php-ext-install mysqli

# Copy your application files to the web server root directory
COPY . /var/www/html/

# Set the ServerName to localhost to remove warnings
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Expose port
ENV PORT 8080
EXPOSE 8080

# Modify the default port configuration to listen on the port provided by Render
RUN sed -i "s/Listen 80/Listen ${PORT}/" /etc/apache2/ports.conf

CMD ["apache2-foreground", "-DFOREGROUND"]
