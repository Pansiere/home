<?php

require_once "conexcao-db.php";

$sql1 = "SELECT * FROM produtos WHERE tipo = 'Café' ORDER BY preco";
$sql2 = "SELECT * FROM produtos WHERE tipo = 'Almoço' ORDER BY preco";

$statement = $pdo->query($sql1);
$produtosCafe = $statement->fetchAll(PDO::FETCH_ASSOC);

$statement2 = $pdo->query($sql2);
$produtoAlmoco = $statement2->fetchAll(PDO::FETCH_ASSOC);
