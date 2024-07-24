<?php

namespace Alura\Banco\Modelo\Conta;

class Titular extends Pessoa
{
    private Endereco $endereco;

    public function __construct(CPF $cpf, string $nome, Endereco $endereco)
    {
        $this->cpf = $cpf;
        $this->validaNomeTitular($nome);
        $this->nome = $nome;
        $this->endereco = $endereco;
    }
}
