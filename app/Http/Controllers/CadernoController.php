<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCadernoRequest;
use App\Http\Requests\UpdateCadernoRequest;
use App\Models\Caderno;

class CadernoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Carregue os dados do banco
        //select * from cadernos
        $cadernos = Caderno::paginate(25);
        // fazer o response pro usuario
        return view('admin.cadernos.index',compact('cadernos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $caderno = Caderno::all();

        return view('site.caderno.create', compact('cadernos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCadernoRequest $request)
    {
        //Debug 
        //dd($request);
        //Aqui vamos tratar as regras de salvamento e  vamos persistir no banco 
        Caderno::create($request->all());
       //Redirecionar ou  devolver uma mensagem para o cliente
       //return redirect()->route('/noticias.index');
       return redirect()->away('/cadernos')->with('success','Caderno  criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Caderno $caderno)
    {
        //
        return view('admin.cadernos.show', compact('caderno'));


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Caderno $caderno)
    {
        //
        return view('admin.caderno.edit', compact('cadernos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCadernoRequest $request, Caderno $caderno)
    {
        //
        $caderno->update($request->all());
        return redirect()->away('/cadernos')->with('success', 'Cadernos atualizado com sucesso!');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Caderno $caderno)
    
    {
        //
        if($caderno->noticias()->count() > 0){
            return redirect()->away('/cadernos')->with('error', 'Caderno possui dependentes!');
        } else {
        $caderno->delete();
         return redirect()->away('/cadernos')->with('success', 'Deletado  com sucesso!');
        }
    }
}
