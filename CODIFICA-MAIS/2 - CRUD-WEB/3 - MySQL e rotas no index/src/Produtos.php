<?php

namespace Pansiere\Crud;

class Produtos
{
    public function listar(): void
    {
        require __DIR__ . "/../public/listagem.php";
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
