<?php
namespace Models;
use Helpers\Validar;
use App\Validar\Sanitizar;
trait Model{            
    protected Sanitizar $sanitizador;
    protected function __construct() {
        $this->sanitizador = new Validar();
    }
    protected function sanitizar(array $datos):array{    
        $datos_sanitizados = [];
        foreach ($datos as $dato) {
            $datos_sanitizados[] = $this->sanitizador->filtrar($dato['tipo'],$dato['valor']);
        }
        return $datos_sanitizados;
    }    
}