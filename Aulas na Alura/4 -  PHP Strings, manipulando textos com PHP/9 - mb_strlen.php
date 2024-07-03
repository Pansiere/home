<?php

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
