# PHPタスクリスト

これはPHP初心者向けのシンプルなタスクリストアプリケーションです。

## 主な機能

- 新しいタスクの追加
- すべてのタスクの表示
- タスクの削除
- 作成時間の表示

## インストール手順

### Dockerを使用する場合（推奨）

1. DockerとDocker Composeがインストールされていることを確認してください
2. 環境設定：
   ```bash
   # .env.exampleをコピーして.envを作成
   cp .env.example .env
   
   # .envファイルを編集し、データベースのユーザー名とパスワードを設定
   ```

3. プロジェクトの起動：
   ```bash
   # コンテナの構築と起動
   make build

   # または個別に実行
   make up
   ```

4. ブラウザでアクセス：`http://localhost:80`

### 便利なコマンド

プロジェクトには便利なMakefileコマンドが用意されています：

```bash
# ヘルプメッセージの表示
make help

# コンテナの状態確認
make ps

# ログの表示
make logs

# Webコンテナへのシェルアクセス
make shell

# MySQLコンテナへのシェルアクセス
make db-shell

# データベースマイグレーション
make migrate
make rollback
make migration

# コンテナの停止
make down

# コンテナとボリュームの完全削除
make clean
```

### 注意事項
- MySQLのrootパスワードは自動的にランダムに生成されます
- アプリケーションは指定されたDB_USERで動作し、rootユーザーは使用しません
- データベースのバックアップや管理が必要な場合は、別途rootパスワードを設定してください

### データベースマイグレーション

このプロジェクトでは、Phinxを使用してデータベースのマイグレーションを管理しています。

- マイグレーションファイルは `src/Database/migrations` ディレクトリに配置します
- 新しいマイグレーションを作成する場合：
  ```bash
  make migration
  ```
- マイグレーションの実行：
  ```bash
  make migrate
  ```
- マイグレーションのロールバック：
  ```bash
  make rollback
  ```

### 手動インストール

1. PHPとMySQLがインストールされていることを確認してください
2. プロジェクトをクローンまたはダウンロード
3. 依存関係のインストール：
   ```bash
   composer install
   ```
4. データベースマイグレーションの実行：
   ```bash
   php vendor/bin/phinx migrate
   ```
5. PHPの組み込みサーバーを起動：
   ```bash
   php -S localhost:8000
   ```
6. ブラウザでアクセス：`http://localhost:8000`

## 学習ポイント

- PHPの基本構文
- フォーム処理
- PDOデータベース操作
- 基本的なCRUD操作
- HTMLとCSSの基礎
- Bootstrapフレームワークの使用
- データベースマイグレーション

## 使用技術

- PHP 8.2
- MySQL 8.0
- Apache
- Bootstrap 5
- PDOデータベース接続
- Docker & Docker Compose
- Phinx (データベースマイグレーション)
- Make 