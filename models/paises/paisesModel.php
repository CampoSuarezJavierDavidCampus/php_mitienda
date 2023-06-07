<?php
namespace Models\paises;
use Models\Model;
class paisesModel{        
    use Model;
     
    protected function __construct(        
        protected ?\PDO $conn,                
    ){} 

    protected function peticion($metodo):?array{
        $datos = match($metodo){
            'POST'=>$this->insert("INSERT INTO Paises (nombre) VALUES (:nombre)"),
            'GET'=>$this->select(call_user_func(function(){
                $SQL = "SELECT pais_id, nombre FROM Paises";
                if($this->objs && $this->objs[0]->id){
                    $SQL .= " WHERE pais_id = :id";
                } 
                return $SQL;
            }))
        };     
        return $datos;   
    }
}