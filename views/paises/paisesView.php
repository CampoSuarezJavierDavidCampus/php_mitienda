<?php
namespace Views\paises;
use Views\View;
class paisesView implements View {
    public function render($result = null):string{                    
        ob_start();
        if($result){
            extract($result); 
        }        
        include_once(__DIR__.'/../resourses/Paises.php');
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }
}