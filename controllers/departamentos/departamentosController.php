<?php
namespace Controllers\departamentos;
use Controllers\Controller;
use Models\departamentos\departamentosModel;
use Views\departamentos\DepartamentosView;
use App\clases\Departamento;
use App\clases\Pais;
class departamentosController extends departamentosModel implements Controller{  
        
    public function __construct(
        \PDO $conn,
        private string $method,
        private array $datos = []
    )
    {
        parent::__construct($conn);
        if (!empty($_GET) && isset($_GET['id'])) {
            $this->add(new Departamento('',$_GET['id']));
        }else{
            foreach($datos as $datos_departamento){
                list($nombre,$pais_id)=$datos_departamento;
                $pais = new Pais('',$pais_id);
                $departamento = new Departamento($nombre,null,$pais);
                $this->add($departamento);
            }
        }
        
    }

    public function render(bool $get_data = false):string{
        $result = $this->peticion($this->method);
        $view = new DepartamentosView();
        return $view->render($result);
    }
}