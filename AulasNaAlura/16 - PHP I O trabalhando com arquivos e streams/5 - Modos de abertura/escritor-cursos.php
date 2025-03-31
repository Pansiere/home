<?php

$arquivo = fopen('cursos-php.txt', 'a');

#$curso = 'Design Patters PHP I: Boas práticas de programação';
$curso = "\nDesign Patters PHP II: Boas práticas de programação";

fwrite($arquivo, $curso);
#fwrite($arquivo, $curso, 20);


fclose($arquivo);
