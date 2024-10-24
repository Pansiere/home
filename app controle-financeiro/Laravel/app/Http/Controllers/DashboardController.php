<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transacao;

class DashboardController extends Controller
{
    public function index()
    {
        $transacoes = Transacao::all();

        return view('dashboard.index', compact('transacoes'));
    }
}
