<?php

require 'app/lib/Dev.php';
use app\core\Router;
use app\lib\DB;

spl_autoload_register(function ($class) {
    $path = str_replace('\\', '/', $class.'.php');
    if(file_exists($path)) {
      require $path;
    }
    // include 'classes/' . $class . '.class.php';
});

session_start();

$router = new Router;

$router->run();
