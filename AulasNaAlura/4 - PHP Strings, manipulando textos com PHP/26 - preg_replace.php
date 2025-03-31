<?php

$telefone = [
    '(21) 99999 - 9393',
    '(27) 99939 - 8348',
    '(27) 99439 - 8848',
    '(27) 99939 - 5548',
    '(27) 91939 - 4348',
    '(27) 94939 - 8748',
    '(27) 92939 - 1248',
];


foreach ($telefone as $key) {

    $regex = '/^\(([0-9]{2})\) (9?[0-9]{4} - [0-9]{4})$/';

    $telefoneValido = preg_match(
        $regex,
        $key,
        $encontrado
    );

    if ($telefoneValido) {
        echo "Telefone válido - $key\n";
    } else {
        echo "Telefone inválido - $key\n";
    }

    echo preg_replace(
        $regex,
        '(XX) \2',
        $key
    ) .
        PHP_EOL;
}
