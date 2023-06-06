<?php
namespace App\clases;
use App\Table;
use App\clases\Pais;
class Departamento implements Table{

    public function __construct(
        private string $nombre,
        private Pais $pais
    ){}
    public function get_params(): array
    {
        return [
            'nombre'=>$this->nombre,
            'pais_id'=>$this->pais->id
        ];
    }
}