<?php
namespace Controllers\paises;
use Models\paises\paisesModel;
use Views\paises\paisesView;
use Controllers\Controller;
use App\clases\Pais;
class paisesController extends PaisesModel implements Controller{
    public function __construct(
        \PDO $conn,
        private string $method,
        array $datos = []
    )
    {
        parent::__construct($conn);        
        if (!empty($_GET) && isset($_GET['id'])) {
            $this->add(new Pais('',$_GET['id']));
        }else{
           if($this->method !== 'GET') {
                foreach($datos as $nombre){                
                    $this->add(new Pais($nombre));
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