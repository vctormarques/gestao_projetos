@include('alertas.index')   

@if($atividades->count() != 0)
    <div class="card">
        <div class="table-responsive"> 
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Excluir</th>
                        <th>Editar</th>
                        <th>Concluir</th>
                        <th>Cód</th>
                        <th>Nome</th>
                        <th>Data Inicial {{$projeto->finalizada}}</th>
                        <th>Data Final</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach ($atividades as $projeto)
                        @if($projeto->finalizada == '1')
                        <tr class="atividade-finalizada">
                            <td width="10px" align="center">
                                <button type="button" class="btn btn-sm btn-secondary">
                                    <i class="fa fa-close"></i> </a>
                                </button>                                
                            </td>
                            <td width="10px" align="center">
                                <button type="button" class="btn btn-sm btn-secondary">
                                    <i class="fa fa-pencil"></i> </a>
                                </button>                                
                            </td>
                            </td>
                            <td width="10px" align="center">
                                <button type="button" class="btn btn-sm btn-secondary">
                                    <i class="fa fa-check"></i> </a>
                                </button>                                
                            </td>
                        @else
                        <tr>
                            <td width="10px" align="center">
                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#excluirAtividade" data-id="{{ $projeto->id }}" data-idprojeto="{{ $projeto->projeto_id }}">
                                    <i class="fa fa-close"></i> </a>
                                </button>                                
                            </td>
                            <td width="10px" align="center">
                                <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editarAtividade" 
                                onclick="editarAtividade('{{ $projeto->id }}', '{{$projeto->projeto_id}}' , '{{$projeto->nome}}', '{{ $projeto->data_inicial->format('d/m/Y')}}', '{{ $projeto->data_final->format('d/m/Y')}}') ">
                                    <i class="fa fa-pencil"></i> </a>
                                </button>                                
                            </td>
                            <td width="10px" align="center">
                                <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#concluirAtividade" data-id="{{ $projeto->id }}" data-idprojeto="{{ $projeto->projeto_id }}">
                                    <i class="fa fa-check"></i> </a>
                                </button>                                
                            </td>
                        @endif
                            <td>{{ $projeto->id }}</td>
                            <td>{{ $projeto->nome }}</td>
                            <td>{{ $projeto->data_inicial->format('d/m/Y') }}</td>
                            <td>{{ $projeto->data_final->format('d/m/Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@else 
<div class="card">
    <div class="card-body">
        <h6> Não existe nenhuma atividade para este projeto</h6>
    </div>
</div>
@endif


