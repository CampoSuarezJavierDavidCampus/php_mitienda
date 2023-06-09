<?php
namespace App\clases;
class Route {
    private string $name;
    private $controller;
    public function __construct(        
        private string $method,
        callable $controller
    ){
        $this->controller = $controller;
        return $this;
    }
    public function name($name){
        $this->name = strtolower($name);
    }
    public function match($uri,$method){
        if($method == $this->method && preg_match($this->name,$uri)){
            return true;
        }
        return false;
    }
    public function render($conn){        
        return call_user_func($this->controller,$conn,$this->method);
    }
}