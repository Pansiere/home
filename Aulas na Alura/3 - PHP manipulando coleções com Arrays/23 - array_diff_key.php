<?php

$notasBimestre1 = [
    'JP' => 8, //array_diff
    'Maria' => '10',
    'Pedro' => 5,
    'Pansiere' => 7,
    'Alou' => 12, //array_diff_key
    'Moyses' => 5,
    'Joelma' => 6,
    'Vicente' => 4,
    'Fulano' => 7,
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

echo "\nVerificando as chaves:\n";
//Levando em consideração as chaves
var_dump(array_diff_key($notasBimestre1, $notasBimestre2));

$array_diff_key = array_diff_key($notasBimestre1, $notasBimestre2);
echo 'O tipo da váriavel "$array_diff_key" é: ' . gettype($array_diff_key) . PHP_EOL;

foreach ($array_diff_key as $key => $value) {
    echo "\nA chave '$key' armazena o valor $value no array " . '$notasBimestre1. Porém essa chave não está presente no array $notasBimestre2';
}
echo "\n";

//Retorna um array de todas as chaves em array.
//Pegando somente as chaves do array $array_diff_key
var_dump(array_keys($array_diff_key));
$array_keys = array_keys($array_diff_key);

foreach ($array_keys as $key => $value) {
    echo "\nA chave '$key' armazena o valor $value no array\nO aluno(a) $value não fez a prova do 2º bimestre\n";
}
