<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    DashboardController,
    TransacoesController,
    CategoriasController,
    UsuarioController
};

if (
    !isset($_SESSION['usuario_id'])
    && $_SERVER['REQUEST_URI'] !== '/autenticacao'
    && $_SERVER['REQUEST_URI'] !== '/autenticacao/create'
    && $_SERVER['REQUEST_URI'] !== '/autenticacao/store'
) {
    header(header: 'Location: /autenticacao');
    exit;
}

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::resource('/autenticacao', UsuarioController::class);

Route::resource('/dashboard', DashboardController::class);

Route::resource('/transacao', TransacoesController::class);

Route::resource('/categorias', CategoriasController::class);
