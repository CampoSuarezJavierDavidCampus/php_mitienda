<?php
namespace Views\departamentos;
use Views\View;
class DepartamentosView implements View{
    public function render($result = null):string{  
        ob_start();
        if($result){
            extract($result);
        }
        include_once(__DIR__.'/../resourses/Departamentos.php');
        $contents = ob_get_contents();
        ob_end_clean();
        return $contents;
    }
}