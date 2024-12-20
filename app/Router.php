<?php

namespace App;

class Router {
    private $routes = [];

    /**
     * Register a GET route
     */
    public function get($uri, $action) {
        $this->routes['GET'][$uri] = $action;
    }

    /**
     * Register a POST route
     */
    public function post($uri, $action) {
        $this->routes['POST'][$uri] = $action;
    }

    /**
     * Dispatch the current request
     */
    public function dispatch($uri) {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = strtok($uri, '?');

        if (isset($this->routes[$method][$uri])) {
            $action = $this->routes[$method][$uri];

            if (is_array($action) && count($action) === 2) {
                [$controller, $method] = $action;

                if (is_object($controller) && method_exists($controller, $method)) {
                    call_user_func([$controller, $method]);
                } else {
                    http_response_code(404);
                    echo "Method $method not found in the controller.";
                }
            } else {
                http_response_code(404);
                echo 'Invalid route action format.';
            }
        } else {
            http_response_code(404);
            echo '404 Not Found';
        }
    }
}
