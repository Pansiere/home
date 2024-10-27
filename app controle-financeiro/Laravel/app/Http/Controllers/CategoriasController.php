<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriasController extends Controller
{
    public function index()
    {
        $categorias = new Categoria();

        $categorias = [];

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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
