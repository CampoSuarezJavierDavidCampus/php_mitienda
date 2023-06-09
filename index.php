<?php
require_once('./vendor/autoload.php');
use Helpers\router\Router;
if(str_s)
$router = new Router(
    $_SERVER['REQUEST_METHOD'],
    $_SERVER['REQUEST_URI'],
);

echo $router->render();


