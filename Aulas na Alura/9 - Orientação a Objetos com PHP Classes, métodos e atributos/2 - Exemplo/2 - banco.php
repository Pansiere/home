<?php
require_once 'src/2 - Conta.php';
require_once 'src/2 - Titular.php';

/*
Opção alternativa para a linha 11:
    $titular = new Titular("123.456.789-10", "Nome do Titular");
    $primeiraConta = new Conta($titular);
*/

$primeiraConta = new Conta(new Titular('123.456.789-10', 'Vinicius Dias'));

$primeiraConta->deposita(500);
$primeiraConta->saca(300); // isso é ok

echo $primeiraConta->recuperaNomeTitular() . PHP_EOL;
echo $primeiraConta->recuperaCpfTitular() . PHP_EOL;
echo $primeiraConta->recuperaSaldo() . PHP_EOL;

$segundaConta = new Conta(new Titular('698.549.548-10', 'Patricia'));
var_dump($segundaConta);

$terceiraConta = new Conta(new Titular('123', 'Abcdefg'));

echo Conta::recuperaNumeroDeContas() . PHP_EOL;
