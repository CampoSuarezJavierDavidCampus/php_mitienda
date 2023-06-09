<?php
namespace Helpers\router;
use Helpers\router\Routes;
use App\clases\Route;


class Router{
    private array $routes = [];
    private ?\PDO $conn;
    public function __construct(                    
        private string $method,
        private string $uri
    ){            
        Routes::add($this);    
    }

    public function conn(\PDO $conn){
        $this->conn = $conn;
    }

    public function add(Route $route){
        $route = $this->routes[] = $route;
        return $route;
    }

    public function render(){
        foreach ($this->routes as $route) {
            if($route->match(strtolower($this->uri),$this->method)){                
                $conn = $this->conn;
                $this->conn = null;
                return $route->render($conn);                
            }
        }
        echo 'not found';
    }
}



