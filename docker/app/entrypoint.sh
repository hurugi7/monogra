#!/bin/bash

chown -R apache:apache /var/run/php-fpm

php-fpm

# データベースを作成する
mysql -h $DB_HOST -u $DB_USER -p$DB_PASSWORD -e "CREATE DATABASE IF NOT EXISTS $DB_DATABASE"

# マイグレーションを実行する前にファイルが存在するかどうかを確認する
if [ ! -f /var/www/html/src/laravelapp/.migrated ]; then
  cd /var/www/html/src/laravelapp
  php artisan migrate --force
  touch /var/www/html/src/laravelapp/.migrated
fi
