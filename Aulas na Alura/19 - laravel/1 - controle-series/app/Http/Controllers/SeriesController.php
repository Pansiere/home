<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        // dd($request);
        // dd($request->query());

        $series = [
            'Punisher',
            'Lost',
            'Grey\'s Anatomy'
        ];

        // return view('listar-series', ['series' => $series]);
        // return view('listar-series', compact(var_name: 'series'));
        return view('listar-series')->with('series', $series);
    }
}
