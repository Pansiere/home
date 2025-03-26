<?php

function loadEnv($filePath)
{
    if (!file_exists($filePath)) {
        return;
    }

    $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) continue;
        putenv($line);
        list($name, $value) = explode('=', $line, 2);
        $_ENV[$name] = $value;
        $_SERVER[$name] = $value;
    }
}
$filePath = '/var/www/html/docker/.env';
loadEnv($filePath);

$host = getenv('MYSQL_SECON_HOST') ?: 'mysql_secon';
$user = getenv('MYSQL_SECON_USER') ?: 'secon';
$pass = getenv('MYSQL_SECON_PASSWORD') ?: 'secon';
$database = getenv('MYSQL_SECON_DATABASE') ?: 'SECON';
$port = 3306;

echo "Aguardando MySQL em $host:$port...\n";

$maxAttempts = 15;
$attempts = 0;

while ($attempts < $maxAttempts) {
    try {
        $dsn = "mysql:host=$host;port=$port;dbname=$database";
        $pdo = new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        echo "MySQL está pronto!\n";
        exit(0);
    } catch (PDOException $e) {
        echo "Tentativa $attempts: MySQL ainda não está pronto...\n";
        sleep(2);
        $attempts++;
    }
}

echo "Erro: MySQL não respondeu a tempo.\n";
exit(1);
