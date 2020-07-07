<?php

require_once("vendor/autoload.php");

use App\Classes\Router;

$router = new Router;

$router->callController();
