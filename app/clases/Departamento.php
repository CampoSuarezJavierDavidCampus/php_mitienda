<?php
namespace App\clases;
use App\Table;
use App\Obj;
use App\clases\Pais;
class Departamento extends Obj implements Table{
    public function __construct(
        public string $nombre = '',
        public ?int $departamento_id,
        public ?Pais $pais = null
    ){}
    public function get_params(): array{        
        $params = $this->get_datos();
        if($this->pais){
            $params += $this->pais->get_params();
        }

        return $params;
    }
    public function get_datos():array{
        $datos = [];
        if($this->nombre != ''){
            $datos['string']= ['nombre',$this->nombre];            
        }
        if($this->departamento_id){
            $datos['number'] = ['departamento_id',$this->departamento_id];
        }
        return $this->sanitizar($datos);
    }
}