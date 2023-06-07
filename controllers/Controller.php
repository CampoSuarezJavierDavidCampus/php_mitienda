<?php
namespace Controllers;
use \PDO;
interface Controller{
    public function __construct(
        PDO $conn,
        string $method,
        array $datos = []
    );
    public function render(bool $get_data = false):string;
}