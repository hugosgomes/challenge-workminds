<div id="modalCidade" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
        <div class="header-modal">
            <span class="close">&times;</span>
            <h2>Nova Cidade</h2>
        </div>
        <div class="form">
            <form action="#">
                <input type="text" name="name-modal" placeholder="Cidade">
            </form>
            <div class="savemode-modal">
                <button id="save-cidade-button" class="invert-button" onclick="saveCidade()">Salvar</button>
            </div>
            <div class="editmode-modal">
                <button id="edit-cidade-button" class="invert-button" onclick="editCidade()">Salvar</button>
                <button id="delete-cidade-button" class="invert-button" onclick="deleteCidade()">Excluir</button>
            </div>
        </div>
    </div>
</div>
