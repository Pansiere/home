<?php

$alunos2023 = [
    'teste' => 'JP',
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
    'teste' => 'Angela',
    'Patricia',
    'Jacira',
    'Kiko ',
];

//Retorna o array resultante. Se chamado sem argumentos, retorna um array vazio.
$alunos2024 = array_merge($alunos2023, $novosAlunos);

var_dump($alunos2024);

echo "\nExibindo a chave 10 do array: $alunos2024[10]";
echo "\nExibindo a chave 'teste' do array: $alunos2024[teste]";
