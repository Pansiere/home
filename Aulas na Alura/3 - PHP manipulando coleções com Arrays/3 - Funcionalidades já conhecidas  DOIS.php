<?php
$array = [
    1 => 'um',
    true => 'dois',
    1.9 => 'tres',
    2 => 'dois',
];

var_dump($array);

//Manipula as índices e as chaves do array
foreach ($array as $key => $value) {
    echo 'Indice ' . $key . ' tem valor: ' . $value . PHP_EOL;
}
