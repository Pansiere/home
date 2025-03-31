<?php
$notas = [
    [
        'aluno' => 'Maria',
        'nota' => 10,
    ],
    [
        'aluno' => 'JP',
        'nota' => 9,
    ],
    [
        'aluno' => 'Victoria',
        'nota' => 8,
    ],
    [
        'aluno' => 'LaEle',
        'nota' => 12,
    ]
];

function ordenaNotas(array $nota1, array $nota2): int
{
    return $nota2['nota'] <=> $nota1['nota'];
}

usort(array: $notas, callback: 'ordenaNotas');
var_dump($notas);
