<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transacao;

class DashboardController extends Controller
{
    public function index()
    {
        $transacoes = Transacao::all();
        return auth()->check()
            ? view('dashboard', compact('transacoes'))
            : to_route('login');
    }
}
