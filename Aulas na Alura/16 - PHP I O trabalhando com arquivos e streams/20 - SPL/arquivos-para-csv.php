<?php

$meusCursos = file('lista-cursos.txt');
$outrosCursos = file('cursos-php.txt');

var_dump($meusCursos);

$arquivoCsv = fopen('cursos.csv', 'w');

foreach ($meusCursos as $curso) {
    $linha = [trim($curso), 'Sim'];

    fputcsv($arquivoCsv, $linha, ';');

    #fgetcsv($arquivoCsv, NULL, ';');
}

foreach ($outrosCursos as $curso) {
    $linha = [trim($curso), 'Não'];

    fputcsv($arquivoCsv, $linha, ';');
}

fclose($arquivoCsv);
