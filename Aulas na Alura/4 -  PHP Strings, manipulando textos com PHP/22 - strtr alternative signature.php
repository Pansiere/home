<?php

/*
Alternative signature (not supported with named arguments):
strtr(string $string, array $replace_pairs): string
*/

$trans = [
    "hello" => "hi",
    "hi" => "hello"
];
echo strtr("hi all, I said hello", $trans);
