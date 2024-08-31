<?php

namespace Pansiere\Crud;

use PDO;

class Produtos
{
    public function __construct(
        private PDO $pdo
    ) {}

    public function listar(): void
    {
        $produtos = $this;
        require __DIR__ . "/../public/listagem.php";
    }

    public function listarTodos(): array
    {

        $sql = "SELECT * FROM produtos ORDER BY valor";
        $statement = $this->pdo->query($sql);
        $dados = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $dados;
    }

    public function criar(): void
    {
        require __DIR__ . "/../public/formulario.php";
    }

    public function salvar() {}

    public function editar() {}

    public function atualizar() {}

    public function deletar() {}
};
