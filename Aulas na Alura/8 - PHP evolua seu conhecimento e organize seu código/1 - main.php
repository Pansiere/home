<?php

require_once __DIR__ . "/src/1.1 - functions.php";

echo "Bem vindo(a) ao screen match!\n";

$nomeFilme = "V&J";
$nomeFilme = "Victoria";
$nomeFilme = "Lindona";

$anoLancamento = $argv[1] ?? 2022;

$somaDeNotas = 9;
$somaDeNotas += 6;
$somaDeNotas += 8;
$somaDeNotas += 7.5;
$somaDeNotas += 5;

$sotaFilme = $somaDeNotas / 5;
$planoPrime = true;

$incluidoNoPlano = $planoPrime || $anoLancamento < 2020;

echo "Nome do filme: " . $nomeFilme . "\n";

if ($anoLancamento > 2022) {
    echo "Esse filme é um lançamento\n";
} elseif ($anoLancamento > 2020 && $anoLancamento <= 2022) {
    echo "Esse filme ainda é novo\n";
} else {
    echo "Esse filme n]ao é um lançamento\n";
}

$filme = [
    "nome" => "Alguma: coisa",
    "ano" => 2021,
    "nota" => 7.8,
    "genero" => "estudando"
];

$genero = match ($nomeFilme) {
    "V&J" => "ação",
    "Victoria" => "super-horaina",
    "Lindona" => "comédia",
    default => "Nada-a-Declarar",
};

echo "O gênero do filme é: $genero\n";

echo json_encode($filme);

#var_dump(json_decode('{"nome":"Alguma: coisa","ano":"2021","nota":7.8,"genero":"estudando"}', true));

// echo json_decode('{"nome":"Alguma: coisa","ano":"2021","nota":7.8,"genero":"estudando"}', true);

$filmeComoStringJson = json_encode($filme);

file_put_contents(__DIR__ . '/filme.json', $filmeComoStringJson);
