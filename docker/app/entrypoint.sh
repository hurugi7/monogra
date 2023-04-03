#!/bin/bash

cd /var/www/html/laravelapp
php artisan migrate --force

/usr/sbin/apache2ctl -D FOREGROUND
