<?php
namespace Helpers\router;
use Helpers\router\Router;
use App\clases\Route;
use Helpers\config\connectionString;
use App\Database;
use Controllers\ciudades\ciudadesController;
use Controllers\departamentos\departamentosController;
use Controllers\paises\paisesController;
abstract class Routes{    
    public static function add(Router &$router){
        $obj = new connectionString();
        $conn = new Database($obj->db);
        $conn = $conn->getConnection('db');
        $router->conn($conn);
        
        $router->add(new Route(
            'GET',
            function ($conn,$method){
                $controller =new ciudadesController($conn,$method);                
                return $controller->render();
            }
        ))->name('/\/(ciudades)/');
        $router->add(new Route(
            'DELETE',
            function ($conn,$method){
                $controller =new ciudadesController($conn,$method);                
                return $controller->render();
            }
        ))->name('/\/(ciudades\/delete\/)\d+$/');
        $router->add(new Route(
            'GET',
            function ($conn,$method){
                $controller =new ciudadesController($conn,$method);                
                return $controller->render();
            }
        ))->name('/ciudades/edit');
        $router->add(new Route(
            'GET',
            function ($conn,$method){
                $controller =new departamentosController($conn,$method);                
                return $controller->render();
            }
        ))->name('/departamentos');
        $router->add(new Route(
            'GET',
            function ($conn,$method){
                $controller =new paisesController($conn,$method);                
                return $controller->render();
            }
        ))->name('/paises');
    }    
}