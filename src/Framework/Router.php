<?php

declare(strict_types=1);

namespace Framework;

/**
 * Class router 
 * 
 * We want our to tool to be standalone 
 * one of the router tasks is normalize the path (make it with one format)
 */
class Router
{
    private array $routes = [];
    public function normalizePath(string $path): string
    {
        $path = trim($path, "/");
        $path = "/{$path}/";
        $path = preg_replace("#[/]{2,}#", "/", $path);
        return $path;
    }

    public function add(string $method, string $path, array $controller)
    {
        $path = $this->normalizePath($path);
        $this->routes[] = [
            'path' => $path,
            'method' => strtoupper($method),
            'controller' => $controller
        ];
    }
    public function dispatch(string $path, string $method) //dispatch word means (sending in case of sending data)
    {
        $path = $this->normalizePath($path);
        $method = strtoupper($method);
        echo $path . $method ; 
    }
}