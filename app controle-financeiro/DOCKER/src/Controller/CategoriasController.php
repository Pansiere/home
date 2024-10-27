<?php

namespace Pansiere\ControleFinanceiro\Controller;

use Pansiere\ControleFinanceiro\Repository\CategoriasRepository;

class CategoriasController extends Controller
{
    public function __construct(
        private $categoriasRepository = new CategoriasRepository(),
    ) {}

    public function paginaCategorias(): void
    {
        $categorias = $this->categoriasRepository->encontrarTodasCategorias();
        require __DIR__ . "/../view/categorias.php";
    }

    public function deletarCategoria(int $categoriaId): void
    {
        $this->categoriasRepository->deletarCategoria($categoriaId);
        header("location: /categorias");
    }

    public function salvarCategoria(string $categoriaNome): void
    {
        $this->categoriasRepository->salvarCategoria($categoriaNome);
        header("location: /categorias");
    }

    public function editarCategoria(string $categoriaNome, int $editarCategoriaId): void
    {
        $this->categoriasRepository->editarCategoria($categoriaNome, $editarCategoriaId);
        header("location: /categorias");
    }
}
