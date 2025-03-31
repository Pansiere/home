<?php

echo "Bem vindo(a) ao screen match!\n";

$nomeFilme = "V&J";
$nomeFilme = "Victoria";
$nomeFilme = "Lindona";

$anoLancamento = 2022;

$somaDeNotas = 0;

for ($i = 1; $i < $argc; $i++) {
    $somaDeNotas += $argv[$i];
};

$quantidadeDeNotas = $argc - 1;

$sotaFilme = $somaDeNotas / $quantidadeDeNotas;

$planoPrime = true;

$incluidoNoPlano = $planoPrime || $anoLancamento < 2020;

echo "Nota do filme: $sotaFilme\n";
echo "Nome do filme: " . $nomeFilme . "\n";

if ($anoLancamento > 2022) {
    echo "Esse filme é um lançamento\n";
} elseif ($anoLancamento > 2020 && $anoLancamento <= 2022) {
    echo "Esse filme ainda é novo\n";
} else {
    echo "Esse filme n]ao é um lançamento\n";
}

$genero = match ($nomeFilme) {
    "V&J" => "ação",
    "Victoria" => "super-horaina",
    "Lindona" => "comédia",
    default => "Nada-a-Declarar",
};

echo "O gênero do filme é: $genero\n";

echo $argc;
