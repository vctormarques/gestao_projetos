function addAtividadeModal(valor) {
    $('#formAdicionarAtividade')[0].reset();
    $(".projeto_id").val(valor);
}
function editarAtividade(atividade, projeto, nome, dataInicial, dataFinal) {
    $('#formEditarAtividade')[0].reset();
    $(".atividade_id").val(atividade);
    $(".projeto_id").val(projeto);
    $(".nome").val(nome);
    $(".dataInicial").val(dataInicial);
    $(".dataFinal").val(dataFinal);
}

$('#concluirAtividade').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')
    var idprojeto = button.data('idprojeto')

    var modal = $(this)
    modal.find(".result-concluir").html('Deseja concluir a atividade ' + id)
    modal.find(".atividade_id").val(id)
    modal.find(".projeto_id").val(idprojeto)
});

$('#excluirAtividade').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')
    var idprojeto = button.data('idprojeto')

    var modal = $(this)
    modal.find(".result-excluir").html('Deseja excluir a atividade ' + id)
    modal.find(".atividade_id").val(id)
    modal.find(".projeto_id").val(idprojeto)
});

$(document).ready(function () {
    setTimeout(function () {
        $(".succes-alert").slideToggle('slow');
    }, 2000);
});

$(function () {
    $(".data").datepicker({
        format: 'dd/mm/yyyy',
        autoclose: true,
        language: 'pt-BR'
    });
});