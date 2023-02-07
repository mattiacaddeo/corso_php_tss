<?php


print_r($_GET);

$test = filter_input(
    INPUT_GET,
    'email',
    FILTER_VALIDATE_EMAIL
);

if($test === false) {
    echo "\nLa mail non è valida\n";
} else {
    echo "\nGrazie la tua email è valida: $test";
}


?>