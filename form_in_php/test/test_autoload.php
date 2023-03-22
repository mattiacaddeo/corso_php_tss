<?php

use Registry\it\Provincia;
use Registry\it\Regione;
use validator\ValidateMail;
use validator\ValidateDate;
use validator\ValidatePassword;
use validator\ValidateRequired;
//require_once "./config.php";
spl_autoload_register(function($className) {
    //echo "\n sto cercando $className \n";
    $classPath =  str_replace("\\", "/", $className);
    include "./form_in_php/class/".$classPath.".php";
});


// new ValidateMail();
// new ValidateDate();
// new ValidateRequired();
// new ValidatePassword();

//new Regione();

//Regione::all();
//Provincia::all();
?>