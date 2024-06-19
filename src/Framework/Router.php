<?php

declare(strict_types=1);

namespace Framework;

/**
 * The Router class.
 * 
 * This class is responsible for managing and dispatching routes in the application. It normalizes URL paths and matches them against registered routes to invoke the corresponding controllers.
 */
class Router
{
    /**
     * @var array The array of registered routes.
     */
    private array $routes = [];

    /**
     * Normalizes a given path.
     * 
     * This method ensures the path has a consistent format, with leading and trailing slashes, and removes duplicate slashes.
     * 
     * @param string $path The original URL path.
     * @return string The normalized path.
     */
    public function normalizePath(string $path): string
    {
        $path = trim($path, "/");
        $path = "/{$path}/";
        $path = preg_replace("#[/]{2,}#", "/", $path);
        return $path;
    }

    /**
     * Adds a route to the router.
     * 
     * This method registers a new route with the specified HTTP method, URL path, and controller action.
     * 
     * @param string $method The HTTP method (e.g., GET, POST) for the route.
     * @param string $path The URL path for the route.
     * @param array $controller The controller class and method to handle the route.
     */
    public function add(string $method, string $path, array $controller)
    {
        $path = $this->normalizePath($path);
        $this->routes[] = [
            'method' => strtoupper($method),
            'path' => $path,
            'controller' => $controller
        ];
    }

    /**
     * Dispatches a request to the appropriate route.
     * 
     * This method matches the given path and method against the registered routes and invokes the corresponding controller action.
     * 
     * @param string $path The URL path of the request.
     * @param string $method The HTTP method of the request.
     */
    public function dispatch(string $path, string $method)
    {
        $path = $this->normalizePath($path);
        $method = strtoupper($method);

        foreach ($this->routes as $route) {
            if (
                !preg_match("#^{$route['path']}$#", $path) ||
                $route['method'] !== $method
            ) {
                continue;
            }

            [$class, $function] = $route['controller'];
            $controllerInstance = new $class;
            $controllerInstance->{$function}();
        }
    }
}
