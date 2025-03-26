<?php
header('Content-Type: application/json');

try {
    // データベース接続の確認
    $dsn = "mysql:host=" . getenv('DB_HOST') . ";dbname=" . getenv('DB_NAME');
    $pdo = new PDO($dsn, getenv('DB_USER'), getenv('DB_PASS'));
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // データベース接続が正常か確認
    $pdo->query("SELECT 1");
    
    echo json_encode([
        'status' => 'healthy',
        'database' => 'connected',
        'timestamp' => date('Y-m-d H:i:s')
    ]);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'status' => 'unhealthy',
        'error' => $e->getMessage(),
        'timestamp' => date('Y-m-d H:i:s')
    ]);
} 