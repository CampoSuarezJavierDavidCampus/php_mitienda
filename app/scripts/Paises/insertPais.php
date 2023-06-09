<?php 
    require_once('../../clases/Database.php');
    $db = new Database();
    $conn = $db->getConnection('db2');
    /*$sql = "INSERT INTO pais (nombre_pais) VALUES (?)";
    $stmt= $conn->prepare($sql);
    $nombrePais='Mexico2';
    $stmt->execute([$nombrePais]);*/
    /*$name = 'Uruguay';
    $data = [
        'nombre_pais' => $name
    ];
    $sql = "INSERT INTO pais (nombre_pais) VALUES (:nombre_pais)";
    $stmt= $conn->prepare($sql);
    $stmt->execute($data);*/
    /*
        Forma 1 : INSERT query with positional placeholders
        $sql = "INSERT INTO users (name, surname, sex) VALUES (?,?,?)";
        $stmt= $pdo->prepare($sql);
        $stmt->execute([$name, $surname, $sex]);
    */
    $data = [
        ['Rusia'],
        ['China'],
    ];
    $stmt = $conn->prepare("INSERT INTO pais (nombre_pais) VALUES (?)");
    try {
        $conn->beginTransaction();
        foreach ($data as $row)
        {
            $stmt->execute($row);
        }
        $conn->commit();
    }catch (Exception $e){
        $pdo->rollback();
        throw $e;
    }
    /*
     * INSERT query with named placeholders
        $data = [
            'name' => $name,
            'surname' => $surname,
            'sex' => $sex,
        ];
        $sql = "INSERT INTO users (name, surname, sex) VALUES (:name, :surname, :sex)";
        $stmt= $pdo->prepare($sql);
        $stmt->execute($data);
     */
    /* 
        INSERTing multiple rows
        $data = [
            ['John','Doe', 22],
            ['Jane','Roe', 19],
        ];
        $stmt = $pdo->prepare("INSERT INTO users (name, surname, age) VALUES (?,?,?)");
        try {
            $pdo->beginTransaction();
            foreach ($data as $row)
            {
                $stmt->execute($row);
            }
            $pdo->commit();
        }catch (Exception $e){
            $pdo->rollback();
            throw $e;
        }
    */
?>