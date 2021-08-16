
@extends('layout.site')

@section('conteudo')

    <div class="my-2">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProjeto">
            Cadastrar um novo projeto
        </button>
    </div>

    @include("projeto.index")

    @include("projeto.__modal")     

@endsection('conteudo')

