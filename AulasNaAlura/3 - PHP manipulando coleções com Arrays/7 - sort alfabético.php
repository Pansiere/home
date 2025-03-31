<?php
$notas = [
    'Um',
    'Dois',
    'Tres',
    'Quatro'
];

//Ordenação alfabética
$notasOrdenadas = $notas;
sort(array: $notasOrdenadas);

echo 'Desordenadas: ' . PHP_EOL;
var_dump($notas);

echo 'Ordenadas: ' . PHP_EOL;
var_dump($notasOrdenadas);
