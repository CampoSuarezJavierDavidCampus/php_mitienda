<?php
namespace Models\ciudades;
use Models\Model;
class ciudadesModels{
    use Model;    
    protected function peticion($metodo){
        if(!empty($this->objs)){
            $id =$this->objs[0]->get_id();
        }
        $datos = match($metodo){
            "POST"=>$this->insert("INSERT INTO Ciudades (ciudad_nombre,departamento_id) VALUES (:ciudad_nombre,:departamento_id)"),
            "GET" => call_user_func(function(){
                $datos = $this->select(call_user_func(function(){
                    $SQL = "SELECT ciudad_id, ciudad_nombre, d.departamento_id, d.departamento_nombre FROM Ciudades AS c 
                    INNER JOIN Departamentos AS d ON c.departamento_id = d.departamento_id";
                    if(!empty($this->objs) && $this->objs[0]->ciudad_id){
                        $SQL .= " WHERE ciudad_id = :ciudad_id";
                    }
                    return $SQL;
                }));
                $datos['departamentos']= $this->select("SELECT departamento_id, departamento_nombre FROM Departamentos");                
                return $datos;
            }),
            "DELETE"=>$this->delete('DELETE FROM Ciudades WHERE ciudad_id = :ciudad_id',$id,'/ciudades')
        };    
        return $datos;
    }
}