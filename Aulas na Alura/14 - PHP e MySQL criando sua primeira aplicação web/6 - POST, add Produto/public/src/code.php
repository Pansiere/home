<?php

require_once "Modelos/Produto.php";
require_once "Repositorio/ProdutoRepositorio.php";

use Pansiere\Alura\Repositorio\ProdutoRepositorio;
use Pansiere\Alura\Modelos\Produto;

$produtudoRepositorio = new ProdutoRepositorio(new PDO('mysql:host=172.30.0.2;dbname=serenatto', 'root', 'password'));

$dadosCafe = $produtudoRepositorio->opcoesCafe();

$dadosAlmoco = $produtudoRepositorio->opcoesAlmoco();

$produtos = $produtudoRepositorio->buscarTodos();

if (isset($_POST['cadastro'])) {
    $produto = new Produto(
        null,
        $_POST['tipo'],
        $_POST['nome'],
        $_POST['descricao'],
        $_POST['imagem'],
        $_POST['preco'],
    );

    $produtudoRepositorio->salvar($produto);

    header("Location: admin.php");
}
