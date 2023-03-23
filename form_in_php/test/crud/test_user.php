<?php

use crud\userCRUD;
use models\User;

include "config.php";
include "form_in_php/test/test_autoload.php";

(new PDO(DB_DSN, DB_USER, DB_PASSWORD))->query("TRUNCATE TABLE user;");


    $crud = new UserCRUD();
    $user = new User();
    $user->first_name = "Luigi";
    $user->last_name = "Verdi";
    $user->birthday = "2017-01-01";
    $user->birth_city = "Torino";
    $user->id_provincia = "15";
    $user->id_regione = "9";
    $user->gender = "M";
    $user->username = "luigiverdi@email.com";
    $user->password = md5('Password');
    $crud->create($user);

    $result = $crud->read(2);
    if(count($result) == 1) {
        echo "test utente inserito ok";
    }

    print_r($result);

try {
    $crud->create($user);
} catch (\Throwable $th) {
    if($th->getCode() == "23000") {
        echo "Test superato";
    }
}
echo "\n";



?>