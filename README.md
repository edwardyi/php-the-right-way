# PHP The right ways

## Change Document Root For Apache

* modify the Dockerfile

```DockerFile=
FROM php:8-apache

ENV APACHE_DOCUMENT_ROOT /path/to/new/root

RUN a2enmod rewrite

# change document root
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# change apache rewrite rule
COPY ./apache2/sites-available/default.conf /etc/apache2/sites-available/000-default.conf
COPY ./apache2/apache2.conf /etc/apache2/apache2.conf
```

* pass environment variable APACHE_DOCUMENT_ROOT to override Docker Image's default setting

```yaml=
version: "3.8"

services:
  app:
    build: ./php
    volumes:
      - "./app:/app"
    working_dir: "/app"
    environment:
      - "APACHE_DOCUMENT_ROOT=/app/php_the_right_ways/apache/public"
    ports:
      - "8188:80"
    user: "1000:1000"
    tty: true
    stdin_open: true
```


## Rewrite apache rules, please follow below steps:

* enable a2enmod rewrite:
    * add run command to dockerFile
* rewrite rule can added to:
    * modify /${document_root}/.htaccess file in document root
    * modify /etc/apache2/sites-available/default.conf in server root(/etc/apache2)

```conf=
<IfModule mod_rewrite.c>
    RewriteEngine On

    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f

    RewriteRule ^ /index.php [L]
</IfModule>
```

### Reference

https://docs.boltcms.io/4.0/howto/making-sure-htaccess-works

https://www.youtube.com/watch?v=ytVPiYILz80&list=PLr3d3QYzkw2xabQRUpcZ_IBk9W50M9pe-&index=30