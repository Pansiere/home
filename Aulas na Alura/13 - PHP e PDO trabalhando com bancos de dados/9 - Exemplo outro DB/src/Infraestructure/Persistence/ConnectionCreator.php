<?php

namespace Alura\Pdo\Infraestructure\Persistence;

use PDO;

class ConnectionCreator
{
    public static function createConnection(): PDO
    {
        //php-development-environment's server
        $connection = new PDO(
            'mysql:host=172.30.0.2;dbname=DB',
            'root',
            'password'
        );

        $connection->setAttribute(attribute: PDO::ATTR_ERRMODE, value: PDO::ERRMODE_EXCEPTION);
        $connection->setAttribute(attribute: PDO::ATTR_DEFAULT_FETCH_MODE, value: PDO::FETCH_ASSOC);

        return $connection;
    }
}
