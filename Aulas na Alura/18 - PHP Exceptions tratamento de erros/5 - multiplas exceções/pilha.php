<?php

function funcao1(): void
{
    echo 'Entrei na função 1' . PHP_EOL;

    try {
        funcao2();
    } catch (RuntimeException $problema) {
        echo "Na função 1, eu resolvi o problema da função 2" . PHP_EOL;
    }

    echo 'Saindo da função 1' . PHP_EOL;
}

function funcao2(): void
{
    echo 'Entrei na função 2' . PHP_EOL;

    $divicao = intdiv(5, 0);
    $arrayFixo = new SplFixedArray(2);
    $arrayFixo[3] = 'Valor';

    for ($i = 1; $i <= 5; $i++) {
        echo $i . PHP_EOL;
    }
    echo 'Saindo da função 2' . PHP_EOL;
}

echo 'Iniciando o programa principal' . PHP_EOL;
funcao1();
echo 'Finalizando o programa principal' . PHP_EOL;
