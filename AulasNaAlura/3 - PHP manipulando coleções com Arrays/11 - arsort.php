<?php

$notas = [
    'JP' => 12,
    'Maria' => 2,
    'Pedro' => 5,
    'Pansiere' => 7
];

arsort($notas);
var_dump($notas);

foreach ($notas as $key => $value) {
    echo 'Aluno: ' . $key . "\nNota: " . $value . PHP_EOL;
}
