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

if (is_array($notas)) {
    echo "\nSim, é um array\n";
}

var_dump(array_is_list($notas));

echo 'Moyses fez a prova: ';
var_dump(array_key_exists('Moyses', $notas));
