<?php
namespace Helpers\Validar;
class Filtro{
    private $filtro;
    public function __construct(private string $name ,callable $filtro){
        $this->filtro = $filtro;
    }
    public function sanitizar($valor){
        return call_user_func($this->filtro,$valor);
    }
}
