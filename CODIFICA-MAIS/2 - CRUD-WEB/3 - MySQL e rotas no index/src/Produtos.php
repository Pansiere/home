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
        $sql = "SELECT produtos.*, unidades_medidas.unidade_medida, categorias.categoria
        FROM produtos
        INNER JOIN unidades_medidas ON produtos.unidade_medida_id = unidades_medidas.id
        INNER JOIN categorias ON produtos.categoria_id = categorias.id
        ORDER BY valor;";
        $statement = $this->pdo->query($sql);
        $dados = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $dados;
    }

    public function criar(): void
    {
        $produtos = $this;
        require __DIR__ . "/../public/formulario.php";
    }

    public function salvar() {}

    public function editar() {}

    public function atualizar() {}

    public function deletar($id): void
    {
        $sql = "DELETE FROM produtos WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $id);
        $statement->execute();

        header("Location: /listagem");
        exit;
    }
};
