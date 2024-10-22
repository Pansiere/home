<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{
    public function index()
    {
        $series = Serie::query()->orderBy('nome')->get();

        return view('series.index')->with('series', $series);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request)
    {
        // // $nomeSerie = $request->input('nome');
        // $nomeSerie = $request->nome;
        // $serie = new Serie();
        // $serie->nome = $nomeSerie;
        // $serie->save();

        // Serie::create(['nome' => 'Teste']);
        // Serie::create($request->all());
        // Serie::create($request->only(['nome']));
        Serie::create($request->except(['_token']));

        // return redirect('/series');
        return to_route('series.index');
    }

    public function destroy(Request $request)
    {
        Serie::destroy($request->series);

        return to_route('series.index');
    }
}
