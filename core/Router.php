<?php

namespace core;

class Router
{
    private array $routes = [];

    public function get(string $path, callable|array $callback, bool $auth = false): void
    {
        $this->addRoute('GET', $path, $callback, $auth);
    }

    public function post(string $path, callable|array $callback, bool $auth = false): void
    {
        $this->addRoute('POST', $path, $callback, $auth);
    }

    private function addRoute(string $method, string $path, callable|array $callback, bool $auth): void
    {
        $pattern = preg_replace('#\{([^}]+)\}#', '([^/]+)', $path);
        $pattern = "#^$pattern$#";
        $this->routes[$method][] = [
            'pattern' => $pattern,
            'callback' => $callback,
            'auth' => $auth
        ];
    }

    public function resolve(): mixed
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $path = explode('?', $_SERVER['REQUEST_URI'] ?? '/')[0];

        foreach ($this->routes[$method] ?? [] as $route) {
            if (preg_match($route['pattern'], $path, $matches)) {
                array_shift($matches);
                $callback = $route['callback'];

                if ($route['auth'] && empty($_SESSION['user'])) {
                    header('Location: /login');
                    exit;
                }

                if (is_array($callback)) {
                    [$class, $method] = $callback;
                    $controller = new $class();
                    return $controller->$method(...$matches);
                }

                return $callback(...$matches);
            }
        }

        http_response_code(404);

        return "404 Not Found";
    }
}
