<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAutorRequest;
use App\Http\Requests\UpdateAutorRequest;
use App\Models\Autor;

class AutorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $autores = Autor::paginate(25);
        // preciso responder o usuario
        return view('admin.autor.index', compact('autores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $autores = Autor::all();

        return view('site.autor.create', compact('autores'));


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAutorRequest $request)
    {
        //

        //Aqui vamos tratar as regras de salvamento e  vamos persistir no banco 
        Autor::create($request->all());
       //Redirecionar ou  devolver uma mensagem para o cliente
       //return redirect()->route('/noticias.index');
       return redirect()->away('/autores')->with('success','Autor  criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Autor $autor)
    {
        //

        //$id -> recebendo via api
        // $noticia = Noticia::find($id);
        // $nome e eu quero o primeiro registro
        // $noticia = Noticia::where('nome',$nome)->first();
        // $noticia = Noticia::where('nome',$nome)->get();
        // $noticia = Noticia::where('nome',$nome)->paginate();
        return view('admin.autores.show', compact('autor'));


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Autor $autor)
    {
        //

        $autores = Autor::all();
        return view('admin.autor.edit', compact('autores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAutorRequest $request, Autor $autor)
    {
        //

        $autor->update($request->all());
        return redirect()->away('/autores')->with('success', 'Autores atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Autor $autor)
    {
        //

        $autor->delete();

        
        return redirect()->away('/autores')->with('success', 'Deletado  com sucesso!');


    }
}
