<?php
namespace App\validar;
class Filtro{
    private $filtro;
    public function __construct(public string $name ,callable $filtro){
        $this->filtro = $filtro;
    }
    public function sanitizar($valor){
        return call_user_func($this->filtro,$valor);
    }
}
