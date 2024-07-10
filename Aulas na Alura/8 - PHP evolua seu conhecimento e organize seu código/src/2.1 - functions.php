<?php

function criaFilme(string $nome, int $anoLancamento, float $nota, string $genero): array
{
    return [
        'nome' => $nome,
        'ano' => $anoLancamento,
        'nota' => $nota,
        'genero' => $genero
    ];
}
