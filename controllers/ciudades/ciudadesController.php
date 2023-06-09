<?php
namespace Controllers\ciudades;
use Controllers\Controller;
use Models\ciudades\ciudadesModels;
use App\clases\Ciudad;
use App\clases\Departamento;
use Views\Template;
class ciudadesController extends ciudadesModels implements Controller{  
        
    public function __construct(
        \PDO $conn,
        private string $method,
        private array $datos = []
    )
    {
        parent::__construct($conn);       
        if (!empty($_GET) && isset($_GET['id'])) {
            $this->add(new Ciudad('',(int)$_GET['id']));
        }else{            
            if(!empty($_POST)){
                list($ciudad_nombre,$departamento_id)=$_POST;
                $departamento = new Departamento('',$departamento_id);
                $ciudad = new Ciudad($ciudad_nombre,null,$departamento);                
                $this->add($ciudad);
            }
        }                
    }

    public function render(bool $get_data = false):string{        
        $result = $this->peticion($this->method);
        if($get_data){
            return json_encode([
                'response'=>$result,
                'error'=>null,
                'estatus'=>'ok',
                'code'=>200
            ]);
        }
        $view = new Template($result);
        return $view->name('ciudades')->render();
    }
}