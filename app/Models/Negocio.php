<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Negocio extends Model
{
    use HasFactory;

    protected $fillable = ['nome_fantasia', 'descricao', 'contato', 'latitude_longitude', 'ativo', 'id_tipo_negocio', 'id_endereco'];


    public function TipoNegocio() {
        return $this->belongsTo(TipoNegocio::class,'id_TipoNegocio');
    }
    public function endereco()
    {
        return $this->belongsTo(Endereco::class, 'id_endereco');
    }
}
