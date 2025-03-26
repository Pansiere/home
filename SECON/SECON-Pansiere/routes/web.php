<?php

use Livewire\Volt\Volt;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Volt::route('/categorias', 'categories');

require __DIR__ . '/auth.php';
