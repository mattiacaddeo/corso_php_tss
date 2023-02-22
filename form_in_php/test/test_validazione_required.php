<?php
require "./form_in_php/class/validator/Validable.php";
require "./form_in_php/class/validator/ValidateRequired.php";

//echo "ciao\n";

$testCases = [
    [
        'input' => '       ',
        'expected' => false
    ],
    [
        'input' => 'ciao   ',
        'expected' => 'ciao'
    ],
    [
        'input' => ' ciao ',
        'expected' => 'ciao'
    ],
    [
        'input' => ' ciao',
        'expected' => 'ciao'
    ],
    [
        'input' => '',
        'expected' => false
    ],
    [
        'input' => 'ciao   ',
        'expected' => 'ciao'
    ],
    [
        'input' => '<h1>ciao</h1>',
        'expected' => 'ciao'
    ],
    [
        'input' => 'ciao</h1>',
        'expected' => 'ciao'
    ],
    [
        'input' => '<h1>ciao',
        'expected' => 'ciao'
    ],
    [
        'input' => '<b> </b>',
        'expected' => false
    ],
    [
        'input' => '<b> ',
        'expected' => false
    ],
    [
        'input' => ' </b>',
        'expected' => false
    ],
    [
        'input' => '<b></b> ',
        'expected' => false
    ],
    [
        'input' => 20,
        'expected' => 20
    ],
    [
        'input' => 0,
        'expected' => 0
    ]
];

foreach($testCases as $key => $test) {
    $input = $test['input'];
    $expected = $test['expected'];

    $v = new ValidateRequired();
    if($v ->isValid($input) != $expected) {
        echo "\nTest numero $key non superato";
        var_dump($expected);
        echo "\nma ho trovato";
        var_dump($v ->isValid($input));
    }
    //print_r($test['input']);
}

echo "\n";
?>