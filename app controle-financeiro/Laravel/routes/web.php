<?php

use App\Http\Controllers\{DashboardController, TransactionsController, CategoriesController};
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return to_route('dashboard');
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
//    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::resource('/transaction', TransactionsController::class)
//    ->middleware(['auth', 'verified'])
    ->name('dsad,', 'teste');

Route::resource('/categories', CategoriesController::class)
//    ->middleware(['auth', 'verified'])
    ->name('dsad,', 'teste');

