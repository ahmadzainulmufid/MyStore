# Use an official PHP runtime as the base image
FROM php:7.4-apache

# Set the working directory in the container
WORKDIR /var/www/html/mystore

# Copy your PHP file into the container
COPY *.php .

# If your PHP file depends on additional files or directories, copy them as well
# COPY additional-files /var/www/html/additional-files

# Expose port 80 to the outside world
EXPOSE 8081

# Start Apache when the container launches
CMD ["apache2-foreground"]
