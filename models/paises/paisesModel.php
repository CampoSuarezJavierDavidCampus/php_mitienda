<?php
namespace Models;
use Models\Model;
use App\Clases\Pais;

use function PHPSTORM_META\type;

class PaisesModel{    
    use Model;
    protected array $paises = [];    
    protected function __construct(
        protected \PDO $conn,                
    ){}
    private function sanitizar_pais(string $nombre):Pais{
        $pais = new Pais($this->sanitizar(['string'=>$nombre])[0]);        
        return $pais;
    }  
    protected function set_pais(string $nombre):void{
        $this->paises[]= $this->sanitizar_pais($nombre);        
    }

    protected function insert(){
        $this->conn->beginTransaction();
        $SQL = "INSERT INTO paises (nombre) VALUES (:nombre)";
        $stmt = $this->conn->prepare($SQL);        
        foreach($this->paises as $pais){            
            $stmt->execute($pais->get_params());
        }
        $this->conn->commit();
        $this->conn = null;        
    }
}