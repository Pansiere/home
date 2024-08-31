<?php

$uri = strtok($_SERVER['REQUEST_URI'], '?');
$page = rtrim($uri, '/') ?: '/';

require_once '../vendor/autoload.php';

use Pansiere\Crud\Produtos;

$produtos = new Produtos();

switch ($page) {
    case "/criar":
        $produtos->criar();
        break;

    case "/salvar":
        $produtos->salvar();
        break;

    default:
        $produtos->listar();
}
