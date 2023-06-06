<?php
namespace Controllers\paises;
use Models\paises\paisesModel;
use Views\paises\paisesView;
class paisesController extends PaisesModel{    
    
    public function __construct(
        \PDO $conn,
        private string $method,
        array $datos = []
    )
    {
        parent::__construct($conn);        
        foreach($datos as $dato){
            $this->set_pais($dato);
        }
    }

    public function render(bool $get_data = false):string{
        $id = null;
        $view =  new PaisesView();

        if(!empty($_GET) && $_GET['id']){
            $id = (int) $_GET['id'];
        }
        
        $datos = match($this->method){
            'POST'=>$this->insert(),
            'GET'=>$this->select($id)
        };
        
        if($get_data){
            return json_encode($datos);
        }

        return $view->render($datos);
    }

}