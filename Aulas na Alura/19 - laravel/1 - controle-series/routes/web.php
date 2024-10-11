<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeriesController;

Route::get(uri: '/', action: function (): mixed {
    return view('welcome');
});

Route::get(uri: '/ola', action: [SeriesController::class, 'index']);
