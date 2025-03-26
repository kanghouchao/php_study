FROM php:8.2-apache

# PDO MySQL拡張機能のインストール
RUN docker-php-ext-install pdo pdo_mysql

# Apacheのrewriteモジュールを有効化
RUN a2enmod rewrite

# 作業ディレクトリの設定
WORKDIR /var/www/html

# プロジェクトファイルのコピー
COPY . /var/www/html/

# 適切な権限の設定
RUN chown -R www-data:www-data /var/www/html 