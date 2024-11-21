<?php

use App\Http\Controllers\{RegisterController,LoginController, TransactionsController, CategoriesController};
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return to_route('transacoes.index');
});

Route::resource('/transacoes', TransactionsController::class);

Route::resource('/categorias', CategoriesController::class);

Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login/auth', [LoginController::class, 'auth'])->name('login.auth');

Route::resource('/registrar', RegisterController::class);
