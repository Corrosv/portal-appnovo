<!-- Herdar as caracteristicas do meu template -->
@extends('layout.app')
 <!-- Ajustar o título -->
@section('title',"".$noticia->titulo)
<!-- Carregar no yield conteudo -->
@section('conteudo')
<div>
    <h3>Titulo: {{$noticia->Titulo}}</h3>
    <h2>Titulo: {{$noticia->subtitulo}}</h2>
    <p>Data: {{$noticia->data}}</p>
    <p>Texto: {{$noticia->texto}}</p>
    <p>Autor: {{$noticia->autor->nome}}</p>
    <p>Caderno: {{$noticia->caderno->nome}}</p>
</div>
     <div>
         <a href="/admin/noticias"
    </div>
@endsection