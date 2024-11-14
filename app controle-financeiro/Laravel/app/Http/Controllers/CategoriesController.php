<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Categories::all();

        return view('categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $categories = new Categories();

        $categories->name = $request->input('categoryName');
        $categories->user_id = auth()->id();
        $categories->save();

        return redirect('/categories')->with('success', 'Categoria adicionada com sucesso!');
    }

    public function update(Request $request, string $id)
    {
        $categories = Categories::find($id);

        $categories->nome = $request->categoriaNome;
        $categories->save();

        return redirect('/categorias')->with('success', 'Categoria atualizada com sucesso!');
    }

    public function destroy(string $id)
    {
        $categories = Categoria::destroy($id);

        return redirect('/categorias')->with('success', 'Categoria deletada com sucesso!');
    }
}
