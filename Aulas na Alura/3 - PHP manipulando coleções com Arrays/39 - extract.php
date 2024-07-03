<?php

$dados = [
    'nome' => 'João Pedro V. Pansiere',
    'nota' => 10,
    'idade' => 22
];

//Import variables from an array into the current symbol table.
//Checks each key to see whether it has a valid variable name. It also checks for collisions with existing variables in the symbol table.
//Warning: Do not use extract() on untrusted data, like user input (e.g. $_GET, $_FILES).
extract($dados);
var_dump($nome, $nota, $idade);
