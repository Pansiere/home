<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])
    ->get('/', \App\Livewire\Dashboard::class)
    ->name('dashboard');

/*
|----------------------------------------------------------------------------------------------------------------------
| /categorias/
|----------------------------------------------------------------------------------------------------------------------
*/
Route::get('/categorias', \App\Livewire\Category\Index::class)
    ->name('category.index');
Route::get('/categorias/criar', \App\Livewire\Category\Create::class)
    ->name('category.create');
Route::get('/categorias/{category}/editar', \App\Livewire\Category\Edit::class)
    ->name('category.edit');

require __DIR__ . '/auth.php';
