<?php

namespace Pansiere\Crud;

use PDO;

class CriadorDaConexao
{
    public static function createConnection()
    {
        try {
            $connection = new PDO(
                'mysql:host=127.0.0.1;dbname=crud_web',
                'root',
                'password'
            );
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

            return $connection;
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }
}
