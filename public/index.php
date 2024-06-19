<?php

/**
 * Handles all requests.
 * 
 * The main objective of this index file is to initialize our application. 
 * It should focus on setting up the application environment and shouldn't be responsible for loading or configuring other files directly.
 * Instead, it delegates those tasks to other components.
 * 
 * This script performs the following:
 * - Includes utility functions needed for the application.
 * - Includes and initializes the core application through the bootstrap process.
 * - Runs the initialized application to handle incoming requests.
 */

// Include the functions needed for the application.
include __DIR__ . "/../src/App/functions.php";

// Bootstrap the application by including and initializing the core application class.
// This brings in the necessary configurations and setups required for the application to run.
$app = include __DIR__ . "/../src/App/bootstrap.php";

// Run the application to process incoming requests and produce a response.
$app->run();
