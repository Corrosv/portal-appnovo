<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCidadeRequest;
use App\Http\Requests\UpdateCidadeRequest;
use App\Models\Cidade;

class CidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        //Carregue os dados do banco
        //select * from cadernos
        $cidade = Caderno::all();
        // fazer o response pro usuario
        return view('admin.cadernos.index',compact('cidades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cidade = Cidade::all();
        $estado = Cidade::all();
        return view('site.cidades.create',compact('cidades','estados'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCidadeRequest $request)
    {
        //
        //Aqui vamos tratar as regras de salvamento e  vamos persistir no banco 
        Cidade::create($request->all());
       //Redirecionar ou  devolver uma mensagem para o cliente
       //return redirect()->route('/noticias.index');
       return redirect()->away('/cidades')->with('success','Cidade criada com sucesso!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Cidade $cidade)
    {
        //
        
        return view('admin.cadernos.show', compact('caderno'));


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cidade $cidade)
    {
        //
        $cidades = Autor::all();
        return view('admin.cidade.edit', compact('cidades'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCidadeRequest $request, Cidade $cidade)
    {
        //
        //
        $cidade->update($request->all());
        return redirect()->away('/cidades')->with('success', 'Cidades  atualizados com sucesso!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cidade $cidade)
    {
        //
        $cidade->delete();

        
        return redirect()->away('/cidades')->with('success', 'Deletado  com sucesso!');
    }

}
