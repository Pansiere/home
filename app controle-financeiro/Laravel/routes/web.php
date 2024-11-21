<?php

use App\Http\Middleware\Authenticator;
use App\Http\Controllers\{RegisterController,LoginController, TransactionController, CategoryController};
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return to_route('transacoes.index');
});

Route::resource('/transacoes', TransactionController::class)
    ->middleware(Authenticator::class);

Route::resource('/categorias', CategoryController::class)
    ->middleware(Authenticator::class);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login/auth', [LoginController::class, 'auth'])->name('login.auth');

Route::resource('/registrar', RegisterController::class);
