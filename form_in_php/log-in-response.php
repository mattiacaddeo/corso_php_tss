<h1>Sono la risposta (RESPONSE)</h1>

<?php

// $_GET;
// echo "<pre>";
// echo "GET: ";
// print_r($_GET);
// print_r($_POST);
// echo "</pre>";

// echo "La tua email è <br>";
// echo "<strong>".$_POST['email']."</strong>";

/*
    $ -> varaibile
    ""/'' -> stringa
    CICCIO -> costante
*/
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