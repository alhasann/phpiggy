<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;
use App\Config\Paths;


class HomeController
{

    private TemplateEngine $view;

    public function __construct()
    {
        $this->view = new TemplateEngine(Paths::VIEW);
    }

    // a function will be invoked by the router 
    public function home()
    {

        $this->view->render("/index.php");
        // dd($this->view);
        // echo "Home page"; // control are classes for rendering the page's content 
        // // common practise that developpers use the method as the page name 
    }
}
