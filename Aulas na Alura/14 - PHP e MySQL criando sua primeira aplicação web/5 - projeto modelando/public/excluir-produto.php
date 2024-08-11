<?php

require_once "src/Modelos/Produto.php";
require_once "src/Repositorio/ProdutoRepositorio.php";

use Panseiere\Alura\Repositorio\ProdutoRepositorio;

$produtudoRepositorio = new ProdutoRepositorio(new PDO('mysql:host=172.30.0.2;dbname=serenatto', 'root', 'password'));

$produtudoRepositorio->deletar($_GET['id']);
