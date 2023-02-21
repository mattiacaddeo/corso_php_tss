<?php

$first_name = filter_input(
    INPUT_POST,
    'first_name',
    FILTER_SANITIZE_SPECIAL_CHARS
);

$last_name = filter_input(
    INPUT_POST,
    'last_name',
    FILTER_SANITIZE_SPECIAL_CHARS
);

$birthday = filter_input(
    INPUT_POST,
    'birthday',
    FILTER_DEFAULT
);

$birth_place = filter_input(
    INPUT_POST,
    'birth_place',
    FILTER_SANITIZE_SPECIAL_CHARS
);

$gender = filter_input(
    INPUT_POST,
    'gender',
    FILTER_SANITIZE_SPECIAL_CHARS
);

$username = filter_input(
    INPUT_POST,
    'username',
    FILTER_VALIDATE_EMAIL
);

$password = filter_input(
    INPUT_POST,
    'password',
    FILTER_SANITIZE_SPECIAL_CHARS
);

var_dump($first_name);
var_dump($last_name);
var_dump($birthday);
var_dump($birth_place);
var_dump($gender);
var_dump($username);
var_dump($password);

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

?>