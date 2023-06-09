<?php
namespace App\clases;
use App\{Table,Obj};
class Pais extends Obj implements Table{    
    public function __construct(
        public readonly string $pais_nombre = '',
        public readonly ?int $pais_id = null
    ){}
    public function get_params():array{
        $params = $this->get_datos();
        return $params;
    }
    public function get_datos():array{
        $datos = [];
        if($this->pais_nombre != ''){
            $datos['string']=['pais_nombre',strtolower($this->pais_nombre)];            
        }
        if($this->pais_id){
            $datos['number']= ['pais_id',$this->pais_id];
        }
        return $this->sanitizar($datos);
    }
}