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

var_dump(compact('nome', 'nota', 'idade'));
#Cria um array contendo variáveis e seus valores.
#Para cada um dos parâmetros passados, compact() procura uma variável com o nome especificado na tabela de símbolos e a adiciona no array de saída de forma que o nome da variável será a chave e o seu conteúdo será o valor para esta chave. Em resumo, ela faz o oposto de extract().
$compact = compact('nome', 'nota', 'idade');
echo $compact['nome'] . PHP_EOL . $compact['nota'] . PHP_EOL . $compact['idade'];
