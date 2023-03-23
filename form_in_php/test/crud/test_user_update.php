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
    /*
    $first_name = "Paolo";
    $last_name = "Bianchi";
    $birthday = "2017-01-01";
    $birth_city = "Torino";
    $id_provincia = "15";
    $id_regione = "9";
    $gender = "M";
    $username = "luigiverdi@email.com";
    $password = md5('Password');
    $id_user = $user->getIdUser();
    $crud->update($first_name, $last_name, $birthday, $birth_city, $id_regione, 
        $id_provincia, $gender, $username, $password, $id_user);
    */
    $user->first_name = "Paolo";
    $user->last_name = "Bianchi";
    $user->birthday = "2017-01-01";
    $user->birth_city = "Torino";
    $user->id_provincia = "15";
    $user->id_regione = "9";
    $user->gender = "M";
    $user->username = "luigiverdi@email.com";
    $user->password = md5('Password');
    $id_user = 1;
    $crud->update($user, $id_user);

    print_r($crud->read(1));

    
echo "\n";



?>