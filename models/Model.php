<?php
namespace Models;
use Helpers\Validar\Filtros\Filtros;
use Helpers\Validar\Sanitizar;
trait Model{
    protected Sanitizar $sanitizador = Filtros::get_filtros();
    protected function sanitizar(array $datos):array{
        $datos_sanitizados = [];
        foreach ($datos as $tipo => $valor) {
            $this->sanitizador->filtrar($tipo,$valor);
        }
        return $datos_sanitizados;
    }
}