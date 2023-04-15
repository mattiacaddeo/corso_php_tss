<?php

include "config.php";

class Regione {

    static function select_regioni() {
        $dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME;
        try {
            $conn = new PDO($dsn, DB_USER, DB_PASSWORD);
            $regioni = $conn->query("SELECT * FROM Regione")->fetchAll();
            //print_r($regioni[0]['nome']);
        } catch (\Throwable $th) {
            throw $th;
        } finally {
            return $regioni;
        }
    }
}

?>