FROM php:8.2-apache

# 安装PDO MySQL扩展
RUN docker-php-ext-install pdo pdo_mysql

# 启用Apache的rewrite模块
RUN a2enmod rewrite

# 设置工作目录
WORKDIR /var/www/html

# 复制项目文件
COPY . /var/www/html/

# 设置适当的权限
RUN chown -R www-data:www-data /var/www/html 