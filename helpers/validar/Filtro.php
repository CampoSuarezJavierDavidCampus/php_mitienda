<?php
namespace Helpers\Validar;
abstract class Filtro{
    public string $name;
    private $filtro;
    public function __construct(string $name ,callable $filtro){}
    public function sanitizar($valor){
        return call_user_func($this->filtro,$valor);
    }
}
