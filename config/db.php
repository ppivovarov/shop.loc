<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'pgsql:host=' . ($_ENV['POSTGRES_DB'] ?? 'localhost') . ';port=5432;dbname=' . ($_ENV['POSTGRES_DB'] ?? 'postgres'),
    'username' => $_ENV['POSTGRES_USER'] ?? 'postgres',
    'password' => $_ENV['POSTGRES_PASSWORD'] ?? '',
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
