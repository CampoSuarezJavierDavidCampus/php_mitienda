<?php
namespace Models;
use App\Obj;
trait Model{          
    protected array $objs = [];
    protected function __construct(
        protected ?\PDO $conn
    ){}
    protected function add(Obj $obj):void{
        $this->objs[]= $obj;
    }        
    protected function insert(string $SQL):void{        
        $this->conn->beginTransaction();        
        $stmt = $this->conn->prepare($SQL);        
        foreach($this->objs as $obj){            
            $stmt->execute($obj?$obj->get_params():null);
        }
        $this->conn->commit();
        $this->conn = null;
    }
    protected function select(string $SQL):array{        
        $stmt = $this->conn->prepare($SQL);
        $stmt->execute($this->objs?$this->objs[0]->get_params():null);
        $datos =$stmt->fetchAll();        
        return $datos;
    }
    protected function delete($SQL,?array $id,$path){
        if(!$id){
            return false;
        }
        $stmt = $this->conn->prepare($SQL);
        $stmt->execute($id);        
        echo <<<HTML
            <script>
                alert('UN CAMPO HA SIDO ALTERADO');                
                window.location.href = '$path';
            </script>
        HTML;
        
    }
}
