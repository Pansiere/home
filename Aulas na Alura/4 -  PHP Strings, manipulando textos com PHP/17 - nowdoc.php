<?php

$nome = 'João Pedro V. Pansiere';

function geraEmail(string $nome): void
{
    #equivalente a aspas simples
    $contatoEmail = <<<'FINAL'
        Olá, $nome.

        Estamos entrando em contato para 
        {motivo do contato}

        {assinatura}
    FINAL;

    echo $contatoEmail;
}

geraEmail($nome);
