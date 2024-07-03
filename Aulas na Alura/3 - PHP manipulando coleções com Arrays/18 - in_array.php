<?php

$notas = [
    'JP' => NULL,
    'Maria' => 10,
    'Pedro' => 5,
    'Pansiere' => 7,
    'Alou' => 4,
    'Moyses' => 5,
    'Joelma' => 6,
    'Vicente' => 9,
];

krsort($notas);
var_dump($notas);

if (is_array($notas)) {
    echo "\nSim, é um array\n";
}

echo PHP_EOL . "Array é lista?";
var_dump(array_is_list($notas));

echo PHP_EOL . 'JP fez a prova: ';
var_dump(isset($notas['JP']));

echo PHP_EOL . 'Alguém tirou 10? ';
var_dump(in_array(10, $notas));

echo PHP_EOL . 'Alguém tirou 1? ';
var_dump(in_array(1, $notas));
