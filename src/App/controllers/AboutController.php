<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;
use App\Config\Paths;

/**
 * Controller for handling the 'About' page.
 * 
 * This class manages the rendering of the About page, using the TemplateEngine for view rendering.
 */
class AboutController
{
    /**
     * @var TemplateEngine The template engine instance for rendering views.
     */
    private TemplateEngine $view;

    /**
     * AboutController constructor.
     * 
     * Initializes the template engine with the path to the views directory.
     */
    public function __construct()
    {
        $this->view = new TemplateEngine(Paths::VIEW);
    }

    /**
     * Renders the 'About' page.
     * 
     * This method renders the 'about.php' view with the specified data.
     */
    public function about()
    {
        echo $this->view->render('about.php', [
            'title' => 'About',
            'dangerousData' => "<script>alert(123)</script>"
        ]);
    }
}
