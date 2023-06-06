<?php
namespace Helpers;
use App\validar\{Filtro,Sanitizar};
class Validar extends Sanitizar{    
    public function __construct()
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
                return $string;
            }
        ));
        $this->add(new Filtro(
            'number',
            fn($number)=>filter_var($number,FILTER_SANITIZE_NUMBER_FLOAT)
        ));
    }
}