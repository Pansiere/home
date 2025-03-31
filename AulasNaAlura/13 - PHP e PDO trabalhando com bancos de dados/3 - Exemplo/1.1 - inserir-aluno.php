<?php

use Alura\Pdo\Domain\Model\Student;

require_once 'vendor/autoload.php';

$databasePath = __DIR__ . '/banco.sqlite';
$pdo = new PDO('sqlite:' . $databasePath);

$student = new Student(
    null,
    "Patrícia Freitas",
    new \DateTimeImmutable('1986-10-25')
);

$name = $student->name();

$sqlInsert = "INSERT INTO students (name, birth_date) VALUES (:name, :birth_date);";
$statement = $pdo->prepare($sqlInsert);
$statement->bindParam(':name', $name);
$statement->bindValue(':birth_date', $student->birthDate()->format(format: 'Y-m-d'));

$name = 'Novo Nome';

if ($statement->execute()) {
    echo "Aluno incluído";
}
