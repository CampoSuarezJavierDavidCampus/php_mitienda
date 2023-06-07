<?php
namespace App\clases;
use App\Table;
use App\clases\Pais;
class Departamento implements Table{
    public function __construct(
        public string $nombre,
        public int $pais_id,
        public readonly ?int $id = null
    ){}
    public function get_params(): array
    {
        /* 
        [
            'nombre'=>$this->nombre,
            'pais_id'=>$this->pais_id
        ];
        */

        return 
    }
}