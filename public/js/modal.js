

$('#modalEstado .close').click(function () {
    $('#modalEstado').hide();
    $('#modalEstado .input-error').hide();
});

$('#modalCidade .close').click(function () {
    $('#modalCidade').hide();
    $('#modalCidade .input-error').hide();
});

function abrirModalSaveEstado() {
    $('#modalEstado .savemode-modal').show();
    $('#modalEstado .editmode-modal').hide();
    $('#modalEstado .header-modal h2').text('Novo Estado');
    $('#modalEstado').show();
}

function abrirModalEditEstado(index) {
    const name = estados[index].name;
    estadoSelecionado = index;
    $('#modalEstado .savemode-modal').hide();
    $('#modalEstado .editmode-modal').show();
    $('#modalEstado .header-modal h2').text(name);
    $('#modalEstado').show();
    $("#modalEstado input[name='name-modal']").val(name);
}

function abrirModalSaveCidade() {
    if (!estadoSelecionado) {
        alert('Selecione um Estado');
        return;
    }
    $('#modalCidade .savemode-modal').show();
    $('#modalCidade .editmode-modal').hide();
    $('#modalCidade .header-modal h2').text('Nova Cidade');
    $('#modalCidade').show();
}

function abrirModalEditCidade(index) {
    const name = cidades[index].name;
    cidadeSelecionada = index;
    $('#modalCidade .savemode-modal').hide();
    $('#modalCidade .editmode-modal').show();
    $('#modalCidade .header-modal h2').text(name);
    $('#modalCidade').show();
    $("#modalCidade input[name='name-modal']").val(name);
}
