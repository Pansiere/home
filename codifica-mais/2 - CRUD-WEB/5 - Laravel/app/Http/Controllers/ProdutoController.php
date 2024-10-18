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
        $produto = new Produto();
        $produto->imagem = 'storage/codifica.png';
        $produto->nome = $request->input('nome');
        $produto->sku = $request->input('sku');
        $produto->valor = $request->input('valor');
        $produto->quantidade = $request->input('quantidade');
        $produto->unidade_medida_id = $request->input('unidade_medida_id');
        $produto->categoria_id = $request->input('categoria_id');
        $produto->save();

        return redirect('/produtos');
    }

    // public function show(string $id)
    // {
    //     // GET /photos/{photo} show photos.show
    // }

    public function edit(string $id)
    {
        $produto = Produto::find($id);

        if (!$produto) {
            return redirect()->route('produtos.index')->with('error', 'Produto não encontrado.');
        }

        return view('produtos.formulario')->with('produto', $produto);
    }

    public function update(Request $request, string $id)
    {
        $produto = Produto::findOrFail($id);

        $request->validate([
            'nome' => 'required|string|max:255',
            'sku' => 'required|numeric',
            'valor' => 'required|numeric|min:0',
            'quantidade' => 'required|numeric|min:1',
            'unidade_medida_id' => 'required|exists:unidades_medidas,id',
            'categoria_id' => 'required|exists:categorias,id',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('imagem')) {
            $request->validate(['imagem' => 'required|image|mimes:jpeg,png,jpg|max:2048']);
            $path = 'storage/images/' .  $request->file('imagem')->getClientOriginalName();

            move_uploaded_file(from: $request->file('imagem')->path(), to: $path);
        } else {
            $path = $produto->imagem;
        }
        $produto->imagem = $path;
        $produto->nome = $request->input('nome');
        $produto->sku = $request->input('sku');
        $produto->valor = $request->input('valor');
        $produto->quantidade = $request->input('quantidade');
        $produto->unidade_medida_id = $request->input('unidade_medida_id');
        $produto->categoria_id = $request->input('categoria_id');
        $produto->save();

        return redirect('/produtos')->with('success', 'Produto atualizado com sucesso!');
    }

    public function destroy(string $id)
    {
        Produto::destroy($id);

        return redirect('/produtos');
    }
}
