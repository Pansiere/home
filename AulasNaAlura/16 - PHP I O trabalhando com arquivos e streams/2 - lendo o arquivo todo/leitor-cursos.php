<?php

$arquivo = fopen('lista-cursos.txt', 'r');

$tamaconhoDoArquivo = filesize('lista-cursos.txt');
$cursos = fread($arquivo, $tamaconhoDoArquivo);

echo $cursos;

fclose($arquivo);
