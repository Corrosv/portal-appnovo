
<!-- Herdar as caracteristicas do meu template -->
@extends('layout.app')
 <!-- Ajustar o título -->
@section('title','Criar Noticia')
<!-- Carregar no yield conteudo -->
@section('conteudo')
<div class="row mx-auto">
    <div class="mt=3 mb=3">
        <h3>Criando Nova Noticia</h3>
    <!--- form ilustrativo --->
        <form action="/admin/noticias" method="POST" enctype="multipart/form-data">
        <!-- Token -->
             @csrf
        <!-- 'data' -->
        <div class="form-group" mb-2>
        <label for="data">Data da Noticia:</label>
        <input type="date" id="data" name="data"
        value = "{{old('data')}}"
        class="form-control @error('data') is-invalid @enderror">
        @if($errors->has('data'))
        <div class="text-danger">
            {{$errors->first('data')}}
        </div>
        @endif


        </div>
        <!-- 'titulo' -->

        <div class="form-group" mb-2>
        <label for="titulo">Titulo da Noticia:</label>
        <input type="text" id="titulo" name="titulo"
        value = "{{old('titulo')}}"
        class="form-control @error('date') is-invalid @enderror">
        @if($errors->has('titulo'))
        <div class="text-danger">
            {{$errors->first('titulo')}}
        </div>
        @endif
        </div>

        <!-- 'subtitulo' -->
        <div class="form-group" mb-2>
        <label for="subtitulo">Subtitulo da Noticia:"</label>
        <input type="text" id="subtitulo" name="subtitulo"
        value = "{{old('subtitulo')}}"
        class="form-control @error('date') is-invalid @enderror">
        @if($errors->has('subtitulo'))
        <div class="text-danger">
            {{$errors->first('subtitulo')}}
        </div>
        @endif
        </div>

        <!-- 'texto' -->

        <div class="form-group mb-2">
            <label for="texto">Digite o texto da noticia:</label>
            <textarea id="texto" name="texto"
            class="form-control @error('date') is-invalid @enderror">
                {{old('texto')}}
            </textarea>
            @if($errors->has('texto'))
        <div class="text-danger">
            {{$errors->first('texto')}}
         </div>
         @endif

        <!-- 'id_autor' -->
        <div class="form-group mb-2">
            <label for="id_autor">Escolha um Autor:</label>
            <select name="id_autor" id="id_autor"
            class="form-select @error('date') is-invalid @enderror">
            <option seleted disabled>Selecione um Autor.</option>
            @foreach($autores as $autor)
            <option value="{{$autor->id}}"
            {{old('id_autor') == $autor->id ? 'selected' : "" }}>{{$autor->nome}}
            </option>
        @endforeach
        </select>
        @if($errors->has('id_autor'))
        <div class="text-danger">
            {{$errors->first('id_autor')}}
         </div>
         @endif
        



        <!-- 'id_caderno' -->


        <div class="form-group mb-2">
            <label for="id_caderno">Escolha Seu Caderno:</label>
            <select name="id_caderno" id="id_caderno"

            class="form-select @error('id_caderno') is-invalid @enderror">
            <option seleted disabled>Selecione um Caderno.</option>
            @foreach($cadernos as $caderno)
            <option value="{{$caderno->id}}"
            {{old('id_caderno') == $caderno->id ? 'selected' : "" }}>{{$caderno->nome}}
            </option>
        @endforeach
        </select>
        @if($errors->has('id_caderno'))
        <div class="text-danger">
            {{$errors->first('id_caderno')}}
         </div>
         @endif
            
        
        <button type="submit" class="btn btn-success">
            Salvar</button>
     </form>
    </div>
</div>
@endsection