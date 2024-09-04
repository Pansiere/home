<?php

namespace Pansiere\Crud;

use PDO;

class CriadorDaConexao
{
    public static function createConnection(): PDO
    {
        $connection = new PDO(
            'mysql:host=172.29.0.2;dbname=crud_web',
            'root',
            'password'
        );
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $connection;
    }
}
