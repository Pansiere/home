<?php

$notasBimestre1 = [
    'JP' => 8, //array_diff
    'Maria' => '10',
    'Pedro' => 5,
    'Pansiere' => 7, //array_diff
    'Moyses' => 5,
    'Alou' => 4,
    'Joelma' => 6,
    'Vicente' => 4,
    'Vicent' => 4, //array_diff_assoc
];

$notasBimestre2 = [
    'JP' => 9,
    'Maria' => '10',
    'Pedro' => 5,
    'Pansiere' => 10,
    'Moyses' => 5,
    'Alou' => 4,
    'Joelma' => 5,
    'Vicente' => 4,
];

//Só leva em consideração o valor.
//Retorna um array contendo todas as entradas de array que não estão presentes em nenhum dos outros arrays. Chaves no array array são preservadas.
echo PHP_EOL . 'array_diff: ' . PHP_EOL;
var_dump(array_diff($notasBimestre1, $notasBimestre2));

//Compara array com arrays e retorna a diferença. Ao contrário de array_diff(), as chaves dos arrays também são usadas na comparação.
echo ' array_diff_assoc: ' . PHP_EOL;
var_dump(array_diff_assoc($notasBimestre1, $notasBimestre2));
