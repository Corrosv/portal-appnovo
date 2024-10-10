<?php

use App\Http\Controllers\AutorController;
use App\Http\Controllers\CadernoController;
use App\Http\Controllers\CidadeController;
use App\Http\Controllers\EnderecoController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\NegocioController;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\PontoTuristicoController;
use App\Http\Controllers\TipoNegocioController;
use App\Http\Controllers\TipoPontoTuristicoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// GET: requisicao via URL
// POST: requisição via cabecalho da request
// UPDATE: requisição via  URL e cabecalho
// DELETE ou SOFTDDELETE: que vai passar via URL o objeto a ser eliminado
// o segundo, tem que configurar migration e model.

//Route::get('/cadernos',[CadernoController::class,'index'])->name('cadernos.index');


//Route::get('/cadernos',[CadernoController::class,'create'])->name('cadernos.create');

//Route::get('/cadernos',[CadernoController::class,'store'])->name('cadernos.store');

//Route::get('/cadernos/{caderno}',[CadernoController::class,'edit'])->name('cadernos.edit');

//Route::put('/cadernos/{caderno}',[CadernoController::class,'update'])->name('cadernos.update');

//Route::delete('/cadernos/{caderno}',[CadernoController::class,'destroy'])->name('cadernos.destroy');
//php artisan route:list
// Resources

Route::group(['prefix' => 'admin'], function () {

    Route::resource('/cadernos',CadernoController::class);
    Route::resource('/autores',AutorController::class);
    Route::resource('/Noticias',NoticiaController::class);
    Route::resource('/Negocio',NegocioController::class);
    Route::resource('/TipoNegocio',TipoNegocioController::class);
    Route::resource('/TipoPontoTuristico',TipoPontoTuristicoController::class);
    Route::resource('/Endereco',EnderecoController::class);
    Route::resource('/PontoTuristico',PontoTuristicoController::class);
    Route::resource('/Cidade',CidadeController::class);
    Route::resource('/Estado',EstadoController::class);

});
