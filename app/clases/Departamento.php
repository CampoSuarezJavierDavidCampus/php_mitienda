<?php
namespace App\clases;
use App\Table;
use App\clases\Pais;
class Departamento implements Table{
    public int $id;
    public function __construct(
        public string $nombre,
        Pais $pais
    ){
        $this->id = $pais->id;
    }
    public function get_params(): array
    {
        return [
            'nombre'=>$this->nombre,
            'pais_id'=>$this->id
        ];
    }
}