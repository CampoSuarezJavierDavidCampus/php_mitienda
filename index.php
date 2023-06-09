<?php
require_once('./vendor/autoload.php');
use Helpers\router\Router;
$method = $_SERVER['REQUEST_METHOD'];
$uri = explode('/',trim($_SERVER['REQUEST_URI'],'/'));
if(isset($uri[1]) && ($uri[1]==='delete' || $uri[1]==='edit')){
    $_GET['id'] = $uri[2];
    $method = 'DELETE';
    if($uri[1] != 'delete'){
        $method = 'PUT';
    }    
}
$router = new Router(
    $method,
    $_SERVER['REQUEST_URI'],
);

echo $router->render();

