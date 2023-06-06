<?php
require_once('./vendor/autoload.php');
$obj = new  Config\connectionString();
$db = new App\Database($obj->db);
$conn = $db->getConnection('db');
$datos = ['venezuela','madrid','brazil'];
$controller = new Controllers\paises\registrarPaisesController($conn,$datos);
echo $controller->render();