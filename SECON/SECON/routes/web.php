<?php

use Livewire\Volt\Volt;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    // TODO: Transformar para Volt.
    Route::view('dashboard', 'dashboard')->name('dashboard');

    Volt::route('categorias', 'categories')->name('categories');
});

Route::middleware(['auth'])->group(function () {
    Route::redirect('configurações', 'settings/profile');

    Volt::route('configurações/perfil', 'settings.profile')->name('settings.profile');
    Volt::route('configurações/senha', 'settings.password')->name('settings.password');
    Volt::route('configurações/aparencia', 'settings.appearance')->name('settings.appearance');
});

require __DIR__ . '/auth.php';

