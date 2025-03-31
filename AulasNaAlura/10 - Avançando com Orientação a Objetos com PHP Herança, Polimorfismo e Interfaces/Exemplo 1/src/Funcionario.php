<?php
class Funcionario
{
    private $nome;
    private $cpf;
    private $cargo;

    public function __construct(string $nome, string $cpf, string $cargo)
    {
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->cargo = $cargo;
    }

    public function recuperaNome(): string
    {
        return $this->nome;
    }

    public function recuperaCpf(): string
    {
        return $this->cpf;
    }

    public function recuperaCargo(): string
    {
        return $this->cargo;
    }
}
