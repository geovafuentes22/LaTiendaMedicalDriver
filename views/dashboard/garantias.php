<?php
require_once('../../core/helpers/dashboard.php');
Dashboard::headerTemplate('Garantias');
?>
<div class="row">
    <!-- Formulario de búsqueda -->
    <form method="post" id="form-search">
        <div class="input-field col s6 m4">
            <i class="material-icons prefix">search</i>
            <input id="search" type="text" name="search"/>
            <label for="search">Buscador</label>
        </div>
        <div class="input-field col s6 m4">
        <button type="submit" class="btn waves-effect brown tooltipped" data-tooltip="Buscar"><i class="material-icons">sync</i></button>
        </div>
    </form>
    <!-- Botón para abrir ventana de nuevo registro -->
    <div class="input-field center-align col s12 m4">
        <a href="#" onclick="modalCreate()" class="btn waves-effect  deep-orange tooltipped" data-tooltip="Agregar"><i class="material-icons">more_vert</i></a>
    </div>
</div>
<!-- Tabla para mostrar los registros existentes -->
<table class="highlight">
    <thead>
        <tr>
            <th>ID</th>
            <th>MESES</th>
            <th>ESTADO</th>            
            <th>ACCIÓN</th>
        </tr>
    </thead>
    <tbody id="tbody-read">
    </tbody>
</table>
<!-- Ventana para crear un nuevo registro -->
<div id="modal-create" class="modal">
    <div class="modal-content">
        <h4 class="center-align">Crear Nueva Garantia</h4>
        <form method="post" id="form-create" enctype="multipart/form-data">
            <div class="row">
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">note_add</i>
                    <input id="create_meses" type="text" name="create_meses" class="validate" required/>
                    <label for="create_meses">Meses</label>
                </div>
                <div class="col s12 m6">
                    <p>
                        <div class="switch">
                            <span>Estado:</span>
                            <label>
                                <i class="material-icons">visibility_off</i>
                                <input id="create_estado" type="checkbox" name="create_estado" checked/>
                                <span class="lever"></span>
                                <i class="material-icons">visibility</i>
                            </label>
                        </div>
                    </p>
                </div>
            </div>
            <div class="row center-align">
                <a href="#" class="btn waves-effect red tooltipped modal-close" data-tooltip="Cancelar"><i class="material-icons">remove</i></a>
                <button type="submit" class="btn waves-effect black tooltipped" data-tooltip="Crear"><i class="material-icons">swap_vert</i></button>
            </div>
        </form>
    </div>
</div>


<!-- Ventana para modificar un registro existente -->
<div id="modal-update" class="modal">
    <div class="modal-content">
        <h4 class="center-align">Modificar Garantia</h4>
        <form method="post" id="form-update" enctype="multipart/form-data">
            <input type="hidden" id="id_garantia" name="id_garantia"/>
            <div class="row">
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">subtitles</i>
                    <input id="update_meses" type="text" name="update_meses" class="validate" required/>
                    <label for="update_meses">Meses</label>
                </div>
                <div class="col s12 m6">
                    <p>
                        <div class="switch">
                            <span>Estado:</span>
                            <label>
                                <i class="material-icons">visibility_off</i>
                                <input id="update_estado" type="checkbox" name="update_estado" checked/>
                                <span class="lever"></span>
                                <i class="material-icons">visibility</i>
                            </label>
                        </div>
                    </p>
                </div>
            </div>
            <div class="row center-align">
            <a href="#" class="btn waves-effect red tooltipped modal-close" data-tooltip="Cancelar"><i class="material-icons">remove</i></a>
                <button type="submit" class="btn waves-effect black tooltipped" data-tooltip="Actualizar"><i class="material-icons">swap_vert</i></button>
            </div>
        </form>
    </div>
</div>
<?php
Dashboard::footerTemplate('garantias.js');
?>
