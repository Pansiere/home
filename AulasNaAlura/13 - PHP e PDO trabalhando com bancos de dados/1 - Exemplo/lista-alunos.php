<?php

require_once 'vendor/autoload.php';

$databasePath = __DIR__ . '/banco.sqlite';
$pdo = new PDO('sqlite:' . $databasePath);

$statement = $pdo->query('SELECT * FROM students;');
#O método query retorna um objeto PDOStatement, que é armazenado na variável $statement.

#$studentList = $statement->fetchAll(); # == var_dump($statement->fetchAll());

#echo $studentList[0]['name'] . PHP_EOL;
echo var_dump($statement->fetchAll());
