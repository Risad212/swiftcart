<?php

namespace App;

use Closure;
use Exception;

class Routes
{

    private static $routes = [];
    private static $instance = null;

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function getRequest()
    {

        $method = strtoupper($_SERVER['REQUEST_METHOD']);

        switch ($method) {
            case 'POST':
                return $_POST;
            case 'GET':
                return $_GET;
        }
    }

    public static function get(string $path, Closure $callback)
    {
        self::$routes['GET'][$path] = $callback;
    }

    public static function post(string $path, Closure $callback)
    {
        self::$routes['POST'][$path] = $callback;
    }

    public function dispatch()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $subfolder = '/projects/php-project';

        // 1. Remove subfolder if it exists in the URI
        if (strpos($uri, $subfolder) === 0) {
            $uri = substr($uri, strlen($subfolder));
        }

        $path = '/' . trim($uri, '/');

        $request = $this->getRequest();

        // 3. Match against the cleaned path
        if (isset(self::$routes[$method][$path])) {
            $callback = self::$routes[$method][$path];
            echo $callback($request);
            exit;
        }

        http_response_code(404);
        echo "404 - Router could not find:";
        exit;
    }
}
