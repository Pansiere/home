<?php

$arquivoCursos = new SplFileObject('cursos.csv');

var_dump($arquivoCursos);

while (!$arquivoCursos->eof()) {
    $linha = $arquivoCursos->fgetcsv(';');

    echo $linha[0] . PHP_EOL;
}

$date = new DateTime();
$date->setTimestamp($arquivoCursos->getCTime());
echo 'O arquivo \'cursos.csv\' foi criado em: ' . $date->format('d/m/Y');
