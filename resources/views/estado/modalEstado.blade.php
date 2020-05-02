<div id="modalEstado" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
        <div class="header-modal">
            <span class="close">&times;</span>
            <h2>Novo Estado</h2>
        </div>
        <div class="form">
            <form action="#">
                <input type="text" name="name-modal" placeholder="Estado">
                <p class="input-error">Nome obrigatório!</p>
            </form>
            <div class="savemode-modal">
                <button id="save-button" class="invert-button" onclick="saveEstado()">Salvar</button>
            </div>
            <div class="editmode-modal">
                <button id="edit-button" class="invert-button" onclick="editEstado()">Salvar</button>
                <button id="delete-button" class="invert-button" onclick="deleteEstado()">Excluir</button>
            </div>
        </div>
    </div>
</div>
