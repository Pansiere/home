<?php

namespace Pansiere\ControleFinanceiro\Models;

class Categoria
{
    public function __construct(
        private ?int $id,
        private string $nome,
        private int $usuarioId,
    ) {}

    public function getId(): ?int
    {
        return $this->id === 0 ? null : $this->id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getUsuarioId(): string
    {
        return $this->usuarioId;
    }
}
