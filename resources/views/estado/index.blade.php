<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('images/16x16.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script src="https://kit.fontawesome.com/2e314a729a.js" crossorigin="anonymous"></script>
    <title>Challenge WorkMinds</title>
</head>
<body>
    <div class="container">
        <div class="content">
            <div class="img">
                <img src="{{asset('images/workingminds.png')}}" alt="workingminds">
            </div>
            <div class="first-content">
                <div class="estados">
                    <h3>Estados</h3>
                    <button class="default-button" onclick="abrirModalSaveEstado()">
                        + Adicionar Estado
                    </button>
                    <div class="list">
                        <ul id="lista-estados"></ul>
                    </div>
                </div>
            </div>
            <div class="second-content">
                <div class="cidades">
                    <h3>Cidades (<span id="estado-selecionado">Clique nos estados para ver suas cidades</span>)</h3>
                    <button class="default-button" onclick="abrirModalSaveCidade()">+ Adicionar Cidade</button>
                    <div class="list">
                        <ul id="lista-cidades"></ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="overimg"></div>
    </div>

    <!-- The Modal -->
    @include('estado.modalEstado')
    @include('estado.modalCidade')

    <script
        src="https://code.jquery.com/jquery-3.5.0.min.js"
        integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ="
        crossorigin="anonymous">
    </script>
    <script src="{{asset('js/script.js')}}"></script>
    <script src="{{asset('js/modal.js')}}"></script>
</body>
</html>
