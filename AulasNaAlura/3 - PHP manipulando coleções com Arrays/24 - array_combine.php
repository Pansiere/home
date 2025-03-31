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

$alunosFaltantes = array_diff_key($notasBimestre1, $notasBimestre2);
$nomesAlunos = array_keys($alunosFaltantes);
$notasAlunos = array_values($alunosFaltantes);

//Retorna o array combinado.
echo 'Nesse exemplo:' . PHP_EOL .  'key = $notasAlunos, e value = $nomesAlunos' . PHP_EOL;
var_dump(array_combine($notasAlunos, $nomesAlunos));

echo 'Nesse exemplo:' . PHP_EOL .  'key = $nomesAlunos e value = $notasAlunos' . PHP_EOL;
var_dump(array_combine($nomesAlunos, $notasAlunos));
