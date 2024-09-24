<?php

$arquivoCursos = new SplFileObject('cursos.csv');

var_dump($arquivoCursos);

while (!$arquivoCursos->eof()) {
    $linha = $arquivoCursos->fgetcsv(';');

    echo mb_convert_encoding(
        $linha[0],
        'UTF-8',
        'Windows-1252'
    ) . PHP_EOL;
}

$date = new DateTime();
$date->setTimestamp($arquivoCursos->getCTime());
echo 'O arquivo \'cursos.csv\' foi criado em: ' . $date->format('d/m/Y') . PHP_EOL;
