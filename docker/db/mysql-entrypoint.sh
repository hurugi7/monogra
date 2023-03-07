#!/bin/bash

# MySQLのルートパスワードをランダムに生成する
export MYSQL_ROOT_PASSWORD="$(pwgen -1 32)"

# Docker公式MySQLコンテナのエントリポイントスクリプトを実行する
/docker-entrypoint.sh mysqld
