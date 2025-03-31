<?php

namespace Alura\Banco\Modelo\Conta;

use Throwable;

class SaldoInsuficienteExeption extends \DomainException
{
    public function __construct(float $valorSque, float $saldoAtual)
    {
        $mensagem = "Você tentou sacar $valorSque, mas tem apenas $saldoAtual em sua conta.";
        parent::__construct(message: $mensagem);
    }
}
