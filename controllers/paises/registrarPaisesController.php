<?php
namespace Controllers\paises;
use Models\paises\paisesModel;
use Views\paises\paisesView;
class registrarPaisesController extends PaisesModel{    
    
    public function __construct(\PDO $conn,array $datos)
    {
        parent::__construct($conn);        
        foreach($datos as $dato){
            $this->set_pais($dato);
        }
    }

    public function render():string{
        $this->insert();
        $view =  new PaisesView();
        return $view->render();
    }

}