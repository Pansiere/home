<?php

$telefone = [
    '(21) 99999 - 9393',
    '(27) 99939 - 8348',
    '(27) 99439 - 8848',
    '(27) 89939 - 5548',
    '(27) 91939 - 4348',
    '(27) 94939 - 8748',
    '(27) 92939 - 1248',
];

echo implode(PHP_EOL, $telefone);

echo "\nCom parâmetros nomeados:\n" . implode(array: $telefone, separator: PHP_EOL);
