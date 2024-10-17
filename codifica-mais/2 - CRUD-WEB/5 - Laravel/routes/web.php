<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;

Route::get('/', [ProdutoController::class, 'index']);

Route::get('/criar', [ProdutoController::class, 'criar']);

Route::get('/editar', [ProdutoController::class, 'editar']);

Route::post('/salvar', [ProdutoController::class, 'salvar']);

Route::post('/deletar', [ProdutoController::class, 'deletar']);

Route::post('/atualizar', [ProdutoController::class, 'atualizar']);

Route::post('/uploadCsv', [ProdutoController::class, 'uploadCsv']);
