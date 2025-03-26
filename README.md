# PHP待办事项清单

这是一个简单的PHP待办事项清单应用，适合PHP初学者学习。

## 功能特点

- 添加新的待办事项
- 查看所有待办事项
- 删除待办事项
- 显示创建时间

## 安装步骤

### 使用Docker（推荐）

1. 确保你的系统已安装Docker和Docker Compose
2. 在项目根目录下运行：
   ```bash
   docker-compose up -d
   ```
3. 访问：`http://localhost:8000`

### 手动安装

1. 确保你的系统已安装PHP和MySQL
2. 克隆或下载此项目到你的本地环境
3. 创建数据库：
   - 登录MySQL
   - 运行 `init.sql` 文件中的SQL语句
4. 配置数据库连接：
   - 打开 `config.php` 文件
   - 修改数据库连接信息（主机名、用户名、密码）
5. 启动PHP内置服务器：
   ```bash
   php -S localhost:8000
   ```
6. 在浏览器中访问：`http://localhost:8000`

## Docker相关命令

- 启动服务：
  ```bash
  docker-compose up -d
  ```

- 停止服务：
  ```bash
  docker-compose down
  ```

- 查看日志：
  ```bash
  docker-compose logs -f
  ```

- 重建服务：
  ```bash
  docker-compose up -d --build
  ```

## 学习要点

- PHP基础语法
- 表单处理
- PDO数据库操作
- 基本的CRUD操作
- HTML和CSS基础
- Bootstrap框架使用

## 技术栈

- PHP 8.2
- MySQL 8.0
- Apache
- Bootstrap 5
- PDO数据库连接
- Docker & Docker Compose 