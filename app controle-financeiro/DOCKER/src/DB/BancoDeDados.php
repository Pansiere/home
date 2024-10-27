<?php

namespace Pansiere\ControleFinanceiro\DB;

use PDO;

class BancoDeDados
{
    public static function ConexaoDB(): PDO
    {
        try {
            $config = require __DIR__ . '/../config.php';

            $conexao = new PDO(
                dsn: 'mysql:host=' . $config['DB_HOST'] . ';dbname=' . $config['DB_NAME'],
                username: $config['DB_USER'],
                password: $config['DB_PASS']
            );
            $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conexao->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

            return $conexao;
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }
}
