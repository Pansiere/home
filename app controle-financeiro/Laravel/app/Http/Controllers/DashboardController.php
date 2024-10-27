<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transacao;

class DashboardController extends Controller
{
    public function index()
    {
        $transacoes = Transacao::all();
        $usuario = auth()->user();

        return auth()->check()
            ? view('dashboard', compact('transacoes', 'usuario'))
            : to_route('login');
    }
}
