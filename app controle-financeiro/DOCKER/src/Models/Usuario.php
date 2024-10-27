<?php

namespace Pansiere\ControleFinanceiro\Models;

class Usuario
{
    public function __construct(
        private ?int $id,
        private ?string $nome,
        private string $email,
        private string $senha,
    ) {}

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getSenha(): string
    {
        return $this->senha;
    }
}
