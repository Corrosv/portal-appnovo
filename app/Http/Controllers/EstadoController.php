<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEstadoRequest;
use App\Http\Requests\UpdateEstadoRequest;
use App\Models\Estado;

class EstadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $estado = Caderno::all();
        // fazer o response pro usuario
        return view('admin.estado.index',compact('estados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $estado = Estado::all();
        return view('site.estados.create',compact('estados'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEstadoRequest $request)
    {
        //
        Estado::create($request->all());
       //Redirecionar ou  devolver uma mensagem para o cliente
       //return redirect()->route('/noticias.index');
       return redirect()->away('/estados')->with('success','Estados criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Estado $estado)
    {
        //
        return view('admin.estados.show', compact('estado'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Estado $estado)
    {
        //
        $estados = Autor::all();
        return view('admin.estado.edit', compact('cidade'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEstadoRequest $request, Estado $estado)
    {
        //
        $estado->update($request->all());
        return redirect()->away('/estados')->with('success', 'Estados  atualizados com sucesso!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Estado $estado)
    {
        //
        $estado->delete();

        
        return redirect()->away('/estados')->with('success', 'Deletado  com sucesso!');

    }
}
