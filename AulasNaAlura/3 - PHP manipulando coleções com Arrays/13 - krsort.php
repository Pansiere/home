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
