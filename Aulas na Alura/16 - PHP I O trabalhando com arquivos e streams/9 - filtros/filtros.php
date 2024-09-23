<?php

$arquivoCursos = fopen('lista-cursos.txt', 'r');

/*
var_dump(stream_get_filters());
exit();
*/

stream_filter_append($arquivoCursos,  'string.toupper');

echo fread($arquivoCursos, filesize('lista-cursos.txt'));
