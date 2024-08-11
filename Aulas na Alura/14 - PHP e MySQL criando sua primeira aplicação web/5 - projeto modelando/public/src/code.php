<?php

require_once "Modelos/Produto.php";
require_once "Repositorio/ProdutoRepositorio.php";

use Panseiere\Alura\Repositorio\ProdutoRepositorio;

$produtudoRepositorio = new ProdutoRepositorio(new PDO('mysql:host=172.30.0.2;dbname=serenatto', 'root', 'password'));

$dadosCafe = $produtudoRepositorio->opcoesCafe();

$dadosAlmoco = $produtudoRepositorio->opcoesAlmoco();

$produtos = $produtudoRepositorio->buscarTodos();
