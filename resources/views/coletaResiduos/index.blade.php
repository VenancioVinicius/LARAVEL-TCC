<!-- Herda o layout padrão definido no template "main" -->
@extends('templates.main', ['titulo' => "Coleta em Aberto"])
<!-- Preenche o conteúdo da seção "titulo" -->
@section('titulo') Em Aberto @endsection
<!-- Preenche o conteúdo da seção "conteudo" -->
@section('conteudo')

    <div class="row">
        <div class="col">
            <x-datalistcoleta
                title="Em Aberto" 
                crud="coletaResiduos" 
                :header="['id', 'gerador_residuo', 'residuo', 'peso', 'status', 'ações']" 
                :data="$dados"
                :hide="[true, true, true, true, false, false]" 
            /> 
        </div>
    </div>
@endsection