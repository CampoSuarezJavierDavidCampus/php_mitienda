<?php
namespace Helpers;
use App\Validar\{Filtro,Sanitizar};
class Validar extends Sanitizar{    
    protected function __construct()
    {
        $this->add(new Filtro(
            'email',
            fn($email)=>filter_var($email,FILTER_SANITIZE_EMAIL)
        ));
        $this->add(new Filtro(
            'string',
            function($string){
                $string = htmlspecialchars($string,ENT_QUOTES,"UTF-8");
                $string = filter_var($string,FILTER_SANITIZE_SPECIAL_CHARS);
            }
        ));
        $this->add(new Filtro(
            'number',
            fn($email)=>filter_var($email,FILTER_SANITIZE_NUMBER_FLOAT)
        ));
    }
}