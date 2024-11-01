<!-- Herda o layout padrão definido no template "main" -->
@extends('templates.main', ['titulo' => "Em Atendimento "])
<!-- Preenche o conteúdo da seção "titulo" -->
@section('titulo') Em Atendimento @endsection
<!-- Preenche o conteúdo da seção "conteudo" -->
@section('conteudo')

    <div class="row">
        <div class="col">
            <x-datalistrecebido
                title="Em Atendimento" 
                crud="coletaResiduos" 
                :header="['id', 'gerador_residuo', 'catador', 'residuo', 'peso', 'status', 'ações']" 
                :data="$dados"
                :hide="[true, true, true, true, true, false, false]" 
            /> 
        </div>
    </div>
@endsection