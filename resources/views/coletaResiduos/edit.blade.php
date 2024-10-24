<!-- Herda o layout padrão definido no template "main" -->
@extends('templates.main', ['titulo' => "Alterar Coleta de Resíduo"])
<!-- Preenche o conteúdo da seção "titulo" -->
@section('titulo') Alterar Coleta de Resíduo @endsection
<!-- Preenche o conteúdo da seção "conteudo" -->
@section('conteudo')


    <form action="{{ route('coletaResiduos.update', $dados->id) }}" method="POST">
        
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col" >
                <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01" color="#00FF00">Gerador de Resíduos</label>
                    <select name="gerador_residuo_id" class="form-control {{ $errors->has('gerador_residuo_id') ? 'is-invalid' : '' }}">
                        @foreach ($dados_GerRes as $key)
                            <option value="{{ $key->id }}" @if($key->status == 0 && $key->id == $dados['gerador_residuo_id']) selected="true" @endif>
                                {{ $key->nome }}
                            </option>
                        @endforeach
                    </select>
                    @if($errors->has('gerador_residuo_id'))
                        <div class='invalid-feedback'>
                            {{ $errors->first('gerador_residuo_id') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col" >
                <div class="form-floating mb-3">
                    <input 
                        type="text" 
                        class="form-control" 
                        name="residuo" 
                        placeholder="Residuo"
                        value="{{$dados['residuo']}}"
                    />
                    <label for="residuo">Residuo</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col" >
                <div class="form-floating mb-3">
                    <input 
                        type="integer" 
                        class="form-control" 
                        name="peso" 
                        placeholder="Peso"
                        value="{{$dados['peso']}}"
                    />
                    <label for="peso">Quantidade Estimada (kg)</label>
                </div>
            </div>
        </div>
        <div class="btn-floating mb-3 btn-floating mb-3" data-toggle="buttons">
            <label class="btn btn-secondary active">
                <input type="radio" name="status" id="ativo" value="0"> Ativo
            </label>
            <label class="btn btn-secondary">
                <input type="radio" name="status" id="inativo" value="1"> Inativo
            </label>
        </div>
        <div class="row">
            <div class="col">
                <a href="javascript:document.querySelector('form').submit();" class="btn btn-success btn-block align-content-center">
                    Confirmar &nbsp;
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </svg>
                </a>
            </div>
        </div>
    </form>

@endsection