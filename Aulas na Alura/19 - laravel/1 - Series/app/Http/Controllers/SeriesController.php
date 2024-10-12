<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        // dd($request);
        // dd($request->query());

        // $series = DB::select('SELECT * FROM series');
        $series = Serie::query()->orderBy('nome')->get();

        // return view('listar-series', ['series' => $series]);
        // return view('listar-series', compact(var_name: 'series'));
        return view('series.index')->with('series', $series);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request)
    {
        // DB::insert('INSERT INTO series (nome) VALUES (?)', [$nomeSerie]);
        $nomeSerie = $request->input('nome');
        $serie = new Serie();
        $serie->nome = $nomeSerie;
        $serie->save();

        return redirect('/series');
    }
}
