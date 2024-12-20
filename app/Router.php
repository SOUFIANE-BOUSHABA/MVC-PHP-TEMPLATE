<?php

namespace App;

class Router {
    private $routes = [];

    public function get($uri, $action) {
        $this->routes['GET'][$uri] = $action;
    }

    public function post($uri, $action) {
        $this->routes['POST'][$uri] = $action;
    }

    public function dispatch($uri) {

        $method = $_SERVER['REQUEST_METHOD'];
        $uri = strtok($uri, '?');

        if (isset($this->routes[$method][$uri])) {
            [$controller, $method] = explode('@', $this->routes[$method][$uri]);
            $controller = "App\\Controllers\\$controller";
            (new $controller)->$method();
        } else {
            http_response_code(404);
            echo '404 Not Found';
        }
    }
}
