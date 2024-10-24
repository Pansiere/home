<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{DashboardController, TransacoesController, CategoriasController};

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::resource('/dashboard', DashboardController::class);

Route::resource('/transacao', TransacoesController::class);

Route::resource('/categorias', CategoriasController::class);
