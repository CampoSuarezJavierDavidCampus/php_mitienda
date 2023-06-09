<?php
require_once('./vendor/autoload.php');
/* use Helpers\router\Router;
$method = $_SERVER['REQUEST_METHOD'];
$uri = explode('/',$_SERVER['REQUEST_URI']);
if(isset($uri[1]) && ($uri[1]==='delete' || $uri[1]==='edit')){
    $method = 'DELETE';
    if($uri != 'delete'){
        $method = 'PUT';
    }
}


$router = new Router(
    $method,
    $_SERVER['REQUEST_URI'],
);

echo $router->render();
 */

echo preg_match('/(ciudades\/delete\/\d+[^\D])/','ciudades/delete/11');
