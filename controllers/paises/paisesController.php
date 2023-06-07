<?php
namespace Controllers\paises;
use Models\paises\paisesModel;
use Views\paises\paisesView;
use App\clases\Pais;
class paisesController extends PaisesModel{
    public function __construct(
        \PDO $conn,
        private string $method,
        array $datos = []
    )
    {
        parent::__construct($conn);        
        if (!empty($_GET) && isset($_GET['id'])) {
            $this->set_obj(new Pais('',$_GET['id']));
        }else{
           if($this->method !== 'GET') {
                foreach($datos as $nombre){                
                    $this->set_obj(new Pais($nombre));
                }
           }else{
            echo 'DATOS NO MODIFICADOS';
           }
        }
    }

    public function render(bool $get_data = false):string{
        $datos = $this->peticion($this->method);
        $view =  new PaisesView();
        return $get_data
            ?json_encode($datos)
            :$view->render($datos);
    }

}