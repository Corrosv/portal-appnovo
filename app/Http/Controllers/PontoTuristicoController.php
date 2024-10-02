<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePontoTuristicoRequest;
use App\Http\Requests\UpdatePontoTuristicoRequest;
use App\Models\PontoTuristico;

class PontoTuristicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $pontos = PontoTuristico::paginate(25);
        return view('admin.pontosturisticos.index', compact('pontos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $tipos = TipoPontoTuristico::all();
        $enderecos = Endereco::all();
        return view(
            'admin.pontosturisticos.create',
            compact('tipos', 'enderecos')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePontoTuristicoRequest $request)
    {
        //
        PontoTuristico::create($request->all());
        return redirect()->away('/pontosturisticos')->with('success', 'Pontos Turistico criado com sucesso!');

        
        
    }

    /**
     * Display the specified resource.
     */
    public function show(PontoTuristico $pontoTuristico)
    {
        //
        return view('admin.pontosturisticos.show',compact('pontoTuristico'));    
        }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PontoTuristico $pontoTuristico)
    {
        //
        $tipos = TipoPontoTuristico::all();
        $enderecos = Endereco::all();
        return view('admin.pontosturisticos.edit',compact('tipos', 'enderecos', 'pontoTuristico'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePontoTuristicoRequest $request, PontoTuristico $pontoTuristico)
    {
        //
        $pontoTuristico->update($request->all());
        return redirect()->away('/pontosturisticos')->with('success', 'Pontos Turistico atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PontoTuristico $pontoTuristico)
     {
        //
        $pontoTuristico->delete();
        return redirect()->away('/pontosturisticos')->with('success', 'Pontos Turistico removido com sucesso!');
     }
}  
