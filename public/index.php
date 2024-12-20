<?php

require_once __DIR__ . '/../bootstrap.php';

use App\Router;

$router = new Router();


require_once __DIR__ . '/../routes/web.php';

$router->dispatch($_SERVER['REQUEST_URI']);