<?php
htmlspecialchars($_SERVER["PHP_SELF"]);
require "./form_in_php/class/validator/ValidateName.php";

$name = [
    '  ',
    '',
    '<script>',
    "pippo"
];

$n = new ValidateName();

foreach($name as $key => $value) {
    if($n->isValid($value) == false) {
        echo "test superato [$value]\n";
    } else {
        echo "test non superato\n";
    }
}

?>