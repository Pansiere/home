<?php

require_once 'src/1 - Conta.php';

$primeiraConta = new Conta('123.456.789-10', 'Vinicius Dias');

$primeiraConta->deposita(500);
$primeiraConta->saca(300);

echo "Saldo: R$" . $primeiraConta->recuperaSaldo();
echo "\nCPF do titular: " . $primeiraConta->recuperaCpfTitular();
