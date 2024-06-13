<?php

declare(strict_types=1);

namespace App\Controllers;

class HomeController
{

    // a function will be called by the router 
    public function home()
    {
        echo "Home page" ; // control are classes for rendering the page's content 
        // common practise that developpers use the method as the page name 
    }
}
