<?php
namespace App\clases;
use App\Table;
class Pais implements Table{    
    public function __construct(
        public string $nombre,
        public readonly ?int $id = null
    ){}
    public function get_params():array{
        if($this->id){
            return [
                'id'=> $this->id,
                'nombre'=>$this->nombre
            ];    
        }
        return ['nombre'=>$this->nombre];
    }
}