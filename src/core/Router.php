<?php

class Router
{
    private array $routes = [];

    public function get(string $path, string $view): void
    {
        $this->routes[$path] = $view;
    }

    public function resolve(string $uri): void
    {
        $path = parse_url($uri, PHP_URL_PATH);
        $path = ($path === '/' || $path === '') ? '/' : rtrim($path, '/');

        if (array_key_exists($path, $this->routes)) {
            $view = $this->routes[$path];
            require_once __DIR__ . '/../views/' . $view;
        } else {
            http_response_code(404);
            require_once __DIR__ . '/../views/404.php';
        }
    }
}
