<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;
use App\Config\Paths;

/**
 * Controller for handling the 'Home' page.
 * 
 * This class manages the rendering of the Home page, using the TemplateEngine for view rendering.
 */
class HomeController
{
    /**
     * @var TemplateEngine The template engine instance for rendering views.
     */
    private TemplateEngine $view;

    /**
     * HomeController constructor.
     * 
     * Initializes the template engine with the path to the views directory.
     */
    public function __construct()
    {
        $this->view = new TemplateEngine(Paths::VIEW);
    }

    /**
     * Renders the 'Home' page.
     * 
     * This method is invoked by the router to render the 'index.php' view with the specified data.
     */
    public function home()
    {
        echo $this->view->render("/index.php", [
            'title' => 'Home Page'
        ]);
    }

    /**
     * Renders the 'About' page.
     * 
     * This method renders the 'about.php' view with the specified data.
     */
    public function about()
    {
        echo $this->view->render("/about.php", [
            'title' => 'About'
        ]);
    }
}
