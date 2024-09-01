<?php
session_start();
require_once '../vendor/autoload.php';

use Pansiere\Crud\Produtos;

$uri = strtok($_SERVER['REQUEST_URI'], '?');
$page = rtrim($uri, '/') ?: '/';

$produtos = new Produtos(
    $pdo = new PDO(
        'mysql:host=172.29.0.2;dbname=crud_web',
        'root',
        'password'
    )
);

switch ($page) {
    case "/criar":
        $produtos->criar();
        break;

    case "/editar":
        $produtos->editar($_POST['produto_id']);
        break;

    case "/salvar":
        $produtos->salvar();
        break;

    case "/deletar":
        $produtos->deletar($_POST['produto_id']);
        break;

    case "/atualizar":
        $produtos->atualizar();
        break;

    default:
        $produtos->listar();
}
