<?php

namespace Foundation\Request;

use Config\ModulConfig;
use Foundation\Utils\D;

class Router
{
    private array $routes = [];

    public function __construct()
    {
        foreach (ModulConfig::getModule() as $modul) {
            require_once SRC . DS . 'app' . DS . $modul . DS . 'routes.php';
        }
    }

    private function add(string $pattern, string $handler, string $method, array $middleware = []): void
    {
        $pattern = preg_replace('/:([\w-]+)/', '(?<$1>[\w-]+)', $pattern);
        $this->routes[] = [
            'pattern' => "#^$pattern$#",
            'handler' => $handler,
            'method' => $method,
            'middleware' => $middleware
        ];
    }

    public function route(): void
    {
        D::dnd($this->routes);
    }
    public static function go($location): void
    {
        header('Location: https://' . URL . $location);
        exit();
    }

}