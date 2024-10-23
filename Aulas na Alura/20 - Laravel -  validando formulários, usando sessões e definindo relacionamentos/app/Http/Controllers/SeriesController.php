<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Series;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Season;
use App\Models\Episode;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        // $series = Serie::query()->orderBy('nome')->get();
        // $series = Serie::with(['temporadas'])->get();
        $series = Series::all();
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
        // $serie = Series::create($request->except(['_token']));
        $serie = Series::create($request->all());
        $seasons = [];
        for ($i = 1; $i <= $request->seasonsQty; $i++) {
            $seasons[] = [
                'series_id' => $serie->id,
                'number' => $i
            ];
        }
        Season::insert($seasons);

        $episodes = [];
        foreach ($serie->seasons as $season) {
            for ($j = 1; $j <= $request->episodesPerSeason; $j++) {
                $season->episodes()->create([
                    'number' => $j,
                ]);
            }
        }
        Episode::insert($episodes);
        // session(['mensagem.sucesso' => 'Serie adicionada com sucesso']);
        // $request->session()->flash('mensagem.sucesso', "Serie '{$serie->nome}' adicionada com sucesso");

        // return redirect('/series');
        return to_route('series.index')
            ->with('mensagem.sucesso', "Serie '{$serie->nome}' adicionada com sucesso");
    }

    public function destroy(Series $series)
    {
        // $serie = Serie::find($request->series);
        // Serie::destroy($request->series);
        $series->delete();
        // $request->session()->put('mensagem.sucesso', 'Serie removida com sucesso');
        // $request->session()->flash('mensagem.sucesso', "Serie '{$series->nome}' removida com sucesso");

        return to_route('series.index')
            ->with('mensagem.sucesso', "Serie '{$series->nome}' removida com sucesso");
    }

    public function edit(Series $series)
    {
        // dd($series->temporadas); 
        return view('series.edit')->with('serie', $series);
    }

    public function update(/*Request $request*/Series $series, SeriesFormRequest $request)
    {
        // $series->nome = $request->nome;
        // $series->save();
        $series->fill($request->all());
        $series->save();

        return to_route('series.index')
            ->with('mensagem.sucesso', "Série '{$series->nome}' atualizada com sucesso");
    }
}
