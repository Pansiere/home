<?php

use Illuminate\Support\Facades\Route;

Route::get(uri: '/', action: function (): mixed {
    return view('welcome');
});

Route::get(uri: '/ola', action: function (): void {
    echo 'Olá, Mundo!';
});
