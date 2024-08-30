<?php

namespace Pansiere\Crud;

class Produtos
{
    public function listar(): array
    {
        return $_SESSION['produtos'];
    }

    public function criar()
    {
        header('Location: formulario.php');
        exit();
    }

    public function salvar(int $id, string $nome, string $sku, string $unidade_medida_id, float $valor, int $quantidade, string $categoria_id)
    {
        $_SESSION['produtos'][] = [
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
};
