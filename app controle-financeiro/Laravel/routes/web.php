<?php

use App\Http\Controllers\{DashboardController, TransactionsController, CategoriesController};
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return to_route('painel');
});

Route::get('/painel', [DashboardController::class, 'index'])
    ->name('painel');

Route::resource('/transacoes', TransactionsController::class)
    ->name('index,', 'index');

Route::resource('/categorias', CategoriesController::class)
    ->name('index', 'index');

//    ->middleware(['auth', 'verified'])
