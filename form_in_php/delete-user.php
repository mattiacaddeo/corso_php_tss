<?php

use crud\UserCRUD;
include "config.php";
require "./autoload.php";

$id_user = filter_input(INPUT_GET, 'id_user', FILTER_VALIDATE_INT);
print_r($id_user);
$crud = new UserCRUD;
if($id_user) {
    $crud->delete($id_user);
    header("location: index-user.php");
} else {
    echo "problemi";
}




?>