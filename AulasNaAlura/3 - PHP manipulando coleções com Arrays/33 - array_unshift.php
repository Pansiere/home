<?php
// O spread operator ... em PHP é uma ferramenta poderosa que facilita a manipulação de arrays e a passagem de múltiplos argumentos em funções. Ele torna o código mais limpo e legível ao permitir a expansão de arrays e a coleta de múltiplos argumentos de forma concisavar_dump($alunos2024);

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
    'Kiko '
];

//spread operator
$alunos2024 = [...$alunos2023, 'Joao Pedro', ...$novosAlunos];

//Add no final do array
$alunos2024[] = 'TestandoTestando';

//Add no inicia do array
//Returns the new number of elements in the array.
array_unshift($alunos2024, 'Primeirao', 'Segundo');

var_dump($alunos2024);
