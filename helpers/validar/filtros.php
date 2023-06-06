<?php
namespace Helpers\Validar\Filtros;
use Helpers\Validar\{Filtro,Sanitizar};
class Filtros{
    static public function get_filtros():Sanitizar{
        $sanitizador = new Sanitizar();
        $sanitizador->add(new Filtro(
            'email',
            fn($email)=>filter_var($email,FILTER_SANITIZE_EMAIL)
        ));
        $sanitizador->add(new Filtro(
            'string',
            function($string){
                $string = htmlspecialchars($string,ENT_QUOTES,"UTF-8");
                $string = filter_var($string,FILTER_SANITIZE_SPECIAL_CHARS);
            }
        ));
        $sanitizador->add(new Filtro(
            'number',
            fn($email)=>filter_var($email,FILTER_SANITIZE_NUMBER_FLOAT)
        ));
        return $sanitizador;
    }
}