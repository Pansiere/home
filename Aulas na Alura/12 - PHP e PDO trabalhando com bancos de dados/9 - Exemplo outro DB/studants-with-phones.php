<?php

require_once 'vendor/autoload.php';

use Alura\Pdo\Infraestructure\Persistence\ConnectionCreator;
use Alura\Pdo\Infraestructure\Repository\PdoStudentRepository;

$connection = ConnectionCreator::createConnection();
$repository = new PdoStudentRepository($connection);

/** @var \Alura\Pdo\Domain\Model\Student[] $studentList */
$studentList = $repository->studentsWithPhones();

echo "Número formatado: " . $studentList[1]->phones()[0]->formattedPhone() . PHP_EOL;
var_dump($studentList);
