<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTipoNegocioRequest;
use App\Http\Requests\UpdateTipoNegocioRequest;
use App\Models\TipoNegocio;

class TipoNegocioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $tipoNegocios = TipoNegocio::paginate(25);
        return view('admin.tiponegocios.index', compact('tipoNegocios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.tiponegocios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTipoNegocioRequest $request)
    {
        //
        TipoNegocio::create($request);
        return redirect()->away('/tiponegocios')
            ->with('success', 'Tipo Negocio criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(TipoNegocio $tipoNegocio)
    {
        //
        return view('admin.tiponegocios.index', compact('tipoNegocio'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TipoNegocio $tipoNegocio)
    {
        //
        return view('admin.tiponegocios.edit', compact('tipoNegocio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTipoNegocioRequest $request, TipoNegocio $tipoNegocio)
    {
        //
        $tipoNegocio->update($request->all());
        return redirect()->away('/tiponegocios')
            ->with('success', 'Tipo Negocio atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TipoNegocio $tipoNegocio)
    {
        //
        if ($tipoNegocio->negocios()->count() > 0) {
            return redirect()->away('/tiponegocios')
                ->with('error', 'Tipo Negocio possui dependentes!');
        }

        $tipoNegocio->delete();
        return redirect()->away('/tiponegocios')
            ->with('success', 'Tipo Negocio removido com sucesso!');
    }
}
