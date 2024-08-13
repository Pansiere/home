<?php

require_once "Modelos/Produto.php";
require_once "Repositorio/ProdutoRepositorio.php";

use Pansiere\Alura\Repositorio\ProdutoRepositorio;

$produtoRepositorio = new ProdutoRepositorio(new PDO('mysql:host=172.30.0.2;dbname=serenatto', 'root', 'password'));

$dadosCafe = $produtoRepositorio->opcoesCafe();

$dadosAlmoco = $produtoRepositorio->opcoesAlmoco();

$produtos = $produtoRepositorio->buscarTodos();

$produtos = $produtoRepositorio->buscarTodos();
