<?php

require_once __DIR__ . "/src/2.1 - functions.php";

$caminhoArquivo = __DIR__ . '/filme.json';

$conteudoArquivoFilme = file_get_contents($caminhoArquivo);

$filme = json_decode($conteudoArquivoFilme, true);

$filme = criaFilme(
    nome: "Thor: Ragnarok",
    anoLancamento: 2021,
    nota: 7.8,
    genero: "super-herói"
);


var_dump($filme);
