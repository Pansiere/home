<?php

$texto = 'Texto com qualquer coisa poxa e caramba';

//substituindo apenas uma palavra:
echo str_replace(
    'poxa',
    '****',
    $texto
) . PHP_EOL;

//substituindo mais de uma palavra:
echo str_replace(
    ['poxa', 'caramba'],
    '****',
    $texto
) . PHP_EOL;

//substituindo uma palavra e removendo o resto:
echo str_replace(
    ['poxa', 'caramba'],
    ['****'],
    $texto
) . PHP_EOL;;

//substituindo primeira palavra por p e a segunda por c:
echo str_replace(
    ['poxa', 'caramba'],
    ['p', 'c'],
    $texto
) . PHP_EOL;;
