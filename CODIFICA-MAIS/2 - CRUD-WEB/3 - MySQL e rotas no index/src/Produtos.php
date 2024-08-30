<?php

namespace Pansiere\Crud;

class Produtos
{
    public function listar(): void
    {
        $produtos = $_SESSION['produtos'];
        require __DIR__ . "/../public/listagem.php";
    }

    public function criar()
    {
        require __DIR__ . "/../public/formulario.php";
    }

    public function salvar()
    {
        $_SESSION['produtos'][$this->getArray() + 1] = [
            'id' => $this->getArray() + 2,
            'nome' => $_POST['nome'],
            'sku' => $_POST['sku'],
            'udm' => $_POST['udm'],
            'valor' => $_POST['valor'],
            'quantidade' => $_POST['quantidade'],
            'categoria_id' => $_POST['categoria_id']
        ];

        header('Location: /listagem');
    }

    public function editar($editar_header_key)
    {
        $_SESSION['editar_key'] = $editar_header_key;

        header('Location: editar.php');
        exit();
    }

    public function atualizar($key, int $id, string $nome, string $sku, string $unidade_medida_id, float $valor, int $quantidade, string $categoria_id)
    {
        $_SESSION['produtos'][$key] = [
            'id' => $id,
            'nome' => $nome,
            'sku' => $sku,
            'udm' => $unidade_medida_id,
            'valor' => $valor,
            'quantidade' => $quantidade,
            'categoria_id' => $categoria_id
        ];

        header('Location: listagem.php');
        exit();
    }

    public function deletar($key)
    {
        unset($_SESSION['produtos'][$key]);
        header('Location: listagem.php');
        exit();
    }

    public function getArray()
    {
        return array_key_last($_SESSION['produtos']);
    }
};
