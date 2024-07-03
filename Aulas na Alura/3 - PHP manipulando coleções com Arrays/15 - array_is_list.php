<?php

$notas = [
    'JP' => 12,
    'Maria' => 2,
    'Pedro' => 5,
    'Pansiere' => 7,
    'Alou' => 4,
    'Moyses' => 5,
    'Joelma' => 6,
    'Vicente' => 10,
];

krsort($notas);
var_dump($notas);

echo 'Alunos por ordem alfabética decrescente:' . PHP_EOL;

foreach ($notas as $key => $value) {

    echo "\nAluno: " . $key . "\nNota: " . $value . PHP_EOL;
}

//is_array
if (is_array($notas)) {
    echo "\nSim, é um array\n";
}

var_dump(array_is_list($notas));

$notas2 = [
    12,
    2,
];

var_dump(array_is_list($notas2));
