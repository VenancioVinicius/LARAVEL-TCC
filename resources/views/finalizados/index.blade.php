<!-- Herda o layout padrão definido no template "main" -->
@extends('templates.main', ['titulo' => "Pedidos Finalizados "])
<!-- Preenche o conteúdo da seção "titulo" -->
@section('titulo') Pedidos Finalizados @endsection
<!-- Preenche o conteúdo da seção "conteudo" -->
@section('conteudo')

    <div class="row">
        <div class="col">
            <x-datalistfinalizado
                title="Pedidos Finalizados" 
                crud="coletaResiduos" 
                :header="['id', 'gerador_residuo', 'catador', 'residuo', 'peso', 'status']" 
                :data="$dados"
                :hide="[true, true, true, true, true, false]" 
            /> 
        </div>
    </div>
@endsection