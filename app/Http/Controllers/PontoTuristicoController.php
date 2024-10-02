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
        //Carregue os dados do banco
        //select * from cadernos
        $ponto_turistico = Ponto_Turistico::paginate(25);
        // fazer o response pro usuario
        return view('admin.ponto_turistico.index',compact('ponto_turisticos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $ponto_turistico = PontoTuristico::all();
        $endereco = Endereco::all();
        $tipo_ponto_turistico = TipoPontoTuristico::all();

        return view('site.ponto_turistico.create', compact('ponto_turistico','endereco','tipo_ponto_turistico'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePontoTuristicoRequest $request)
    {
        //
        PontoTuristico::create($request->all());
       //Redirecionar ou  devolver uma mensagem para o cliente
       //return redirect()->route('/noticias.index');
       return redirect()->away('/Tipo_Ponto_Turisticos')->with('success','Ponto Turistico   criado com sucesso!');

        
        
    }

    /**
     * Display the specified resource.
     */
    public function show(PontoTuristico $pontoTuristico)
    {
        //
        return view('admin.ponto_turisticos.show', compact('Ponto_Turistico'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PontoTuristico $pontoTuristico)
    {
        //
        return view('admin.ponto_turistico.edit', compact('ponto_turistico'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePontoTuristicoRequest $request, PontoTuristico $pontoTuristico)
    {
        //
        $ponto_turistico->update($request->all());
        return redirect()->away('/ponto_turisticos')->with('success', 'Ponto Turistico atualizado com sucesso!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PontoTuristico $pontoTuristico)
    {
        //
        if($ponto_turistico->tipo_ponto_turistico()->count() > 0){
            return redirect()->away('/tipo_ponto_turistico')->with('error', 'Caderno possui dependentes!');
        } else {
        $caderno->delete();
         return redirect()->away('/tipo_ponto_turisticos')->with('success', 'Deletado  com sucesso!');
        }

    }
}
