<?php

namespace Pansiere\ControleFinanceiro\Repository;

use Pansiere\ControleFinanceiro\DB\BancoDeDados;
use Pansiere\ControleFinanceiro\Models\Categoria;

class CategoriasRepository
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = BancoDeDados::ConexaoDB();
    }

    private function criarObjetoCategoria(array $categoriasArray): Categoria
    {
        return new Categoria(
            id: (int)$categoriasArray['id'],
            nome: (string)$categoriasArray['nome'],
            usuarioId: (int)$_SESSION['usuario_id']
        );
    }

    public function encontrarTodasCategorias(): array
    {
        try {
            $sql = "SELECT id, nome FROM categorias WHERE usuario_id = ?";
            $statement = $this->pdo->prepare(query: $sql);
            $statement->bindValue(param: 1, value: $_SESSION['usuario_id']);
            $statement->execute();
            $categoriasArray = $statement->fetchAll(\PDO::FETCH_ASSOC);

            return array_map(callback: [$this, 'criarObjetoCategoria'], array: $categoriasArray);
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }

    public function encontrarCategoriaPorNome(string $categoriaNome): ?Categoria
    {
        try {
            $sql = "SELECT id, nome FROM categorias WHERE nome = ?";
            $statement = $this->pdo->prepare(query: $sql);
            $statement->bindValue(param: 1, value: $categoriaNome);
            $statement->execute();

            $categoriaArray = $statement->fetch(mode: \PDO::FETCH_ASSOC);

            if ($categoriaArray) {
                return $this->criarObjetoCategoria(categoriasArray: $categoriaArray);
            }
            return null;
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }

    public function encontrarCategoriaPorId(int $categoriaId): ?Categoria
    {
        try {
            $sql = "SELECT id, nome FROM categorias WHERE id = ?";
            $statement = $this->pdo->prepare(query: $sql);
            $statement->bindValue(param: 1, value: $categoriaId, type: \PDO::PARAM_INT);
            $statement->execute();

            $categoriaArray = $statement->fetch(mode: \PDO::FETCH_ASSOC);

            if ($categoriaArray) {
                return $this->criarObjetoCategoria(categoriasArray: $categoriaArray);
            }
            return null;
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }

    public function deletarCategoria(int $categoriaId): void
    {
        $categoria = $this->encontrarCategoriaPorId(categoriaId: $categoriaId);

        try {
            $sql = "DELETE FROM categorias WHERE id = ?";
            $statement = $this->pdo->prepare(query: $sql);
            $statement->bindValue(param: 1, value: $categoria->getId(), type: \PDO::PARAM_INT);
            $statement->execute();
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }

    public function salvarCategoria(string $categoriaNome): void
    {
        $categoria = $this->criarObjetoCategoria(categoriasArray: ['id' => NULL, 'nome' => $categoriaNome]);

        try {
            $sql = "INSERT INTO categorias (nome, usuario_id) VALUES (?, ?)";
            $statement = $this->pdo->prepare(query: $sql);
            $statement->bindValue(param: 1, value: $categoria->getNome());
            $statement->bindValue(param: 2, value: $_SESSION['usuario_id'], type: \PDO::PARAM_INT);
            $statement->execute();
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }

    public function editarCategoria(string $categoriaNome, int $editarCategoriaId): void
    {
        $categoria = $this->encontrarCategoriaPorId(categoriaId: $editarCategoriaId);

        try {
            $sql = "UPDATE categorias SET nome = ? WHERE id = ?";
            $statement = $this->pdo->prepare(query: $sql);
            $statement->bindValue(param: 1, value: $categoriaNome);
            $statement->bindValue(param: 2, value: $categoria->getId(), type: \PDO::PARAM_INT);
            $statement->execute();
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }
}
