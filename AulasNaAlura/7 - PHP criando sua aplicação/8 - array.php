<?php

echo "Bem vindo(a) ao screen match!\n";

$nomeFilme = "V&J";
$nomeFilme = "Victoria";
$nomeFilme = "Lindona";

$anoLancamento = 2022;

$quantidadeDeNotas = $argc - 1;

$notas = [];

for ($i = 1; $i < $argc; $i++) {
    $notas[] = (float)$argv[$i];
};

$somaDeNotas = 0;

for ($i = 1; $i < count($notas); $i++) {
    $somaDeNotas += $notas[$i];
};

$quantidadeDeNotas = $argc - 1;

$notaFilme = $somaDeNotas / $quantidadeDeNotas;

$planoPrime = true;

$incluidoNoPlano = $planoPrime || $anoLancamento < 2020;

echo "Nota do filme: $notaFilme\n";
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
