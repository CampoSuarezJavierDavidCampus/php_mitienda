<?php
namespace Controllers\Registrar;
use Models\PaisesModel;
use Views\paises\PaisesView;
class RegistrarPaisesController extends PaisesModel{    
    
    public function __construct(\PDO $conn,array $datos)
    {
        parent::__construct($conn);        
        foreach($datos as $dato){
            $this->set_pais($dato);
        }
    }

    public function render():PaisesView{
        $this->insert();
        return new PaisesView();
    }

}