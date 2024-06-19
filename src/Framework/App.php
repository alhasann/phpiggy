<?php

declare(strict_types=1);

namespace Framework;

/**
 * The main application class.
 * 
 * This class is responsible for initializing the application's components such as the router.
 * It serves as the central point of the application, connecting different tools like routers, templates, etc.
 * 
 * The main goal of this class is to dispatch incoming requests to the appropriate controller actions.
 */
class App
{
    /**
     * @var Router The router instance used for managing routes and dispatching requests.
     */
    private Router $router;

    /**
     * App constructor.
     * 
     * Initializes the router.
     */
    function __construct()
    {
        $this->router = new Router();
    }

    /**
     * Registers a GET route with the application.
     * 
     * This method adds a new route to the router for handling GET requests.
     * 
     * @param string $path The URL path for the route.
     * @param array $controller The controller class and method to handle the route.
     */
    public function get(string $path, array $controller)
    {
        $this->router->add('GET', $path, $controller);
    }

    /**
     * Runs the application.
     * 
     * This method dispatches the incoming request to the appropriate controller based on the route configuration.
     */
    public function run()
    {
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];
        $this->router->dispatch($path, $method);
    }
}
