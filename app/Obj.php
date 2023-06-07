<?php
namespace App;
use Helpers\Validar;
use App\validar\Sanitizar;
class Obj{
    protected Sanitizar $sanitizador;
    protected function sanitizar(array $datos):array{   
        $this->sanitizador = new Validar(); 
        $datos_sanitizados = [];
        foreach ($datos as $tipo => $valor) {
            $datos_sanitizados[$valor[0]] = $this->sanitizador->filtrar($tipo,$valor[1]);
        }        
        return $datos_sanitizados;        
    }
}