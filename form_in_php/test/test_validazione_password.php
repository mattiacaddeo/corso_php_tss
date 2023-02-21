<?php

require "./form_in_php/class/validator/ValidatePassword.php";

$password = [
    '',
    '  ',
    '<script>',
    ' ',
    'aaaaaYY65456',
    '= ',
    '()',
    '+'
];

$p = new ValidatePassword();

foreach($password as $key => $value) {
    if($p->isValid($value) == false) {
        echo "test non superato [$value]\n";
    } else {
        echo "test superato\n";
    }
}

?>