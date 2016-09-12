vet-webapp-php-code-igniter
===========================

Veterinary Web App (Exploring Code Igniter) 
- A simple project that I made to explore Codeigniter Framework. 

XAMPP/xamppfiles/apache2/conf/httpd.conf

```
<Directory "/Applications/XAMPP/xamppfiles/apache2/htdocs">
    Options Indexes FollowSymLinks
    AllowOverride All
    Order allow,deny
    Allow from all
</Directory>
```

XAMPP/etc/extra/httpd-xampp.conf

```
<LocationMatch "^/(?i:(?:xampp|security|licenses|phpmyadmin|webalizer|server-status|server-info))">
        Order deny,allow
        Deny from all
        Allow from ::1 127.0.0.0/8 \
                fc00::/7 10.0.0.0/8 172.16.0.0/12 192.168.0.0/16 \
                fe80::/10 169.254.0.0/16

        ErrorDocument 403 /error/XAMPP_FORBIDDEN.html.var
</LocationMatch>
```



.htaccess file
```
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteBase /

    RewriteCond %{REQUEST_URI} ^system.*
    RewriteRule ^(.*)$ /index.php?/$1 [L]
    
    RewriteCond %{REQUEST_URI} ^application.*
    RewriteRule ^(.*)$ /index.php?/$1 [L]

    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule ^(.*)$ index.php?/$1 [L]
</IfModule> 
```


QUERY 

http://ellislab.com/codeigniter/user-guide/database/results.html
