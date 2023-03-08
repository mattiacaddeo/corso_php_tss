<?php

include "./config.php";


    function select_nome_regioni() {
        $dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME;
        $string = "";
        try {
            $conn = new PDO($dsn, DB_USER, DB_PASSWORD);
            $regioni = $conn->query("SELECT nome FROM Regione")->fetchAll();
            foreach($regioni as $key => $regione) {
                echo "<option value=\"".$regione['nome']."\">".$regione['nome']."</option>";
            }
            //print_r($regioni[0]['nome']);
        } catch (\Throwable $th) {
            throw $th;
        }
    }



?>