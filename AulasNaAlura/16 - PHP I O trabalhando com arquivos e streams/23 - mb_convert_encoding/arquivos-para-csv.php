<?php

$meusCursos = file('lista-cursos.txt');
$outrosCursos = file('cursos-php.txt');

#var_dump($meusCursos);

$arquivoCsv = fopen('cursos.csv', 'w');

foreach ($meusCursos as $curso) {
    $linha = [
        trim(mb_convert_encoding(
            $curso,
            'Windows-1252',
            'UTF-8'
        )),
        'Sim'
    ];

    fputcsv($arquivoCsv, $linha, ';');

    #fgetcsv($arquivoCsv, NULL, ';');
}

foreach ($outrosCursos as $curso) {
    $linha = [trim(mb_convert_encoding(
        $curso,
        'UTF-8',
        'Windows-1252'
    )), mb_convert_encoding(
        'Não',
        'UTF-8',
        'Windows-1252'
    )];

    fputcsv($arquivoCsv, $linha, ';');
}

fclose($arquivoCsv);
