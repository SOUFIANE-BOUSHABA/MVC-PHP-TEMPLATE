<?php

$pdo = require_once __DIR__ . '/../bootstrap.php';

use App\Router;
use App\Controllers\AuthController;
use App\Controllers\CategoryController;
use App\Controllers\ProductController;


$router = new Router();

$authController = new AuthController($pdo);
$categoryController = new CategoryController($pdo);
$productController = new ProductController($pdo);

require_once __DIR__ . '/../routes/web.php';

$router->dispatch($_SERVER['REQUEST_URI']);