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
            'method' => strtoupper($method),
            'path' => $path,
            'controller' => $controller
        ]; /*after passing to App class then Bootstrap
         $routes = 
         ['method'=>'get'
         ,'path'=>'/',
         'controller'=> ['HomeController','home'] ] */
    }
    public function dispatch(string $path, string $method)
    //dispatch word means (sending in case of sending data)
    // from App: $this->router->dispatch($path, $method);    
    //$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);  / 
    //from App $method = $_SERVER['REQUEST_METHOD']; GET
    {
        $path = $this->normalizePath($path);
        $method = strtoupper($method);
        // echo $path . $method;
        // echo "<hr>";
        //finding matches with regx 

        foreach ($this->routes as $route) {
            if (
                !preg_match("#^{$route['path']}$#", $path) ||
                $route['method'] /*function request */  !== $method /*server request */
            ) {
                continue;
            }
            // echo "Route Found!" ;
            [$class, $function] = $route['controller']; // the controller first store the class name second store the method name [home()] 
            $controllerInstance = new $class;
            $controllerInstance->{$function}();
        }
    }
}
