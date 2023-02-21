<?php

require "./form_in_php/class/validator/ValidateDate.php";

$date = [
    '19/10/2001',
    '2000/18/01'
];

$d = new ValidateDate();

foreach($date as $key => $value) {
    if($d->isValid($value, 'dd-mm-yyyy') == true) {
        echo "formato corretto [$value]\n";
    } else {
        echo "formato non corretto\n";
    }
}

?>