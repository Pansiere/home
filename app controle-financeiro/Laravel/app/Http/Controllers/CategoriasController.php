<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriasController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();

        return view('categorias.index', compact('categorias'));
    }

    public function store(Request $request)
    {
        $categoria = new Categoria();

        $categoria->nome = $request->input('categoriaNome');
        $categoria->user_id = auth()->id();
        $categoria->save();

        return redirect('/categorias')->with('success', 'Categoria adicionada com sucesso!');
    }

    public function update(Request $request, string $id)
    {
        $categoria = Categoria::find($id);

        $categoria->nome = $request->categoriaNome;
        $categoria->save();

        return redirect('/categorias')->with('success', 'Categoria atualizada com sucesso!');
    }

    public function destroy(string $id)
    {
        $categoria = Categoria::destroy($id);

        return redirect('/categorias')->with('success', 'Categoria deletada com sucesso!');
    }
}
