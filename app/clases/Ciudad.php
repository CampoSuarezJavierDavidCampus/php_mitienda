<?php
namespace App\clases;
use App\Table;
use App\Obj;
use App\clases\Departamento;
class Ciudad extends Obj implements Table{
    public function __construct(
        public string $ciudad_nombre = '',
        public ?int $ciudad_id,
        public ?Departamento $departamento = null
    ){}
    public function get_params(): array{        
        $params = $this->get_datos();
        if($this->departamento){
            $params += $this->departamento->get_params();
        }

        return $params;
    }
    public function get_id():array{
        return [
            'ciudad_id'=>$this->ciudad_id
        ];
    }
    public function get_datos():array{
        $datos = [];
        if($this->ciudad_nombre != ''){
            $datos['string']= ['ciudad_nombre',strtolower($this->ciudad_nombre)];            
        }
        if($this->ciudad_id){
            $datos['number'] = ['ciudad_id',$this->ciudad_id];
        }
        return $this->sanitizar($datos);
    }
}