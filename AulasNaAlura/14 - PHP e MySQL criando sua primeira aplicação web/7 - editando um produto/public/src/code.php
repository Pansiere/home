<?php

require_once "Modelos/Produto.php";
require_once "Repositorio/ProdutoRepositorio.php";

use Pansiere\Alura\Repositorio\ProdutoRepositorio;
use Pansiere\Alura\Modelos\Produto;

$produtoRepositorio = new ProdutoRepositorio(new PDO('mysql:host=172.30.0.2;dbname=serenatto', 'root', 'password'));
$produtoRepositorio = new ProdutoRepositorio(new PDO('mysql:host=172.30.0.2;dbname=serenatto', 'root', 'password'));

$dadosCafe = $produtoRepositorio->opcoesCafe();

$dadosAlmoco = $produtoRepositorio->opcoesAlmoco();

$produtos = $produtoRepositorio->buscarTodos();

if (isset($_POST['cadastro'])) {

    $produto = new Produto(
        null,
        $_POST['tipo'],
        $_POST['nome'],
        $_POST['descricao'],
        $_POST['imagem'],
        $_POST['preco'],
    );

    $produtoRepositorio->salvar($produto);

    header("Location: admin.php");
    exit();
}


if (isset($_GET['id'])) {

    $produto = $produtoRepositorio->buscar((int)$_GET['id']);
}

if (isset($_POST['editar'])) {

    $produtoRepositorio->editar(
        (int) $_GET['id'],
        (string) $_POST['tipo'],
        (string) $_POST['nome'],
        (string) $_POST['descricao'],
        (float)$_POST['preco']
    );

    header("Location: admin.php");
    exit();
}
