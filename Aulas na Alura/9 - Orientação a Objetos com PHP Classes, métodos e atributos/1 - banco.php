<?php

require_once 'src/1 - Conta.php';

$primeiraConta = new Conta('123.456.789-10', 'Vinicius Dias');

$primeiraConta->deposita(500);
$primeiraConta->saca(300);

echo "Saldo: R$" . $primeiraConta->recuperaSaldo();
echo "\nCPF do titular: " . $primeiraConta->recuperaCpfTitular() . PHP_EOL;



$segundaConta = new Conta('698.549.548-10', 'Patricia');
var_dump($segundaConta);

new Conta('123', 'Abcdefg');

new Conta('12323', 'Abcdefsg');

echo Conta::recuperaNumeroDeContas();
