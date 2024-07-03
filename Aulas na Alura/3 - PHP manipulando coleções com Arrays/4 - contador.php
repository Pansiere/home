<?php
$array = [
    1 => 'um',
    true => 'dois',
    1.9 => 'tres',
    2 => 'dois',
    3 => '4',
    4 => '5',
    5 => '6',
    6 => '6',
];

var_dump($array);

$contador = 0;
//Manipula as índices e as chaves do array
foreach ($array as $key => $value) {
    echo 'A índice ' . $key . ' armazena o valor: ' . $value . PHP_EOL;
    $contador++;
}
echo "Total: $contador" . PHP_EOL;
