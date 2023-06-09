<?php
namespace Models\departamentos;
use Models\Model;
class departamentosModel {
    use Model;    
    protected function peticion($metodo){        
        $datos = match($metodo){
            "POST"=>$this->insert("INSERT INTO Departamentos (departamento_nombre,pais_id) VALUES (:departamento_nombre,:pais_id)"),
            "GET" => $this->select(call_user_func(function(){
                $SQL = "SELECT departamento_id, departamento_nombre, p.pais_id, p.pais_nombre FROM Departamentos AS d 
                INNER JOIN Paises AS p ON p.pais_id = d.pais_id";
                if(!empty($this->objs) && $this->objs[0]->id){
                    $SQL .= " WHERE departamento_id = :departamento_id";
                }
                return $SQL;
            }))
        };
        return $datos;
    }
}