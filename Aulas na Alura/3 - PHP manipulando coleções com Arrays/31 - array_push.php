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

//array_push() trata array como uma pilha, e adiciona as variáveis passadas como argumentos no final de array. O tamanho do array aumenta de acordo com o número de variáveis adicionadas.
array_push($alunos2024, 'Rolindo', 'Gomes', 'Ipês');

var_dump($alunos2024);
