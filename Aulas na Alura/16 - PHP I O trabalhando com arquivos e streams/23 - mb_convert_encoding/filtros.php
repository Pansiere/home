<?php

require 'MeuFiltro.php';

$arquivoCursos = fopen('lista-cursos.txt', 'r');

/*
var_dump(stream_get_filters());
exit();
*/

stream_filter_register('alura.partes', MeuFiltro::class);
stream_filter_append($arquivoCursos,  'alura.partes');

echo fread($arquivoCursos, filesize('lista-cursos.txt'));
