@include("alertas.index")

@if($projetos->count() != 0)
    <div class="card">
        <h5 class="card-header bg-secondary text-white">Projetos em andamento</h5>
        <div class="card-body "> 
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Abrir</th>
                            <th>Cód</th>
                            <th>Nome</th>
                            <th>Data Inicial</th>
                            <th>Data Final</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projetos as $projeto)
                            <tr>
                                <td>
                                    <a href="{{ route('visualizar.projeto', ['id' => $projeto->id]) }}" class="btn btn-sm btn-success"> <i class="fa fa-folder-open"></i> </a>
                                </td>
                                <td>{{ $projeto->id }}</td>
                                <td>{{ $projeto->nome }}</td>
                                <td>{{ $projeto->data_final->format('d/m/Y') }}</td>
                                <td>{{ $projeto->data_final->format('d/m/Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@else 
<div class="card">
    <div class="card-body">
        <h5> Não existe nenhum projeto em andamento</h5>
    </div>
</div>
@endif