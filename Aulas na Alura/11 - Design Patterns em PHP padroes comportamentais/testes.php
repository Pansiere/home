<?php

use Alura\DesignPattern\{CalculadoraDeImpostos, Orcamento};


require 'vendor/autoload.php';

$calculadora = new CalculadoraDeImpostos();

$orcamento = new Orcamento();
$orcamento->valor = 100;

echo $calculadora->calcula($orcamento, 'ICMS');
