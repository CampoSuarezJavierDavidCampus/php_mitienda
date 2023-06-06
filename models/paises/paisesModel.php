<?php
namespace Models\paises;
use Models\Model;
use App\clases\Pais;
class paisesModel{        
    use Model;
    protected array $paises = [];    
    protected function __construct(        
        protected ?\PDO $conn,                
    ){
        
    }
    private function sanitizar_pais(string $nombre,?int $id = null):Pais{
        $propiedades = ['string'=>$nombre];
        if($id){
            $propiedades['number'] = $id;
        }
        $propiedades = $this->sanitizar($propiedades);
        $pais = new Pais(...$propiedades);
        return $pais;
    }
     protected function set_pais(string $nombre,$id = null):void{
        $this->paises[]= $this->sanitizar_pais($nombre,$id);
    }

    protected function insert():void{        
        $this->conn->beginTransaction();
        $SQL = "INSERT INTO Paises (nombre) VALUES (:nombre)";        
        $stmt = $this->conn->prepare($SQL);        
        foreach($this->paises as $pais){            
            $stmt->execute($pais->get_params());
        }
        $this->conn->commit();
        $this->conn = null;
    }
    protected function select(?int $id = null){
        $SQL = "SELECT pais_id, nombre FROM Paises";
        if($id){
            $SQL .= " WHERE pais_id = :id";
        }                
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