<?php
require_once 'src/4 - Conta.php';
require_once 'src/4 - Titular.php';
require_once 'src/4 - CPF.php';

/*
#REFERENCIA AO ARQUIVO "2 - Exemplo"
Opção alternativa para a linha 11:
    $titular = new Titular("123.456.789-10", "Nome do Titular");
    $primeiraConta = new Conta($titular);
*/

$jp = new Titular(new CPF('123.456.789-10'), 'Joao Pedro Vicente');
$primeiraConta = new Conta($jp);

$primeiraConta->deposita(500);
$primeiraConta->saca(300); // isso é ok

echo $primeiraConta->recuperaNomeTitular() . PHP_EOL;
echo $primeiraConta->recuperaCpfTitular() . PHP_EOL;
echo $primeiraConta->recuperaSaldo() . PHP_EOL;

$patricia = new Titular(new CPF('6298.549.548-10'), 'Patricia');
$segundaConta = new Conta($patricia);
var_dump($segundaConta);

echo Conta::recuperaNumeroDeContas() . PHP_EOL;
