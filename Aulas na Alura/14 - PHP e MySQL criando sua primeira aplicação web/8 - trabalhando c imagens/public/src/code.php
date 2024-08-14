<?php

require_once "Modelos/Produto.php";
require_once "Repositorio/ProdutoRepositorio.php";

use Pansiere\Alura\Repositorio\ProdutoRepositorio;
use Pansiere\Alura\Modelos\Produto;

$produtoRepositorio = new ProdutoRepositorio(new PDO('mysql:host=172.30.0.2;dbname=serenatto', 'root', 'password'));

$dadosCafe = $produtoRepositorio->opcoesCafe();

$dadosAlmoco = $produtoRepositorio->opcoesAlmoco();

$produtos = $produtoRepositorio->buscarTodos();

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

if (isset($_POST['cadastro'])) {

    #    header("Location: admin.php");

    $produto = new Produto(
        null,
        $_POST['tipo'],
        $_POST['nome'],
        $_POST['descricao'],
        $_POST['preco'],
        null,
    );

    if (isset($_FILES['imagem'])) {

        $produto->setImagem(uniqid() . $_FILES['imagem']['name']);

        move_uploaded_file($_FILES['imagem']['tmp_name'], $produto->getImagemDiretorio());
    }

    $produtoRepositorio->salvar($produto);

    exit();
}



/*
    var_dump($_FILES);
    var_dump($_POST);
    var_dump($produto->getImagem());
    img/66bcbd0d9fb8fcafe.png
*/