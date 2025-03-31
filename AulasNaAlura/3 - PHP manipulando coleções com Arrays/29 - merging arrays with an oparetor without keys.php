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
    'Angela',
    'Patricia',
    'Jacira',
    'Kiko ',
    'Teste1',
    'Testando',
    'LaeleMilVezes',
    'Irineu',
    'VcNSabeNemEu',
    'MuitoClaro',
    'QualABoa',
    'Array merger',
];

//Observe que os indices serão sobreescritos.
$alunos2024 = $alunos2023 + $novosAlunos;
var_dump($alunos2024);
