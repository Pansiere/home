<?php

$alunos2023 = [
    0 => 'JP',
    1 => 'Victoria',
    2 => 'Maria',
    3 => 'Pansiere',
    4 => 'Alou',
    5 => 'Moyses',
    6 => 'Joelma',
    7 => 'Vicente',
    8 => 'Fulano',
];

$novosAlunos = [
    9 => 'Angela',
    10 => 'Patricia',
    11 => 'Jacira',
    12 => 'Kiko ',
];

$alunos2024 = $alunos2023 + $novosAlunos;

var_dump($alunos2024);
