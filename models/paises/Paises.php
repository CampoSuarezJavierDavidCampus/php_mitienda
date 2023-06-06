<?php
namespace Models\Paises;
use Models\Model;
class PaisModel{
    use Model;
    public function __construct(
        private \PDO $conn      
    ){

    }


}