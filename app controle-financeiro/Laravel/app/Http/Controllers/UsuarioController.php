<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    public function index()
    {
        return view("autenticacao.index");
    }

    public function create()
    {
        return view("autenticacao.registrar");
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:usuarios',
            'senha' => 'required|string|min:8|confirmed',
        ]);

        $usuario = Usuario::create($request->all());
        $usuario->senha = password_hash($request->input('senha'), PASSWORD_DEFAULT);
        $usuario->save();

        return to_route("autenticacao.index");
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
}
