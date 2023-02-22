<?php
require "./form_in_php/class/validator/Validable.php";
require "./form_in_php/class/validator/ValidateDate.php";


$testCases = [
    [
        'input' => '19/10/2001',
        'expected' => '19/10/2001'
    ],
    [
        'input' => '19/10/2001 ',
        'expected' => '19/10/2001'
    ],
    [
        'input' => ' 19/10/2001 ',
        'expected' => '19/10/2001'
    ],
    [
        'input' => ' 19/10/2001',
        'expected' => '19/10/2001'
    ],
    [
        'input' => '33/10/2001',
        'expected' => false
    ],
    [
        'input' => '18/18/2000',
        'expected' => false
    ],
    [
        'input' => '18/18/99',
        'expected' => false
    ]
];

foreach($testCases as $key => $test) {
    $input = $test['input'];
    $expected = $test['expected'];

    $v = new ValidateDate();
    if($v->isValid($input) != $expected) {
        echo "\nTest numero $key non superato ";
        var_dump($expected);
        echo "\nma ho trovato";
        var_dump($v ->isValid($input));
    }
    //print_r($test['input']);
}

?>