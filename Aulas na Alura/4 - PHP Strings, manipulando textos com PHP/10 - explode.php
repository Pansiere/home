<?php

$nome = 'João Pedro Vicente Pansiere';
$email = 'PANSIERE2001@gmail.com';
$senha = 'Àéíóû';

echo mb_strlen($senha) . PHP_EOL;

//Retorna o tamanho da string em bytes.
if (mb_strlen($senha) < 8) {
    echo "\nSenha insegura\n";
}

//buscar a posição de '@' dentro de $mail
$posicaoDoArroba = strpos($email, '@');

$usuario = substr($email, 0, $posicaoDoArroba);

echo strtolower($usuario) . PHP_EOL;
echo substr($email, $posicaoDoArroba + 1) . PHP_EOL;

var_dump(explode(' ', $nome));

list($nome, $sobrenome) = explode(' ', $nome);

echo 'Nome: ' . $nome . PHP_EOL;
echo 'Sobrenome: ' . $sobrenome . PHP_EOL;

$csv = 'João Pedro,22,pansiere2001@gmail.com';
var_dump(explode(',', $csv));
