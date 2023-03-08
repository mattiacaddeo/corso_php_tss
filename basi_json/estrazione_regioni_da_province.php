<?php

include "config.php";

$province_string = file_get_contents('province.json');

$province_object = json_decode($province_string);

$regioni_array = array_map(function($provincia) {
    return $provincia->regione;
}, $province_object);

$regioni_unique = array_unique($regioni_array);

sort($regioni_unique);

//print_r($regioni_unique);

$dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME;

try {
    $conn = new PDO($dsn, DB_USER, DB_PASSWORD);
    $conn->query('TRUNCATE TABLE Regione;');
    foreach ($regioni_unique as $key => $regione) {
        $regione = addslashes($regione);
        $sql = "INSERT INTO Regione (nome) VALUES('$regione');";
        echo $sql."\n";
        $conn->query($sql);
    }
} catch (\Throwable $th) {
    throw $th;
}   

?>