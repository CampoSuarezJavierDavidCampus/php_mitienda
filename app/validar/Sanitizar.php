<?php
namespace App\Validar;
class Sanitizar{
    private array $filtros = [];
    public function add(Filtro $filtro){
        $this->filtros[$filtro->name] = $filtro;
    }
    public function filtrar($nombre_filtro,$valor){
        foreach ($this->filtros as $filtro) {
            if($nombre_filtro === $filtro->name){
                return $filtro->sanitizar($valor);
            }
        }
        return $valor;
    }
}