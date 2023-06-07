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

    protected function getSQL($metodo){
        return match($metodo){
            'insert'=>fn()=>"INSERT INTO Paises (nombre) VALUES (:nombre)",
            'select'=>function(bool $there_id = false){
                $SQL = "SELECT pais_id, nombre FROM Paises";
                if($there_id){
                    $SQL .= " WHERE pais_id = :id";
                } 
                return $SQL;
            }
        };
        
    }
}