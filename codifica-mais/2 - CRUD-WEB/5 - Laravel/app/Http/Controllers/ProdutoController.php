<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::with('categoria')->with('unidadeMedida')->get()->toArray();

        return view('produtos.index')->with('produtos', $produtos);
    }

    public function create()
    {
        return view('produtos.formulario');
    }

    public function store(Request $request)
    {
        // if ($request->hasFile('image')) {
        //     $validatedData = $request->validate([
        //         'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        //     ]);

        //     $imagem = $request->file('image');
        // } else {
        //     $imagem = '/storage/codifica-mais.png';
        // }

        $produto = new Produto();
        $produto->imagem = 'storage/codifica.jpg';
        $produto->nome = $request->input('nome');
        $produto->sku = $request->input('sku');
        $produto->valor = $request->input('valor');
        $produto->quantidade = $request->input('quantidade');
        $produto->unidade_medida_id = $request->input('unidade_medida_id');
        $produto->categoria_id = $request->input('categoria_id');
        $produto->save();
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
