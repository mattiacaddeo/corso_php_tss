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

    $result = $crud->read();
    if(!$result) {
        echo "database iniziale vuoto (false)\n";
    }

    $crud->create($user);

    $result = $crud->read(1);
    if(class_exists(User::class) && get_class($result) == User::class) {
        echo "read utente esistente superato\n";
    }

    $result = $crud->read(2);
    if($result === false) {
        echo "utente non esistente superato\n";
    }

    $result = $crud->read();
    if(is_array($result) && count($result) === 1) {
        echo "ricerca di tutti gli utenti \n";
    }

    $crud->delete(1);
    $result = $crud->read(1);
    if($result === false) {
        echo "utente con id 1 è stato eliminato\n";
    }
    var_dump($result);
    echo "\n";
?>