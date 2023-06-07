<?php
namespace Controllers\departamentos;
use Models\departamentos\departamentoModel;
class departamentosController extends departamentoModel{      
    public function __construct(
        private string $method,
        private array $datos = [],
        private ?int $id = null
    )
    {
        
    }
    

    
}