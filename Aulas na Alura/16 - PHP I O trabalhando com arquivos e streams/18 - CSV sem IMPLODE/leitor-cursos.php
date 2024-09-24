<?php

$cursos = file_get_contents('lista-cursos.txt');
echo $cursos;
var_dump($cursos);

$cursos2 = file('lista-cursos.txt');
var_dump($cursos2);
