<?php

require_once "conexcao-db.php";
require_once "Modelos/Produto.php";

use Pansiere\Alura\Modelos\Produto;

# Produtos Cafe >>>
$sql1 = "SELECT * FROM produtos WHERE tipo = 'Café' ORDER BY preco";

$statement = $pdo->query($sql1);
$produtosCafe = $statement->fetchAll(PDO::FETCH_ASSOC);

function funcCafe($cafe)
{
    return new Produto(
        $cafe['id'],
        $cafe['tipo'],
        $cafe['nome'],
        $cafe['descricao'],
        $cafe['imagem'],
        $cafe['preco']
    );
};

#A função array_map('func', $produtosCafe) aplica a função 'func' a cada elemento do array '$produtosCafe'.
$dadosCafe = array_map('funcCafe', $produtosCafe);
# Produtos Cafe <<<

# Produtos Almoço >>>
$sql2 = "SELECT * FROM produtos WHERE tipo = 'Almoço' ORDER BY preco";

$statement2 = $pdo->query($sql2);
$produtoAlmoco = $statement2->fetchAll(PDO::FETCH_ASSOC);

function funcAlmoco($almoco)
{
    return new Produto(
        $almoco['id'],
        $almoco['tipo'],
        $almoco['nome'],
        $almoco['descricao'],
        $almoco['imagem'],
        $almoco['preco']
    );
};

$dadosAlmoco = array_map('funcAlmoco', $produtoAlmoco);
# Produtos Almoço <<<
