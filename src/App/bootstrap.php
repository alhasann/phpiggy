<?php

declare(strict_types=1);

/**
 * Bootstraps the application.
 * 
 * This file loads the necessary dependencies and configurations for the application.
 * It prepares the application for running but does not actually run it. The public directory files are responsible for invoking the `run` method.
 * 
 * @return \Framework\App The application instance after initialization and configuration.
 */

require __DIR__ . "/../../vendor/autoload.php";

use Framework\App;
use function App\Config\registerRoutes;

$app = new App(); // Once you instantiate App, a new instance of Router is issued.

registerRoutes($app);

return $app;
