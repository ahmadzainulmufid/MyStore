# Gunakan image resmi PHP
FROM php:7.4-apache

# Salin seluruh konten proyek ke dalam direktori htdocs di dalam container Apache
COPY . /var/www/html/

# Port yang akan diexpose oleh container
EXPOSE 80

# Perintah yang dijalankan saat container dimulai
CMD ["apache2-foreground"]
