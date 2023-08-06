<!-- Herda o layout padrão definido no template "main" -->
@extends('templates.main', ['titulo' => "Gerador Residuo", 'rota' => "geradorResiduos.create", 'permission' => $permissions['geradorResiduos.create']])
<!-- Preenche o conteúdo da seção "titulo" -->
@section('titulo') Gerador Residuo @endsection
<!-- Preenche o conteúdo da seção "conteudo" -->
@section('conteudo')

    <div class="row">
        <div class="col">
            <x-datalist 
                title="GeradorResiduos" 
                crud="geradorResiduos" 
                :header="['nome', 'cep', 'telefone', 'status', 'ações']" 
                :data="$dados"
                :hide="[true, true, false, false, false]" 
            /> 
        </div>
    </div>
@endsection