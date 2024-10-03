<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PontoTuristico extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'descricao', 'contato', 'latitude_longitude', 'Imagem', 'como_chegar', 'id_endereco', 'id_tipo_ponto_turistico'];


    public function endereco() {
        return $this->belongTo(Endereco::class,'id_endereco');
    }
    public function tipopontoturistico()
    {
        return $this->belongTo(TipoPontoTuristico::class, 'id_tipo_ponto_turistico');
    }
}
