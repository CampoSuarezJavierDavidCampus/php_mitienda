<?php 
namespace App;
class Database{
    private $conn;
    private $settings;
    public function __construct($settings) {
        // Requerir el archivo de configuración y asignarlo a $this->settings
        $this->settings = $settings;
    }
        
    public function getConnection($dbKey):\PDO {
        $dbConfig = $this->settings[$dbKey];
        $this->conn = null;
        // $dsn = "{$dbConfig['driver']}:host={$dbConfig['host']};dbname={$dbConfig['database']};charset={$dbConfig['charset']}";
        $dsn = "{$dbConfig['driver']}:host={$dbConfig['host']};dbname={$dbConfig['database']}";
        try{
            $this->conn = new \PDO($dsn, $dbConfig['username'], $dbConfig['password'], $dbConfig['flags']);                
        }catch(\PDOException $exception){
            $error=[[
                'error' => $exception->getMessage(),
                'message' => 'Error al momento de establecer conexion'
            ]];
            echo var_dump( $error);
        }
        return $this->conn;
    }

}
