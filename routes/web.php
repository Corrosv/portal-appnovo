<?php

use App\Http\Controllers\CadernoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// GET: requisicao via URL
// POST: requisição via cabecalho da request
// UPDATE: requisição via  URL e cabecalho
// DELETE ou SOFTDDELETE: que vai passar via URL o objeto a ser eliminado
// o segundo, tem que configurar migration e model.

Route::get('/cadernos',[CadernoController::class,'index'])->name('cadernos.index');


Route::get('/cadernos',[CadernoController::class,'create'])->name('cadernos.create');

Route::get('/cadernos',[CadernoController::class,'store'])->name('cadernos.store');

Route::get('/cadernos/{caderno}',[CadernoController::class,'edit'])->name('cadernos.edit');

Route::put('/cadernos/{caderno}',[CadernoController::class,'update'])->name('cadernos.update');

Route::delete('/cadernos/{caderno}',[CadernoController::class,'destroy'])->name('cadernos.destroy');
//php artisan route:list
// Resources

