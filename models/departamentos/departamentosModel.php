<?php
namespace Models\departamentos;
use Models\Model;
use App\clases\Departamento;
class departamentoModel{
    use Model;
    protected Departamento $departamentos =[];

    private function sanitizar_departamento(array $parametros,?int $id = null):Departamento{
        list($nombre,$pais_id)= $parametros;
        $parametros = [
            'string'=>$nombre,
            'number'=>$pais_id
        ];
        if($id){
            $parametros['number']=$id;
        }
        $parametros = $this->sanitizar($parametros);
        return new Departamento(...$parametros);
    }

    protected function add($parametros,?int $id = null):void{
        $this->departamentos = $this->sanitizar_departamento($parametros,$id);        
    }

}