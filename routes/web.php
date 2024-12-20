<?php

$router->get('/', 'AuthController@login');
$router->post('/login', 'AuthController@handleLogin');
$router->get('/register', 'AuthController@register');
$router->get('/categories', 'CategoryController@index');
$router->post('/categories', 'CategoryController@store');
$router->get('/categories/create', 'CategoryController@create');
$router->get('/products', 'ProductController@index');
$router->get('/products/create', 'ProductController@create');
$router->post('/products', 'ProductController@store');