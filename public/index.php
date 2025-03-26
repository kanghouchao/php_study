<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Config\Database;
use App\Controllers\TaskController;

// データベース接続の初期化
$db = new Database();

// ルーティング
$controller = new TaskController($db->getConnection());

// リクエストの処理
$method = $_SERVER['REQUEST_METHOD'];
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($method) {
    case 'GET':
        if ($path === '/') {
            $controller->index();
        }
        break;
        
    case 'POST':
        if ($path === '/tasks') {
            $controller->create();
        }
        break;
        
    case 'DELETE':
        if (preg_match('/^\/tasks\/(\d+)$/', $path, $matches)) {
            $controller->delete($matches[1]);
        }
        break;
        
    default:
        header('HTTP/1.1 405 Method Not Allowed');
        echo 'Method Not Allowed';
        break;
} 