<!-- Herda o layout padrão definido no template "main" -->
@extends('templates.main', ['titulo' => "Catador", 'rota' => "catadors.create"])
<!-- Preenche o conteúdo da seção "titulo" -->
@section('titulo') Catadores @endsection
<!-- Preenche o conteúdo da seção "conteudo" -->
@section('conteudo')

    <div class="row">
        <div class="col">
            <x-datalist 

            /> 
        </div>
    </div>
@endsection