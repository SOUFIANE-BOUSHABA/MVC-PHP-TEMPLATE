<?php

$pdo =require __DIR__ . '/bootstrap.php';

$migrationsPath = __DIR__ . '/migrations';

foreach (glob("$migrationsPath/*.php") as $migrationFile) {

    require_once $migrationFile;


    $filenameToClassMap = [
        '001_create_users_table.php' => 'CreateUsersTable',
        '002_create_categories_table.php' => 'CreateCategoriesTable',
        '003_create_products_table.php' => 'CreateProductsTable',
    ];

    $filename = basename($migrationFile);
    if (isset($filenameToClassMap[$filename])) {
        $className = $filenameToClassMap[$filename];
        $migration = new $className($pdo);
        $migration->up();
        echo "Migrated: $className\n";
    } else {
        echo "No class mapping found for file: $filename\n";
    }
}
