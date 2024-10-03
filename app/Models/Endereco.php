<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;

    protected $fillable = ['logradouro', 'cep', 'id_cidade'];

    public function cidades()
    {
        return $this->belongsTO(Cidade::class,'id_cidade');

    }
    public function negocios() {
        return $this->hasMany(Negocio::class);
    }

    public function pontosTuristicos() {
        return $this->hasMany(pontosTuristicos::class);
    }

}
