# PHP The right ways

## to rewrite apache rules, please follow below steps:

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