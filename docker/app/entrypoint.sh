#!/bin/bash

# マイグレーションを実行する前にファイルが存在するかどうかを確認する
if [ ! $(php artisan migrate:status | grep -c "^\| Y ") -eq $(php artisan migrate:status | grep -c "^\| N ") ]; then
  cd var/www/html/laravelapp
  php artisan migrate --force
  touch /var/www/html/laravelapp/.migrated
fi

/usr/sbin/apache2ctl -D FOREGROUND
