<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEnderecoRequest;
use App\Http\Requests\UpdateEnderecoRequest;
use App\Models\Endereco;

class EnderecoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        //Carregue os dados do banco
        //select * from cadernos
        $endereco = Endereco::all();
        // fazer o response pro usuario
        return view('admin.endereco.index',compact('enderecos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $cidade = Cidade::all();
    return view('site.endereco.create', compact('enderecos','cidades','tipo_ponto_turistico'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEnderecoRequest $request)
    {
        ///Debug 
        //dd($request);
        //Aqui vamos tratar as regras de salvamento e  vamos persistir no banco 
        Endereco::create($request->all());
        //Redirecionar ou  devolver uma mensagem para o cliente
        //return redirect()->route('/noticias.index');
        return redirect()->away('/enderecos')->with('success','Endereco  criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Endereco $endereco)
    {
        //
        return view('admin.enderecos.show', compact('endereco'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Endereco $endereco)
    {
        //
        $enderecos = Endereco::all();
        $cidades = Cidade::all();
        return view('admin.endereco.edit', compact('cadernos'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEnderecoRequest $request, Endereco $endereco)
    {
        //
        $endereco->update($request->all());
        return redirect()->away('/enderecos')->with('success', 'Enderecos atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Endereco $endereco)
    {
        //
    if($endereco->negocios()->count() > 0 || $endereco->pontoTuristicos()->count() > 0)
    {
    }else{

    }
     
        return redirect()->away('/enderecos')->with('success', 'Deletado  com sucesso!');
    }
}


