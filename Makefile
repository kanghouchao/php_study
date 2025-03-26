.PHONY: up down build logs ps clean shell db-shell migrate rollback

# デフォルトターゲット
all: build up

# コンテナの起動
up:
	docker-compose up -d

# コンテナの停止
down:
	docker-compose down

# コンテナの再構築と起動
build:
	docker-compose up -d --build

# ログの表示
logs:
	docker-compose logs -f

# コンテナの状態確認
ps:
	docker-compose ps

# コンテナとボリュームの完全削除
clean:
	docker-compose down -v
	docker system prune -f

# Webコンテナへのシェルアクセス
shell:
	docker-compose exec web bash

# MySQLコンテナへのシェルアクセス
db-shell:
	docker-compose exec mysql mysql -u$${DB_USER} -p$${DB_PASS} demo

# データベースマイグレーションの実行
migrate:
	docker-compose exec web php vendor/bin/phinx migrate

# データベースマイグレーションのロールバック
rollback:
	docker-compose exec web php vendor/bin/phinx rollback

# 新しいマイグレーションの作成
migration:
	@read -p "マイグレーション名を入力してください: " name; \
	docker-compose exec web php vendor/bin/phinx create $$name

# ヘルプメッセージの表示
help:
	@echo "利用可能なコマンド:"
	@echo "  make up        - コンテナの起動"
	@echo "  make down      - コンテナの停止"
	@echo "  make build     - コンテナの再構築と起動"
	@echo "  make logs      - ログの表示"
	@echo "  make ps        - コンテナの状態確認"
	@echo "  make clean     - コンテナとボリュームの完全削除"
	@echo "  make shell     - Webコンテナへのシェルアクセス"
	@echo "  make db-shell  - MySQLコンテナへのシェルアクセス"
	@echo "  make migrate   - データベースマイグレーションの実行"
	@echo "  make rollback  - データベースマイグレーションのロールバック"
	@echo "  make migration - 新しいマイグレーションの作成"
	@echo "  make help      - このヘルプメッセージの表示" 