<?php
require_once('./vendor/autoload.php');
$obj = new  Config\connectionString();
$db = new App\Database($obj->db);
$conn = $db->getConnection('db');
$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
$controller = new Controllers\paises\paisesController($conn,$method,['colombia']);
echo $controller->render();
