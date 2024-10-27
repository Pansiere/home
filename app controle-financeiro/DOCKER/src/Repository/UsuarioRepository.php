<?php

namespace Pansiere\ControleFinanceiro\Repository;

use Pansiere\ControleFinanceiro\DB\BancoDeDados;
use Pansiere\ControleFinanceiro\Models\Usuario;

class UsuarioRepository
{
    private $pdo;
    public function __construct()
    {
        $this->pdo = BancoDeDados::ConexaoDB();
    }

    private function criarObjetoUsuario(array $dadosUsuario): Usuario
    {
        return new Usuario(
            id: (int)$dadosUsuario['id'],
            nome: (string)$dadosUsuario['nome'],
            email: (string)$dadosUsuario['email'],
            senha: (string)$dadosUsuario['senha']
        );
    }

    public function registrarUsuario(array $dadosUsuario): void
    {
        $usuario = $this->criarObjetoUsuario(dadosUsuario: $dadosUsuario);

        try {
            $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";
            $statement = $this->pdo->prepare(query: $sql);
            $statement->bindValue(param: 1, value: $usuario->getNome());
            $statement->bindValue(param: 2, value: $usuario->getEmail());
            $statement->bindValue(param: 3, value: $usuario->getSenha());
            $statement->execute();
        } catch (\PDOException $e) {

            echo "<script type='text/javascript'>
                alert('Email indisponível.');
                window.location.href = '/autenticacao/registro';
                </script>";

            error_log(message: $e->getMessage());
            exit;
        }
    }

    public function validarLogin(array $dadosUsuario): void
    {
        try {
            $usuario = $this->criarObjetoUsuario(dadosUsuario: $dadosUsuario);

            $sql = "SELECT * FROM usuarios WHERE email = ?";
            $statement = $this->pdo->prepare(query: $sql);
            $statement->bindValue(param: 1, value: $usuario->getEmail());
            $statement->execute();
            $consulta = $statement->fetch();

            if ($consulta && password_verify(password: $usuario->getSenha(), hash: $consulta['senha'])) {
                $_SESSION['usuario_id'] = $consulta['id'];
                $_SESSION['nome'] = $consulta['nome'];
                header(header: 'Location: /dashboard');
                exit();
            } else {
                echo "<script type='text/javascript'>
                alert('Email ou senha incorretos.');
                window.location.href = '/autenticacao/login';
                </script>";
            }
        } catch (\PDOException $e) {
            echo "<script type='text/javascript'>
            alert('Ocorreu um erro ao tentar realizar o login. Por favor, tente novamente mais tarde.');
            window.location.href = '/autenticacao/login';
            </script>";

            error_log(message: $e->getMessage());
        }
    }
}
