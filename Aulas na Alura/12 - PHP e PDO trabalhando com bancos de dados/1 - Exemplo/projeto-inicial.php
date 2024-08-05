<?php

use Alura\Pdo\Domain\Model\Student;

require_once 'vendor/autoload.php';

$student = new Student(
    null,
    'João Pedro V. Pansiere',
    new \DateTimeImmutable('2001-10-04')
);

echo $student->age();
