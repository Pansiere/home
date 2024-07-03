<?php

/*
Uma terceira maneira de delimitar strings é a sintaxe heredoc: <<<. Após este operador, um identificador é fornecido seguido de uma nova linha. A própria string é colocada em seguida e a seguir o mesmo identificador novamente para fechar a string.

O identificador de fechamento pode ser indentado com espaços ou tabulações, e nesse caso a indentação será removida de todas as linhas da doc string. Anteriormente ao PHP 7.3.0, o identificador precisava estar no começo da linha.

Além disso, o identificador de fechamento precisa seguir as mesmas convenções de nomes de outros identificadores do PHP: ele precisa conter apenas caracteres alfanuméricos e underlines, e precisa começar com uma letra ou underline.

Refs: https://www.php.net/manual/pt_BR/language.types.string.php
*/

$nome = 'João Pedro V. Pansiere';

function geraEmail(string $nome): void
{
    #equivalente a aspas dupla
    $contatoEmail = <<<FINAL
        Olá, $nome.

        Estamos entrando em contato para 
        {motivo do contato}

        {assinatura}
    FINAL;

    echo $contatoEmail;
}

geraEmail($nome);
