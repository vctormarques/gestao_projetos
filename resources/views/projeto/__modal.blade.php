
<!-- Modal Cadastrar Projeto-->
<div class="modal fade" id="addProjeto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addProjetoLabel">Cadastrar projeto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form action="{{ route('adicionar.projeto') }}" method="post" enctype="multipart/form" id="formAdicionarProjeto">
            <div class="modal-body">
                @csrf
                <div class="row">
                    <div class='col-md-12'>
                        <label for="nome">Nome do projeto</label>
                        <input type="text" class='form-control' name="nome" id="nome" required>
                    </div>
                    <div class='col-md-12'>
                        <label for="dataInicial">Data Inicial</label>
                        <input type="text" class='form-control data' name="dataInicial" id="dataInicial" required>
                    </div>
                    <div class='col-md-12'>
                        <label for="dataFinal">Data Final</label>
                        <input type="text" class='form-control data' name="dataFinal" id="dataFinal" required>
                    </div>
                </div>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-primary" name="btnAdicionarProjeto" id="btnAdicionarProjeto">Cadastrar</button>
            </div>
        </form>
    </div>
  </div>
</div>

<!-- Modal Adicionar Atividade-->
<div class="modal fade" id="addAtividadeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addAtividadeModalLabel">Adicionar atividade</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form action="{{ route('adicionar.atividade') }}" method="post" enctype="multipart/form" id="formAdicionarAtividade">
            <div class="modal-body">
                <input type="hidden" class='form-control projeto_id' name="projeto_id" id="projeto_id">
                @csrf
                <div class="row">
                    <div class='col-md-12'>
                        <label for="nome">Nome da atividade</label>
                        <input type="text" class='form-control' name="nome" id="nome" required>
                    </div>
                    <div class='col-md-12'>
                        <label for="dataInicial">Data Inicial</label>
                        <input type="text" class='form-control data' name="dataInicial" id="dataInicial" required>
                    </div>
                    <div class='col-md-12'>
                        <label for="dataFinal">Data Final</label>
                        <input type="text" class='form-control data' name="dataFinal" id="dataFinal" required>
                    </div>
                </div>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-primary" name="btnAdicionarAtividade" id="btnAdicionarAtividade">Adicionar</button>
            </div>
        </form>
    </div>
  </div>
</div>

<!-- Modal Editar Atividade-->
<div class="modal fade" id="editarAtividade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editarAtividadeLabel">Editar atividade</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form action="{{ route('editar.atividade') }}" method="post" enctype="multipart/form" id="formEditarAtividade">
            <div class="modal-body">
                <input type="hidden" class='form-control atividade_id' name="atividade_id" id="atividade_id">
                <input type="hidden" class='form-control projeto_id' name="projeto_id" id="projeto_id">
                @csrf
                <div class="row">
                    <div class='col-md-12'>
                        <label for="nome">Nome da atividade</label>
                        <input type="text" class='form-control nome' name="nome" id="nome" required>
                    </div>
                    <div class='col-md-12'>
                        <label for="dataInicial">Data Inicial</label>
                        <input type="text" class='form-control data dataInicial' name="dataInicial" id="dataInicial" required>
                    </div>
                    <div class='col-md-12'>
                        <label for="dataFinal">Data Final</label>
                        <input type="text" class='form-control data dataFinal' name="dataFinal" id="dataFinal" required>
                    </div>
                </div>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-warning" name="btnEditarAtividade" id="btnEditarAtividade">Editar</button>
            </div>
        </form>
    </div>
  </div>
</div>

<!-- Modal Concluir Atividade-->
<div class="modal fade" id="concluirAtividade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="concluirAtividadeLabel">Concluir atividade</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form action="{{ route('concluir.atividade') }}" method="post" enctype="multipart/form" id="formConcluirAtividade">
            <div class="modal-body">
                <input type="hidden" class='form-control atividade_id' name="atividade_id" id="atividade_id">
                <input type="hidden" class='form-control projeto_id' name="projeto_id" id="projeto_id">
                @csrf
                <div class="row">
                    <div class='result-concluir'>
                    </div>
                </div>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-success" name="btnConcluirAtividade" id="btnConcluirAtividade">Concluir</button>
            </div>
        </form>
    </div>
  </div>
</div>

<!-- Modal Excluir Atividade-->
<div class="modal fade" id="excluirAtividade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="excluirAtividadeLabel">Excluir atividade</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form action="{{ route('excluir.atividade') }}" method="post" enctype="multipart/form" id="formExcluirAtividade">
            <div class="modal-body">
                <input type="hidden" class='form-control atividade_id' name="atividade_id" id="atividade_id">
                <input type="hidden" class='form-control projeto_id' name="projeto_id" id="projeto_id">
                @csrf
                <div class="row">
                    <div class='result-excluir'>
                    </div>
                </div>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-danger" name="btnExcluirAtividade" id="btnExcluirAtividade">Excluir</button>
            </div>
        </form>
    </div>
  </div>
</div>