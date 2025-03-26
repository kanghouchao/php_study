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
2. プロジェクトのルートディレクトリで以下のコマンドを実行：
   ```bash
   docker-compose up -d
   ```
3. ブラウザでアクセス：`http://localhost:8000`

### 手動インストール

1. PHPとMySQLがインストールされていることを確認してください
2. プロジェクトをクローンまたはダウンロード
3. データベースの作成：
   - MySQLにログイン
   - `init.sql`ファイルのSQL文を実行
4. データベース接続の設定：
   - `config.php`ファイルを開く
   - データベース接続情報を編集（ホスト名、ユーザー名、パスワード）
5. PHPの組み込みサーバーを起動：
   ```bash
   php -S localhost:8000
   ```
6. ブラウザでアクセス：`http://localhost:8000`

## Docker関連コマンド

- サービスの起動：
  ```bash
  docker-compose up -d
  ```

- サービスの停止：
  ```bash
  docker-compose down
  ```

- ログの確認：
  ```bash
  docker-compose logs -f
  ```

- サービスの再構築：
  ```bash
  docker-compose up -d --build
  ```

## 学習ポイント

- PHPの基本構文
- フォーム処理
- PDOデータベース操作
- 基本的なCRUD操作
- HTMLとCSSの基礎
- Bootstrapフレームワークの使用

## 使用技術

- PHP 8.2
- MySQL 8.0
- Apache
- Bootstrap 5
- PDOデータベース接続
- Docker & Docker Compose 