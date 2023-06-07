<?php
namespace App\clases;
use App\{Table,Obj};
class Pais extends Obj implements Table{    
    public function __construct(
        public readonly string $nombre = '',
        public readonly ?int $id = null
    ){}
    public function get_params():array{
        $params = $this->get_datos();

        if($this->nombre != ''){
            $params['nombre']=$this->nombre;            
        }
        if($this->id){
            $params['id']= $this->id;
        }
        return $params;
    }
    public function get_datos():array{
        $datos = [];
        if($this->nombre != ''){
            $datos['string']=['nombre',$this->nombre];            
        }
        if($this->id){
            $datos['number']= ['id',$this->id];
        }
        return $this->sanitizar($datos);
    }
}