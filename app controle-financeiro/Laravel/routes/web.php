<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{DashboardController, TransacoesController, CategoriasController};

Route::get('/', function () {
    return to_route('dashboard');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('/transacao', TransacoesController::class)
    ->middleware(['auth', 'verified'])->name('dsad,', 'teste');

Route::resource('/categorias', CategoriasController::class)
    ->middleware(['auth', 'verified'])->name('dsad,', 'teste');;

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
