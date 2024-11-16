<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class TransactionsController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        return view("transactions.pages.create", compact('categories'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // $transacaoId = NULL;
        return view("transactions.pages.edit");
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
