<?php

/*
If given three arguments, this function returns a copy of string where all occurrences of
each (single-byte) character in from have been translated to the corresponding character
in to, i.e., every occurrence of $from[$n] has been replaced with $to[$n], where $n is a
valid offset in both arguments.
*/

$texto = 'Texto com qualquer coisa poxa e caramba';

//substituindo uma palavra e removendo o resto
echo str_replace(
    ['poxa', 'caramba'],
    ['****'],
    $texto
) . PHP_EOL;;

//strtr = string translate
//trabalha com caractéres, e não com strings
echo strtr(
    $texto,
    'poxa',
    '***@'
) . PHP_EOL;

//mudando palavras encontradas no $texto para outras novas
echo strtr(
    $texto,
    [
        'poxa' => 'p',
        'caramba' => 'c',
    ]
) . PHP_EOL;;
