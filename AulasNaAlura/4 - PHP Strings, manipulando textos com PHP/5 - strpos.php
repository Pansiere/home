<?php

$email = 'pansiere2001@gmail.com';

//buscar a posição de '@' dentro de $mail
$posicaoDoArroba = strpos($email, '@');

echo substr($email, 0, $posicaoDoArroba) . PHP_EOL;
echo substr($email, $posicaoDoArroba + 1) . PHP_EOL;
