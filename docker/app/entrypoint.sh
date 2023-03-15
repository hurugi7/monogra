#!/bin/bash

cd var/www/html/laravelapp
composer install

# マイグレーションを実行する前にファイルが存在するかどうかを確認する
if [ ! $(php artisan migrate:status | grep -c "^\| Y ") -eq $(php artisan migrate:status | grep -c "^\| N ") ]; then
  php artisan migrate --force
  touch /var/www/html/laravelapp/.migrated
fi

/usr/sbin/apache2ctl -D FOREGROUND
