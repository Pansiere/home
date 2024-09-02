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
        $produto_id = null;
        $produtos = $this;
        require __DIR__ . "/../public/formulario.php";
    }

    public function salvar(): void
    {
        $sql = "INSERT INTO `produtos`(`nome`, `sku`, `valor`, `quantidade`, `unidade_medida_id`, `categoria_id`) VALUES (?,?,?,?,?,?)";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $_POST['nome']);
        $statement->bindValue(2, $_POST['sku']);
        $statement->bindValue(3, $_POST['valor']);
        $statement->bindValue(4, $_POST['quantidade']);
        $statement->bindValue(5, $_POST['unidade_medida_id']);
        $statement->bindValue(6, $_POST['categoria_id']);
        $statement->execute();

        header("location: /");
        exit();
    }

    public function editar($produto_id): void
    {
        $produtos = $this;
        require __DIR__ . "/../public/formulario.php";
    }
    public function atualizar(): void
    {
        $sql = "UPDATE `produtos`
            SET `nome` = ?,`sku` = ?, `valor` = ?, `quantidade` = ?, `unidade_medida_id` = ?, `categoria_id` = ?
            WHERE `produtos`.`id` = ?;";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $_POST['nome']);
        $statement->bindValue(2, $_POST['sku']);
        $statement->bindValue(3, $_POST['valor']);
        $statement->bindValue(4, $_POST['quantidade']);
        $statement->bindValue(5, $_POST['unidade_medida_id']);
        $statement->bindValue(6, $_POST['categoria_id']);
        $statement->bindValue(7, $_POST['id']);
        $statement->execute();

        header("location: /");
        exit();
    }

    public function deletar($produto_id): void
    {
        $sql = "DELETE FROM produtos WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $produto_id);
        $statement->execute();

        header("location: /");
        exit();
    }

    public function buscarPorId($produto_id): array
    {
        $sql = "SELECT * FROM produtos WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([$produto_id]);

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function checarEstoque(): string
    {
        $sql = "SELECT * FROM produtos";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return empty($result) ? "Sem produtos no estoque" : "";
    }
}
