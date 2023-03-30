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
    
    print_r($crud->read(1));

    $user2 = $crud->read(1);
/*
    $user->first_name = "Paolo";
    $user->last_name = "Bianchi";
*/
    $user2->first_name = "Luigi";
    $user2->last_name = "Verdi";
    $user2->birthday = "2017-01-01";
    $user2->birth_city = "Torino";
    $user2->id_provincia = "15";
    $user2->id_regione = "9";
    $user2->gender = "M";
    $user2->username = "luigiverdi@email.com";
    $user2->password = md5('Password');

    $result = $crud->update($user2);
    
    if($result>0) {
        print_r("\nModifiche effettuate: ".$result."\n");
    } else {
        print_r("\nNessuna modifica: ".$result."\n");
    }
    

    //print_r($crud->read(1));

    
echo "\n";



?>