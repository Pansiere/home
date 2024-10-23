<?php

namespace Pansiere\ControleFinanceiro\Models;

use Pansiere\ControleFinanceiro\Models\{Usuario, Categoria};

class Transacao
{
    public function __construct(
        private ?int $id,
        private string $tipo,
        private float $valor,
        private string $descricao,
        private ?Categoria $categoria,
        private string $data,
    ) {}

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTipo(): string
    {
        return ucfirst($this->tipo);
    }

    public function getValor(): float
    {
        return $this->valor;
    }

    public function getValorFormatado(): string
    {
        return number_format($this->valor, 2,  ',',  '.');
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function getCategoria_id(): ?int
    {
        return $this->categoria->getId();
    }

    public function getCategoria(): string
    {
        return $this->categoria->getNome();
    }

    public function getData(): string
    {
        return $this->data;
    }

    public function getDataFormatada(): string
    {
        return date('d/m/Y', strtotime($this->data));
    }
}
