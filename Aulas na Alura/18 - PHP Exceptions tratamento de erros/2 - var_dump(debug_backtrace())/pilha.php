<?php

function funcao1(): void
{
    echo 'Entrei na função 1' . PHP_EOL;
    funcao2();
    echo 'Saindo da função 1' . PHP_EOL;
}

function funcao2(): void
{
    echo 'Entrei na função 2' . PHP_EOL;
    for ($i = 1; $i <= 5; $i++) {
        echo $i . PHP_EOL;
    }
    var_dump(debug_backtrace());
    echo 'Saindo da função 2' . PHP_EOL;
}

echo 'Iniciando o programa principal' . PHP_EOL;
funcao1();
echo 'Finalizando o programa principal' . PHP_EOL;
