<?php

$arquivo = fopen('cursos-php.txt', 'w');

$curso = 'Design Patters PHP I: Boas práticas de programação';

#fwrite($arquivo, $curso);
fwrite($arquivo, $curso, 20);


fclose($arquivo);
