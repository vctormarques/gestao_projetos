@extends('layout.site')



@section('conteudo')   
    <div class="my-2">
        <a type="button" class="btn btn-warning btn-sm" href="{{ route('index') }}">
            Voltar
        </a>
    </div>     

    <div class="card">
        <h6 class="card-header bg-secondary text-white">Dados do projeto</h6>
        <div class="card-body "> 
            <div class="row">
                <div class="col-md-12">
                    <p><b>Nome do Projeto:</b> {{ $projeto->id." - ".$projeto->nome }}</p>
                    <p><b>Data Inicial:</b> {{ $projeto->data_inicial->format('d/m/Y') }}</p>
                    <p><b>Data Final:</b> {{ $projeto->data_final->format('d/m/Y') }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <h6 class="card-header bg-light text-dark">Atividades do projeto</h6>
        <div class="card-body "> 
            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addAtividadeModal" data-id="{{ $projeto->id }}" onclick="addAtividadeModal('{{ $projeto->id }}')">
            Adicionar atividade
            </button>
            @include("projeto.__atividades")            
        </div>
    </div>
    
    @include("projeto.__modal")            

@endsection
 