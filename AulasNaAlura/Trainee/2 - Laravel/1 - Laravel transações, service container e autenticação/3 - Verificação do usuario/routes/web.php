<?php

use App\Http\Controllers\EpisodesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SeasonsController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Autenticador;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/series');
})->middleware(Autenticador::class);

Route::resource('/series', SeriesController::class)
    ->except(['show'])
    ->middleware(Autenticador::class);

Route::get('/series/{series}/seasons', [SeasonsController::class, 'index'])
    ->name('seasons.index')
    ->middleware(Autenticador::class);

Route::get('/seasons/{season}/episodes', [EpisodesController::class, 'index'])
    ->name('episodes.index')
    ->middleware(Autenticador::class);

Route::post('/seasons/{season}/episodes', [EpisodesController::class, 'update'])
    ->name('episodes.update')
    ->middleware(Autenticador::class);
