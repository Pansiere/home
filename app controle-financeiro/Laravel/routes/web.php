<?php

use App\Http\Controllers\{DashboardController, TransactionsController, CategoriesController};
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return to_route('painel');
});

Route::get('/painel', [DashboardController::class, 'index'])->name('painel');

Route::resource('/transacoes', TransactionsController::class);

Route::resource('/categorias', CategoriesController::class);
