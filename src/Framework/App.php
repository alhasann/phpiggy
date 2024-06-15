<?php

declare(strict_types=1);

namespace Framework;

/** 
 * app class 
 * router - validator - template - database - container 
 *(we have two kinds of files (configurating the system - related to the App)) 
 *app class into src (related to the app)
 *
 *****The main goal of this class is to connect different app's tools (like routers)

 */

class APP // (App + Router) 
{
    private Router $router;
    function __construct()
    {
        $this->router = new Router();
    }

    public function get(string $path, array $controller)
    {
        $this->router->add('GET', $path, $controller);  //filled routes array 
    }

    public function run() //swithc through routes array and return a class Homecontroller and a method 
    {

        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); // / 
        $method = $_SERVER['REQUEST_METHOD']; // GET
        $this->router->dispatch($path, $method); // will produce new HomeController and run the function within
    }
}
