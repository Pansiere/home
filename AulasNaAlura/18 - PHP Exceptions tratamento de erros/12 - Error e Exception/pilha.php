<?php

function funcao1(): void
{
    echo 'Entrei na função 1' . PHP_EOL;

    try {
        funcao2();
    } catch (Exception $execao) {
        echo $execao->getMessage() . PHP_EOL;
        echo $execao->getLine() . PHP_EOL;
        echo $execao->getTraceAsString() . PHP_EOL;
    } catch (Error $erro) {
        echo $erro->getMessage() . PHP_EOL;
        echo $erro->getLine() . PHP_EOL;
        echo $erro->getTraceAsString() . PHP_EOL;
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
