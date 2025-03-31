<?php

$alunos2023 = [
    'JP',
    'Victoria',
    'Maria',
    'Pansiere',
    'Alou',
    'Moyses',
    'Joelma',
    'Vicente',
    'Fulano',
];

$novosAlunos = [
    'Patricia',
    'Angela',
    'Jacira',
    'Kiko ',
];

//Retorna o array resultante. Se chamado sem argumentos, retorna um array vazio.
$alunos2024 = array_merge($alunos2023, $novosAlunos);

var_dump($alunos2024);

echo "\nExibindo a chave 11 do array: $alunos2024[11]";
