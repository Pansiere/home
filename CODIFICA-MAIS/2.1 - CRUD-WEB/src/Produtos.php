<?php

namespace Pansiere\Crud;

class Produtos
{
    public function listar()
    {
        $a = 'a';
    }

    public function criar() //redireciona para formulario.php
    {
        $a = 'a';
    }

    public function salvar(int $id, string $nome, string $sku, string $unidade_medida_id, float $valor, int $quantidade, string $categoria_id) //botao SALVAR item em formulario.php
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

    public function editar() //redireciona para editar.php
    {
        $a = 'a';
    }

    public function atualizar($key, int $id, string $nome, string $sku, string $unidade_medida_id, float $valor, int $quantidade, string $categoria_id) //botao EDITAR/ATUALIZAR item em editar.php
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

    public function deletar($key) //botao DELETAR item em listagem.php
    {
        unset($_SESSION['produtos'][$key]);
        header('Location: listagem.php');
    }
};
