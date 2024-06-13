<?php

/**
 * handling all requests 
 * 
 * the main objective of index in app is initializing of our application 
 * shouldn't have to worry about loading files. 
 * it is not resonsible for configuring our framework or preparing other files. 
 * 
 */
include __DIR__."/../src/App/functions.php"; 
$app = include __DIR__ . "/../src/App/bootstrap.php";  // app into Framework - bootstrap.php bring the class and return it to $app var. we took it from bootstrap.php
$app->run();


