<?php

namespace App\Http\Controllers;

use App\Informacao;
use Illuminate\Http\Request;

class InformacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $informacoes = Informacao::all();
        return view('informacoes.index', compact('informacoes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('informacoes.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required',
            'email' => 'required',
            'telefone' => 'required',
        ]);
        $show = Informacao::create($validatedData);
        return redirect('/informacoes')->with('success', 'Dados adicionado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $informacoes = Informacao::findOrFail($id);
        return view('informacoes.show',compact('informacoes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $informacoes = Informacao::findOrFail($id);
        return view('informacoes.edit', compact('informacoes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nome' => 'required',
            'email' => 'required',
            'telefone' => 'required',
        ]);
        Informacao::whereId($id)->update($validatedData);
        return redirect('/informacoes')->with('success', 'Dados atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $informacoes = Informacao::findOrFail($id);
        $informacoes->delete();
        return redirect('/informacoes')->with('success', 'Dados removido com sucesso!');
    }
}
