<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriasController extends Controller
{
    public function index()
    {
        $categorias = [
            ['id' => 1, 'nome' => 'Eletrônicos'],
            ['id' => 2, 'nome' => 'Móveis'],
            ['id' => 3, 'nome' => 'Vestuário'],
        ];

        return view('categorias.index', compact('categorias'));
    }

    public function store(Request $request)
    {
        // Validação dos dados recebidos
        $request->validate([
            'categoriaNome' => 'required|string|max:255',
        ]);

        // Criação de uma nova categoria
        $categoria = new Categoria();
        $categoria->nome = $request->input('categoriaNome'); // Atribui o nome da categoria
        $categoria->save(); // Salva a categoria no banco de dados

        // Redireciona com uma mensagem de sucesso
        return redirect()->route('categorias.index')->with('success', 'Categoria criada com sucesso!');
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
