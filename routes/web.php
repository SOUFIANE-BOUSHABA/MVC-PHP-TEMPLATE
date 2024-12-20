<?php

$router->get('/', [$authController, 'login']);
$router->post('/login', [$authController, 'handleLogin']);
$router->get('/register', [$authController, 'register']);
$router->post('/register', [$authController, 'handleRegister']);

$router->get('/categories', [$categoryController, 'index']);
$router->get('/categories/create', [$categoryController, 'create']);
$router->post('/categories', [$categoryController, 'store']);

$router->get('/products', [$productController, 'index']);
$router->get('/products/create', [$productController, 'create']);
$router->post('/products', [$productController, 'store']);