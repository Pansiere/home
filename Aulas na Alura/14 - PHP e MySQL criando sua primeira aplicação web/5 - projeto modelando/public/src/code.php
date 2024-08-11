<?php

require_once "conexcao-db.php";
require_once "Modelos/Produto.php";

use Pansiere\Alura\Modelos\Produto;

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
