<?php

$notasBimestre1 = [
    'JP' => 8, //array_diff
    'Maria' => '10',
    'Pedro' => 5,
    'Pansiere' => 7,
    'Alou' => 4, //array_diff_key
    'Moyses' => 5,
    'Joelma' => 6,
    'Vicente' => 4,
];

$notasBimestre2 = [
    'JP' => 9, //array_diff
    'Maria' => '10',
    'Pedro' => 5,
    'Pansiere' => 7,
    'Moyses' => 5,
    'Joelma' => 6,
    'Vicente' => 4,
];

echo "\Verificando valores:\n";
//Só leva em consideração o valor
var_dump(array_diff($notasBimestre1, $notasBimestre2));

echo "\nVerificando as chaves:\n";
//Levando em consideração as chaves
var_dump(array_diff_key($notasBimestre1, $notasBimestre2));
