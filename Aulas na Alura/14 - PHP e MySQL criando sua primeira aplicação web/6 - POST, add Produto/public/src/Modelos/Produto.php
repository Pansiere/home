<?php

namespace Pansiere\Alura\Modelos;

class Produto
{
    public function __construct(
        private ?int $id,
        private string $tipo,
        private string $nome,
        private string $descricao,
        private string $imagem,
        private float $preco
    ) {
        $this->id = $id;
        $this->tipo = $tipo;
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->imagem = $imagem;
        $this->preco = $preco;
    }
    public function getId(): int
    {
        return $this->id;
    }

    public function getTipo(): string
    {
        return $this->tipo;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function getImagem(): string
    {
        return $this->imagem;
    }

    public function getImagemDiretorio(): string
    {
        return 'img/' . $this->imagem;
    }

    public function getPreco(): string
    {
        return $this->preco;
    }

    public function getPrecoFormatado(): string
    {
        return "R$ " . number_format($this->preco, 2);
    }
}
