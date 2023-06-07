<?php
namespace Models;
use Helpers\Validar;
use App\validar\Sanitizar;
trait Model{            
    protected Sanitizar $sanitizador;
    protected function sanitizar(array $datos):array{   
        $this->sanitizador = new Validar(); 
        $datos_sanitizados = [];
        foreach ($datos as $tipo => $valor) {
            $datos_sanitizados[] = $this->sanitizador->filtrar($tipo,$valor);
        }        
        return $datos_sanitizados;        
    }    
    protected function insert($SQL):void{        
        $this->conn->beginTransaction();        
        $stmt = $this->conn->prepare($SQL);        
        foreach($this->paises as $pais){            
            $stmt->execute($pais->get_params());
        }
        $this->conn->commit();
        $this->conn = null;
    }
    protected function select($SQL,?int $id = null):array{                     
        $stmt = $this->conn->prepare($SQL);
        if($id){
            $stmt->execute(['id'=>$id]);        
        }else{
            $stmt->execute();
        }                
        $datos =$stmt->fetchAll();
        return $datos;
    }
}
