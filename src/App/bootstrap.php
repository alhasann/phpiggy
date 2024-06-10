<?php

declare(strict_types=1);

/**
 * load other files and configuring the project 
 * 
 * Preparing other files. 
 * 
 * we won't call run method or any method because it is the responsibility of public dir's files. 
 * 
 * @param $app App the application class of my MVC. 
 */

require __DIR__."/../../vendor/autoload.php" ;  // require throw fatal error in case the file was not existed. 

use Framework\APP;

$app = new App();
return $app;