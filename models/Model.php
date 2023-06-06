<?php
namespace Models;
use Helpers\Validar;
use App\validar\Sanitizar;
trait Model{            
    protected Sanitizar $sanitizador;
    protected function sanitizar(array $datos):array{   
        $this->sanitizador = new Validar(); 
        $datos_sanitizados = [];
        foreach ($datos as $tipo => $valor) {
            $datos_sanitizados[] = $this->sanitizador->filtrar($tipo,$valor);
        }        
        return $datos_sanitizados;        
    }    
}