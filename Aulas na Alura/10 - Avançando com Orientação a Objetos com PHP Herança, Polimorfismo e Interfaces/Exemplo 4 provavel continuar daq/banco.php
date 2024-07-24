<?php
require_once 'src/Modelo/Conta/Conta.php';
require_once 'src/Modelo/Endereco.php';
require_once 'src/Modelo/Pessoa.php';
require_once 'src/Modelo/Conta/Titular.php';
require_once 'src/Modelo/CPF.php';

use Alura\Banco\Modelo\Conta\Titular;
use Alura\Banco\Modelo\Endereco;
use Alura\Banco\Modelo\CPF;
use Alura\Banco\Modelo\Conta\Conta;

$endereco1 = new endereco('Aracruz', 'Coqueiral', 'Ipês', '111');
$endereco2 = new endereco('Jacaraipe', 'Jatobas', 'Jeranimos', '222');

$jp = new Titular(new CPF('123.456.789-10'), 'Joao Pedro Vicente', $endereco1);

$primeiraConta = new Conta($jp);

$primeiraConta->deposita(500);

$primeiraConta->saca(300); // isso é ok

echo $primeiraConta->recuperaNomeTitular() . PHP_EOL;
echo $primeiraConta->recuperaCpfTitular() . PHP_EOL;
echo $primeiraConta->recuperaSaldo() . PHP_EOL;

$patricia = new Titular(new CPF('6298.549.548-10'), 'Patricia', $endereco2);

$segundaConta = new Conta($patricia);

var_dump($segundaConta);

echo Conta::recuperaNumeroDeContas() . PHP_EOL;
