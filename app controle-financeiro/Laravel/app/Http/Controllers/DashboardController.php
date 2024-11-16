<?php

namespace App\Http\Controllers;

use App\Models\Transaction;

class DashboardController extends Controller
{
    public function index()
    {
        $transactions = Transaction::all();
        $user = auth()->user();

        return auth()->check()
            ? view('dashboard.pages.index', compact('transactions', 'user'))
            : to_route('login');
    }
}
