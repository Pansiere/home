<?php

namespace Pansiere\ControleFinanceiro\DB;

use PDO;

class BancoDeDados
{
    public static function ConexaoDB(): PDO
    {
        try {
            $conexao = new PDO(
                dsn: 'mysql:host=127.0.0.1;dbname=controle_financeiro',
                username: 'controle_financeiro_user',
                password: 'CODIFICAMAIS'
            );
            $conexao->setAttribute(PDO::ATTR_ERRMODE,  PDO::ERRMODE_EXCEPTION);
            $conexao->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,  PDO::FETCH_ASSOC);

            return $conexao;
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }
}
