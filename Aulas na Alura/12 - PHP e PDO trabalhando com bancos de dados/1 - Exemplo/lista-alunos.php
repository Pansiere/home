<?php

require_once 'vendor/autoload.php';

$databasePath = __DIR__ . '/banco.sqlite';
$pdo = new PDO('sqlite:' . $databasePath);

$statement = $pdo->query('SELECT * FROM students;');
$studentList = ($statement->fetchAll()); # == var_dump($statement->fetchAll());

echo $studentList[0]['name'];
