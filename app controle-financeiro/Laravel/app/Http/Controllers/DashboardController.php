<?php

namespace App\Http\Controllers;

use App\Models\Transaction;

class DashboardController extends Controller
{
    private string $title = 'Painel';
    public function index()
    {
//        $transactions = Transaction::all();
//        dd($transactions);

            return view('dashboard.pages.index',[
                'title'=>$this->title,
                'header'=>'Painel'
            ]);
    }
}
