#!/bin/bash

echo "Starting entrypoint script..."

# マイグレーションの実行
echo "Running database migrations..."
php vendor/bin/phinx migrate -e development
echo "Migrations completed!"

# Apacheの起動
echo "Starting Apache..."
exec "$@" 