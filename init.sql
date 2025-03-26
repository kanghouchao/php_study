-- データベースの作成
CREATE DATABASE IF NOT EXISTS todo_app;
USE todo_app;

-- タスクテーブルの作成
CREATE TABLE IF NOT EXISTS tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    task VARCHAR(255) NOT NULL,
    created_at DATETIME NOT NULL,
    completed BOOLEAN DEFAULT FALSE
); 