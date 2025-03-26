<?php

use Livewire\Volt\Volt;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Volt::route('registrar', 'auth.register')
        ->name('register');

    Volt::route('login', 'auth.login')
        ->name('login');

    // Volt::route('forgot-password', 'pages.auth.forgot-password')
    //     ->name('password.request');

    // Volt::route('reset-password/{token}', 'pages.auth.reset-password')
    //     ->name('password.reset');
});
