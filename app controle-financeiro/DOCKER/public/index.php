<?php

require __DIR__ . '/../vendor/autoload.php';

use Pansiere\ControleFinanceiro\Controller\{CategoriasController, TransacoesController, UsuarioController};

session_start();

$page = rtrim(strtok($_SERVER['REQUEST_URI'],  '?'), '/') ?: '/';

if (
    !isset($_SESSION['usuario_id'])
    && $page !== '/autenticacao/login'
    && $page !== '/autenticacao/registro'
    && $page !== '/autenticacao/registro/registrar'
    && $page !== '/autenticacao/login/validar'
) {
    header('Location: /autenticacao/login');
    exit;
}

$usuarioController = new UsuarioController();
$transacoesController = new TransacoesController();
$categoriaController = new CategoriasController();

switch ($page) {
    case '/autenticacao/login':
        $usuarioController->paginaLogin();
        break;

    case '/autenticacao/logout':
        $usuarioController->logout();
        break;

    case '/autenticacao/login/validar':
        $usuarioController->validarLogin($_POST['email'], $_POST['senha']);
        break;

    case '/autenticacao/registro':
        $usuarioController->paginaRegistro();
        break;

    case '/autenticacao/registro/registrar':
        $usuarioController->registrarUsuario($_POST['nome'], $_POST['email'], $_POST['senha'],  confirmacaoSenha: $_POST['confirmacaoSenha']);
        break;

    case '/dashboard':
        $transacoesController->dashboard();
        break;

    case '/transacao/adicionar':
        $transacoesController->paginaAdicionarTransacao();
        break;

    case '/transacao/adicionar/salvar':
        $transacoesController->salvarTransacao($_POST['tipo'], $_POST['categoriaNome'],  $_POST['descricao'], $_POST['valor'], $_POST['data']);
        break;

    case '/transacao/editar':
        $transacoesController->paginaEditarTransacao($_GET['transacaoId']);
        break;

    case '/transacao/editar/atualizar':
        $transacoesController->editarTransacao($_POST['categoriaId'], $_POST['transacaoId']);
        break;

    case '/transacao/deletar':
        $transacoesController->deletarTransacao($_POST['transacaoId']);
        break;

    case '/categorias':
        $categoriaController->paginaCategorias();
        break;

    case '/categoria/salvar':
        $categoriaController->salvarCategoria($_POST['categoriaNome']);
        break;

    case '/categoria/deletar':
        $categoriaController->deletarCategoria($_POST['categoriaId']);
        break;

    case '/categoria/editar':
        $categoriaController->editarCategoria($_POST['categoriaNome'], $_POST['editarCategoriaId']);
        break;

    default:
        header("location: /dashboard");
}
