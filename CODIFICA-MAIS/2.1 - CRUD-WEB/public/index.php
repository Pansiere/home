<?php

session_start();

require_once '../vendor/autoload.php';

use Pansiere\Crud\Produtos;

$produtos = new Produtos();

$_SESSION['categorias'] = [
    '1' => 'Eletrônicos',
    '2' => 'Eletrodomésticos',
    '3' => 'Móveis',
    '4' => 'Decoração',
    '5' => 'Vestuário',
    '6' => 'Outros'
];

$_SESSION['unidades_medidas'] = [
    '1' => 'Un',
    '2' => 'Kg',
    '3' => 'g',
    '4' => 'L',
    '5' => 'mm',
    '6' => 'cm',
    '7' => 'm',
    '8' => 'm²',
];

$_SESSION['produtos'] = [
    [
        'id' => 1,
        'nome' => 'Smartphone',
        'sku' => '123456',
        'unidade_medida_id' => '1',
        'valor' => 1500.00,
        'quantidade' => 10,
        'categoria_id' => '1',
    ],
    [
        'id' => 2,
        'nome' => 'Geladeira',
        'sku' => '123457',
        'unidade_medida_id' => '2',
        'valor' => 2500.00,
        'quantidade' => 5,
        'categoria_id' => '2',
    ]
];

header('Location: listagem.php');
