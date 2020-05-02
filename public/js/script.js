var estados = [];
var estadoSelecionado = 0;
var cidades = [];
var cidadeSelecionada = 0;

$(document).ready(() => {
    loadEstados();
});

const loadEstados = () => {
    $.get('estado').done( (response) => {
        if (response.data) {
            $('#lista-estados *').remove();
            estados = response.data;
            estados.map((estado, index) => {
                $('#lista-estados').append(
                    `<li>
                        <button class="invert-button" onclick="loadCidades(${index})">
                            ${estado.name}
                        </button>
                        <button class="show-button" onclick="abrirModalEditEstado(${index})">
                            <i class="fas fa-search"></i>
                        </button>
                    </li>`
                );
            });
        }
    });
}

const loadCidades = (index) => {
    estadoSelecionado = index;
    $('#estado-selecionado').text(estados[estadoSelecionado].name);
    $.get(`estado/${estados[estadoSelecionado].id}/cidade`).done( (response) => {
        $('#lista-cidades *').remove();
        if (response.data) {
            cidades = response.data;
            cidades.map((cidade, index) => {
                $('#lista-cidades').append(
                    `<li>
                        <button class="invert-button" onclick="abrirModalEditCidade(${index})">
                            ${cidade.name}
                        </button>
                        <button class="show-button" onclick="abrirModalEditCidade(${index})">
                            <i class="fas fa-search"></i>
                        </button>
                    </li>`
                );
            });
        }
    });
}

const saveEstado = () => {
    name = $("#modalEstado input[name='name-modal']").val();
    if (!name) {
        $('#modalEstado .input-error').show();
        return;
    }
    data = {
        name
    }
    $.post('estado', data).done( response => {
        loadEstados();
        alert(response.messages);
        $('.close').click();
        $("#modalEstado input[name='name-modal']").val("");
        $('#modalEstado p').hide();
    });
}

const editEstado = () => {
    name = $("#modalEstado input[name='name-modal']").val();
    if (!name) {
        $('#modalEstado .input-error').show();
        return;
    }
    data = {name}
    $.ajax({
        type: 'put',
        url: `estado/${estados[estadoSelecionado].id}`,
        contentType: 'application/json',
        data: JSON.stringify(data),
    }).done(response => {
        loadEstados();
        alert(response.messages);
        $('.close').click();
        $("#modalEstado input[name='name-modal']").val("");
        $('#modalEstado p').hide();
    })
}

const deleteEstado = () => {
    $.ajax({
        type: 'delete',
        url: `estado/${estados[estadoSelecionado].id}`,
        contentType: 'application/json',
    }).done(response => {
        loadEstados();
        alert(response.messages);
        $('.close').click();
        $("#modalEstado input[name='name-modal']").val("");
    })
}

const saveCidade = () => {
    name = $("#modalCidade input[name='name-modal']").val();
    if (!name) {
        $('#modalCidade .input-error').show();
        return;
    }
    data = {
        name
    }
    $.post(`estado/${estados[estadoSelecionado].id}/cidade`, data).done( response => {
        loadCidades(estadoSelecionado);
        alert(response.messages);
        $('.close').click();
        $("#modalCidade input[name='name-modal']").val("");
        $('#modalCidade .input-error').hide();
    });
}

const editCidade = () => {
    name = $("#modalCidade input[name='name-modal']").val();
    if (!name) {
        $('#modalCidade .input-error').show();
        return;
    }
    data = {name}
    $.ajax({
        type: 'put',
        url: `estado/${estados[estadoSelecionado].id}/cidade/${cidades[cidadeSelecionada].id}`,
        contentType: 'application/json',
        data: JSON.stringify(data),
    }).done(response => {
        loadCidades(estadoSelecionado);
        alert(response.messages);
        $('.close').click();
        $("#modalCidade input[name='name-modal']").val("");
        $('#modalCidade .input-error').hide();
    })
}

const deleteCidade = () => {
    $.ajax({
        type: 'delete',
        url: `estado/${estados[estadoSelecionado].id}/cidade/${cidades[cidadeSelecionada].id}`,
        contentType: 'application/json',
    }).done(response => {
        loadCidades(estadoSelecionado);
        alert(response.messages);
        $('.close').click();
        $("#modalCidade input[name='name-modal']").val("");
    })
}
