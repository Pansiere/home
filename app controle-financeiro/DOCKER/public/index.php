<?php

require __DIR__ . '/../vendor/autoload.php';

use Pansiere\ControleFinanceiro\Controller\Controller;

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

$controller = new Controller();

switch ($page) {
    case '/dashboard':
        $controller->dashboard();
        break;

    case '/autenticacao/login':
        $controller->paginaLogin();
        break;

    case '/autenticacao/logout':
        $controller->logout();
        break;

    case '/autenticacao/login/validar':
        $controller->validarLogin($_POST['email'], $_POST['senha']);
        break;

    case '/autenticacao/registro':
        $controller->paginaRegistro();
        break;

    case '/autenticacao/registro/registrar':
        $controller->registrarUsuario($_POST['nome'], $_POST['email'], $_POST['senha']);
        break;

    case '/transacao/adicionar':
        $controller->paginaAdicionarTransacao();
        break;

    case '/transacao/adicionar/salvar':
        $controller->salvarTransacao($_POST['tipo'], $_POST['categoriaNome'],  $_POST['descricao'], $_POST['valor'], $_POST['data']);
        break;

    case '/transacao/editar':
        $controller->paginaEditarTransacao($_GET['transacaoId']);
        break;

    case '/transacao/editar/atualizar':
        $controller->editarTransacao($_POST['categoriaId'], $_POST['transacaoId']);
        break;

    case '/transacao/deletar':
        $controller->deletarTransacao($_POST['transacaoId']);
        break;

    case '/categorias':
        $controller->paginaCategorias();
        break;

    case '/categoria/salvar':
        $controller->salvarCategoria($_POST['categoriaNome']);
        break;

    case '/categoria/deletar':
        $controller->deletarCategoria($_POST['categoriaId']);
        break;

    case '/categoria/editar':
        $controller->editarCategoria($_POST['categoriaNome'], $_POST['editarCategoriaId']);
        break;

    default:
        header("location: /dashboard");
}
