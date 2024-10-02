<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNoticiaRequest;
use App\Http\Requests\UpdateNoticiaRequest;
use App\Models\Noticia;

class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Aqui nos vamos chamara rota index do web.php
        //E vamos transferir a informação para o arquivo index no dominio no resource//views/dominio/index.blade.php
        // $noticias = Noticia::all() recupera todas as noticias do banco
        //$noticias = Noticia::where('titulo', 'policia')->get();
        
        $noticias = Noticia::paginate(25);
        // preciso responder o usuario
        return view('admin.noticias.index', compact('noticias'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Eu vou Carregar tudo que é necessário para salvar um registro
        //AUTORES
        $autores = Autor::all();
        //Cadernos
        $cadernos = caderno::all();
        //algo que precise ser carregado uma vez e sirva para toda a aplicação eu carrego no provider
        //AppServiceProvider
        //return view('site.cadernos.create');


        return view('site.noticia.create', compact('autores','cadernos'));
    }
     

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNoticiaRequest $request)
    {
        //Aqui vamos tratar as regras de salvamento e  vamos persistir no banco 
        Noticia::create($request->all());
       //Redirecionar ou  devolver uma mensagem para o cliente
       //return redirect()->route('/noticias.index');
       return redirect()->away('/noticias')->with('success','Noticia criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Noticia $noticia)
    {
        //$id -> recebendo via api
        // $noticia = Noticia::find($id);
        // $nome e eu quero o primeiro registro
        // $noticia = Noticia::where('nome',$nome)->first();
        // $noticia = Noticia::where('nome',$nome)->get();
        // $noticia = Noticia::where('nome',$nome)->paginate();
        return view('admin.noticias.show', compact('noticia'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Noticia $noticia)
    {
        //
        $autores = Autor::all();
        $cadernos = Caderno::all();
        return view('admin.noticias.edit', compact('noticia','cadernos','autores'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNoticiaRequest $request, Noticia $noticia)
    {
        //exemplo api
        // $noticia = Noticia::find($id);
        // if(!$noticia){
        // return response()->json(['error','Noticia nao..']);
        //}
        $noticia->update($request->all());
        return redirect()->away('/noticias')->with('success', 'Noticias atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Noticia $noticia)
    {
        //
        //if($cadernos->noticias()->count() > 0 ({
        //    return redirect()-away('/noticias')->with('success', 'Caderno possui dependentes')

        if($noticia->autor()->count() > 0){
            return redirect()->away('/noticia')->with('error', 'noticia possui dependentes!');
        } else {
        $noticia->delete();
         return redirect()->away('/noticias')->with('success', 'Deletado  com sucesso!');
        }
    }
}
