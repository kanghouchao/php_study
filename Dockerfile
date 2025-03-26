# ビルドステージ
FROM composer:latest AS composer

# 作業ディレクトリの設定
WORKDIR /app

# プロジェクトファイルのコピー
COPY composer.json ./

# 依存関係のインストール
RUN composer install --no-dev --optimize-autoloader

# 本番環境ステージ
FROM php:8.2-apache AS production

# PDO MySQL拡張機能のインストール
RUN docker-php-ext-install pdo pdo_mysql

# Apacheのrewriteモジュールを有効化
RUN a2enmod rewrite

# 作業ディレクトリの設定
WORKDIR /var/www/html

# composerの依存関係をビルドステージからコピー
COPY --from=composer /app/vendor /var/www/html/vendor

# プロジェクトファイルのコピー
COPY . /var/www/html/

# 適切な権限の設定
RUN chown -R www-data:www-data /var/www/html

# Apacheの設定
COPY docker/apache.conf /etc/apache2/sites-available/000-default.conf

# データベースマイグレーション用のシェルスクリプト
COPY docker/entrypoint.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/entrypoint.sh

ENTRYPOINT ["entrypoint.sh"]
CMD ["apache2-foreground"] 