<?php
$array = [
    1 => 'um',
    true => 'dois',
    1.9 => 'tres',
    2 => 'dois',
];

var_dump($array);

//Manipula somente as chaves do array
foreach ($array as $key) {
    echo 'Primeiro foreach => Indice = ' . $key . PHP_EOL;
}
