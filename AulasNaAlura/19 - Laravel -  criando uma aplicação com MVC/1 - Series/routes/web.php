<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeriesController;

// Route::get(uri: '/', action: function (): mixed {
//     return view('welcome');
// });

Route::get(uri: '/', action: [SeriesController::class, 'index']);
Route::get(uri: '/series', action: [SeriesController::class, 'index']);
Route::get(uri: '/series/criar', action: [SeriesController::class, 'create']);
Route::post(uri: '/series/salvar', action: [SeriesController::class, 'store']);
