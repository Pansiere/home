<?php

function funcao1(): void
{
    echo 'Entrei na função 1' . PHP_EOL;

    try {
        funcao2();
    } catch (Exception $erroOuExecao) {
        echo $erroOuExecao->getMessage() . PHP_EOL;
        echo $erroOuExecao->getLine() . PHP_EOL;
        echo $erroOuExecao->getTraceAsString() . PHP_EOL;
    }

    echo 'Saindo da função 1' . PHP_EOL;
}

function funcao2(): void
{
    echo 'Entrei na função 2' . PHP_EOL;

    $exeption = new RuntimeException(message: 'mensagemAquiii');
    throw $exeption;
    // throw new RuntimeException();


    // echo 'Saindo da função 2' . PHP_EOL;
}

echo 'Iniciando o programa principal' . PHP_EOL;
funcao1();
echo 'Finalizando o programa principal' . PHP_EOL;
