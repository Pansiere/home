<?php

namespace Pansiere\ControleFinanceiro\Controller;

use Pansiere\ControleFinanceiro\Repository\UsuarioRepository;

class UsuarioController extends Controller
{
    public function __construct(
        private $usuarioRepository = new UsuarioRepository()
    ) {}

    public function paginaLogin(): void
    {
        require __DIR__ . "/../view/autenticacao/login.php";
    }

    public function paginaRegistro(): void
    {
        require __DIR__ . "/../view/autenticacao/registro.php";
    }

    public function validarLogin(string $email, string $senha): void
    {
        $dadosUsuario = [
            'id' => null,
            'nome' => null,
            'email' => $email,
            'senha' => $senha
        ];
        $this->usuarioRepository->validarLogin($dadosUsuario);
    }

    public function logout(): void
    {
        session_destroy();
        header("location: /autenticacao/login");
    }

    public function registrarUsuario(string $nome, string $email, string $senha, string $confirmacaoSenha): void
    {
        if ($senha !== $confirmacaoSenha) {
            echo "<script type='text/javascript'>
                alert('As senhas precisam ser iguais.');
                window.location.href = '/autenticacao/registro';
                </script>";
            exit;
        }

        $dadosUsuario = [
            'id' => null,
            'nome' => $nome,
            'email' => $email,
            'senha' => password_hash($senha, PASSWORD_DEFAULT)
        ];
        $this->usuarioRepository->registrarUsuario($dadosUsuario);
        header("location: /autenticacao/login");
    }
}
