<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        // $series = Serie::query()->orderBy('nome')->get();
        $series = Serie::all();
        // $request->session()->forget('mensagem.sucesso');
        // $mensagemSucesso = $request->session()->get('mensagem.sucesso');
        $mensagemSucesso = session('mensagem.sucesso');

        return view('series.index')->with('series', $series)
            ->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create(Request $request)
    {
        return view('series.create');
    }

    public function store(/*Request $request*/SeriesFormRequest $request)
    {
        // // $nomeSerie = $request->input('nome');
        // $nomeSerie = $request->nome;
        // $serie = new Serie();
        // $serie->nome = $nomeSerie;
        // $serie->save();

        // Serie::create(['nome' => 'Teste']);
        // Serie::create($request->all());
        // Serie::create($request->only(['nome']));

        // $request->validate([
        //     'nome' => ['required', 'min:3']
        // ]);
        $serie = Serie::create($request->except(['_token']));
        // session(['mensagem.sucesso' => 'Serie adicionada com sucesso']);
        // $request->session()->flash('mensagem.sucesso', "Serie '{$serie->nome}' adicionada com sucesso");

        // return redirect('/series');
        return to_route('series.index')
            ->with('mensagem.sucesso', "Serie '{$serie->nome}' adicionada com sucesso");
    }

    public function destroy(Serie $series)
    {
        // $serie = Serie::find($request->series);
        // Serie::destroy($request->series);
        $series->delete();
        // $request->session()->put('mensagem.sucesso', 'Serie removida com sucesso');
        // $request->session()->flash('mensagem.sucesso', "Serie '{$series->nome}' removida com sucesso");

        return to_route('series.index')
            ->with('mensagem.sucesso', "Serie '{$series->nome}' removida com sucesso");
    }

    public function edit(Serie $series)
    {
        dd($series->temporadas);
        return view('series.edit')->with('serie', $series);
    }

    public function update(/*Request $request*/Serie $series, SeriesFormRequest $request)
    {
        // $series->nome = $request->nome;
        // $series->save();
        $series->fill($request->all());
        $series->save();

        return to_route('series.index')
            ->with('mensagem.sucesso', "Série '{$series->nome}' atualizada com sucesso");
    }
}
