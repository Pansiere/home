<?php

$email = 'pansiere2001@gmail.com';
$senha = '123';

//Retorna o tamanho da string em bytes.
if (strlen($senha) < 8) {
    echo "Senha insegura\n";
}

//buscar a posição de '@' dentro de $mail
$posicaoDoArroba = strpos($email, '@');

echo substr($email, 0, $posicaoDoArroba) . PHP_EOL;
echo substr($email, $posicaoDoArroba + 1) . PHP_EOL;
