<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    private string $title = 'Categorias';

    public function index()
    {
        $title = $this->title;
        $categories = Category::all();
        $header = 'Categorias';

        return view('categories.pages.index', compact('categories', 'title', 'header'));
    }

    public function store(Request $request)
    {
        $categories = new Category();

        $categories->name = $request->input('categoryName');
        $categories->user_id = auth()->id();
        $categories->save();

        return redirect('/categories')->with('success', 'Categoria adicionada com sucesso!');
    }

    public function update(Request $request, string $id)
    {
        $categories = Category::find($id);

        $categories->nome = $request->categoriaNome;
        $categories->save();

        return redirect('/categories')->with('success', 'Categoria atualizada com sucesso!');
    }

    public function destroy(string $id)
    {
        $categories = Category::destroy($id);

        return redirect('/categories')->with('success', 'Categoria deletada com sucesso!');
    }
}
