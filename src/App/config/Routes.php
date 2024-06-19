<?php

declare(strict_types=1);

namespace App\Config;

use Framework\App;
use App\Controllers\HomeController;
use App\Controllers\AboutController;

/**
 * Registers the routes for the application.
 * 
 * This function sets up the routes by binding URL paths to controller actions.
 * 
 * @param App $app The application instance where routes will be registered.
 */
function registerRoutes(App $app)
{
    $app->get('/', [HomeController::class, 'home']);
    $app->get('/about', [AboutController::class, 'about']);
}
