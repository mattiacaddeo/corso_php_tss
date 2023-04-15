<?php

include "config.php";

class Provincia {

    function select_province() {
        $dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME;
        try {
            $conn = new PDO($dsn, DB_USER, DB_PASSWORD);
            $province = $conn->query("SELECT * FROM Provincia")->fetchAll();
            //print_r($regioni[0]['nome']);
        } catch (\Throwable $th) {
            throw $th;
        } finally {
            return $province;
        }
    }
}

?>