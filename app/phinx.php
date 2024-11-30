<?php

return [
    'paths' => [
        'migrations' => '%%PHINX_CONFIG_DIR%%/db/migrations',
        'seeds' => '%%PHINX_CONFIG_DIR%%/db/seeds',
    ],
    'environments' => [
        'default_migration_table' => 'phinxlog',
        'default_environment' => 'development',
        'development' => [
            'adapter' => 'mysql',
            'host' => $_ENV['DB_HOST'] ?? 'db',
            'name' => $_ENV['DB_NAME'] ?? 'testdb',
            'user' => $_ENV['DB_USER'] ?? 'testuser',
            'pass' => $_ENV['DB_PASSWORD'] ?? 'testpassword',
            'port' => 3306,
            'charset' => 'utf8',
        ],
    ],
    'version_order' => 'creation'
];
