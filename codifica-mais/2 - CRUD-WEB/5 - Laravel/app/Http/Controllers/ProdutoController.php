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

        // +request: Symfony\Component\HttpFoundation\InputBag {#44 ▼
        //     #parameters: array:9 [▼
        //       "_token" => "qG0oxgHBEguEtd4QMpFMGkBah2ciRub1g02rDspd"
        //       "nome" => "abc"
        //       "sku" => "aku123"
        //       "unidade_medida_id" => "1"
        //       "valor" => "120"
        //       "quantidade" => "10"
        //       "categoria_id" => "1"
        //       "produto_id" => null
        //       "salvar" => "Cadastrar Produto"
        //     ]

        dd($request);


        $request->validate([
            'imagem' => 'required',
            'nome' => 'required',
            'sku' => 'required|unique:produtos',
            'valor' => 'required|numeric',
            'quantidade' => 'required|integer'
        ]);

        Produto::create($request->all());

        return redirect()->route('produtos.index')
            ->with('success', 'Produto adicionado com sucesso!');
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
