<?php
namespace Views\paises;
use Views\View;
class paisesView implements View {
    public function render($datos = null):string{                       
        ob_start();
        if($datos){
            extract($datos); 
        }        
        include_once(__DIR__.'/../resourses/paises.php');
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }
}