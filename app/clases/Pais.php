<?php
namespace App\Clases;
use App\Table;
class Pais implements Table{    
    public function __construct(
        public string $nombre
    ){}
    public function get_params():array{
        return [
            'nombre'=>$this->nombre
        ];
    }
}