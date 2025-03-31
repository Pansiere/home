<?php

/*
Alternative signature (not supported with named arguments):
strtr(string $string, array $replace_pairs): string
*/

$massege = 'hi all, I said hello';

$primeiroNome = 'Joao';

$trans = [
    "hello" => "hi",
    "hi" => "hello"
];

//o 'strtr' respeita as alterações já feitas
echo "strtr:\n" .
    strtr($massege, $trans) .
    PHP_EOL;

//o 'str_replace' não respeita as alterações já feitas
echo "\nstr_replace:\n" .
    str_replace(['hello', 'hi'], ['hi', 'hello'], $massege) .
    PHP_EOL;

//exemplo str_replace com meu primeiro nome
echo "\nstr_replace: adicionando '~' no 'a' em $primeiroNome\n" .
    str_replace('a', 'ã', 'Joao') .
    PHP_EOL;
