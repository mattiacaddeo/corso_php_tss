<?php

$nome = "Mario";
echo "\tciao $nome \n";
echo 'ciao $nome \n';
echo "\n";

#Index array
// $colori = array();
$colori = ['red','green','blue'];
echo "\n\n".$colori[2]."\n";

# associative Array (HashMap)
$persona = [
    "nome" => "Mario",
    "cogonome" => "Rossi",
    "email" => "a@b.it"
];

//console.log(persona);
print_r($persona["nome"]."\n");
//var_dump($persona);

print_r($persona);

//echo $persona; echo solo per le Stringhe

$classe = array(
    [
        "nome" => "Mario",
        "cogonome" => "Rossi",
        "email" => "a@b.it"
    ],
    [
        "nome" => "Giovanni",
        "cogonome" => "Verdi",
        "email" => "c@d.it"
    ]
);

print_r($classe[1]["email"]."\n");

for ($i=0; $i < count($classe); $i++) { 
    $allievo = $classe[$i];
    echo $allievo['nome']."\n";
}

echo "---------\n";

foreach ($classe as $i => $allievo) {
    echo $allievo['nome']."\n";
    echo $i."\n";
}

echo "---------\n";
# Dichiarativo / funzionale
//map di un array
function stampaNome($allievo) {
    echo $allievo['nome']."\n";
}
array_map('stampaNome', $classe);

echo "\n";