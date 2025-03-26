<?php

return [
    'paths' => [
        'migrations' => 'src/Database/migrations',
        'seeds' => 'src/Database/seeds'
    ],
    'environments' => [
        'default_migration_table' => 'phinxlog',
        'default_environment' => 'development',
        'development' => [
            'adapter' => 'mysql',
            'host' => getenv('DB_HOST') ?: 'mysql',
            'name' => getenv('DB_NAME') ?: 'demo',
            'user' => getenv('DB_USER') ?: 'root',
            'pass' => getenv('DB_PASS') ?: '',
            'port' => '3306',
            'charset' => 'utf8mb4'
        ]
    ]
]; 