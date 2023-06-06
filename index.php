<?php 
    require_once('vendor/autoload.php');
    $obj = new Helpers\Config\connectionString();
    $db = new App\Database($obj->db);
    $conn = $db->getConnection('db');

    echo 'fdsfdfsfd';
