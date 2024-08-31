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

    public function criar(): void # joga a tela de formulario para
    {
        $produtos = $this;
        require __DIR__ . "/../public/formulario.php";
    }

    public function salvar() # pega os dados do formulario e joga no array da session
    {}

    public function editar($produto_id): void # joga a tela de formulario, com os dados do item q ele escolheu
    {
        $produtos = $this;
        require __DIR__ . "/../public/formulario.php";
    }
    public function atualizar() # atualiza os dados que ele editou 
    {}

    public function deletar($id): void
    {
        $sql = "DELETE FROM produtos WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $id);
        $statement->execute();

        header("Location: /listagem");
        exit;
    }

    public function buscarPorId($produto_id): array
    {
        $sql = "SELECT * FROM produtos WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([$produto_id]);

        return $statement->fetch(PDO::FETCH_ASSOC);
    }
};
