<?php

namespace Panseiere\Alura\Repositorio;

use PDO;
use Pansiere\Alura\Modelos\Produto;

class ProdutoRepositorio
{
    public function __construct(
        private PDO $pdo
    ) {}

    public function opcoesCafe(): array
    {
        $sql1 = "SELECT * FROM produtos WHERE tipo = 'Café' ORDER BY preco";

        $statement = $this->pdo->query($sql1);
        $produtosCafe = $statement->fetchAll(PDO::FETCH_ASSOC);

        $dadosCafe = array_map(function ($cafe) {
            return new Produto(
                $cafe['id'],
                $cafe['tipo'],
                $cafe['nome'],
                $cafe['descricao'],
                $cafe['imagem'],
                $cafe['preco']
            );
        }, $produtosCafe);

        return $dadosCafe;
    }
}
