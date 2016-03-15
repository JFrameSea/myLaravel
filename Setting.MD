# EC Project

    A B2B2C Platform

## Architecture

- PHP 5.5+
- MySQL 5.5
- Laravel 5.1

## VirtualHost Configuration

### Nginx
```
server {
    listen 80;

    root {project_folder}/src/www-web;
    index index.html index.htm index.php;

    server_name nickna.exchange.cn;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        try_files $uri =404;
        fastcgi_index index.php;
        #fastcgi_pass 127.0.0.1:9000;
        fastcgi_pass unix:/var/run/php5-fpm.sock;
        include fastcgi_params;
    }
}

server {
    listen 80;

    root {project_folder}/src/www-admin;
    index index.html index.htm index.php;

    server_name admin.exchange.cn;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        try_files $uri =404;
        fastcgi_index index.php;
        #fastcgi_pass 127.0.0.1:9000;
        fastcgi_pass unix:/var/run/php5-fpm.sock;
        include fastcgi_params;
    }
}
```

## Deploy

  - Set Database Config

    + .env.admin

       ```
        DB_HOST=localhost
        DB_DATABASE=ec
        DB_USERNAME=root
        DB_PASSWORD=
       ```

    + .env.web

  - Execute command

    + ```php deploy.php```
    + ```php artisan.admin acl:make```
