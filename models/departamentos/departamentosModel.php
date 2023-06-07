<?php
namespace Models\departamentos;
use Models\Model;
class departamentosModel {
    use Model;    
    protected function peticion($metodo){        
        $datos = match($metodo){
            "POST"=>$this->insert("INSERT INTO Departamentos (nombre,pais_id) VALUES (:nombre,:pais_id)"),
            "GET" => $this->select(call_user_func(function(){
                $SQL = "SELECT d.departamento_id, d.nombre AS departamento_nombre, p.pais_id , p.nombre AS pais_nombre FROM Departamentos AS d 
                INNER JOIN Paises AS p ON p.pais_id = d.pais_id";
                if(!empty($this->objs) && $this->objs[0]->id){
                    $SQL .= "WHERE d.departamento_id = :departamento_id";
                }
                return $SQL;
            }))
        };
        return $datos;
    }
}