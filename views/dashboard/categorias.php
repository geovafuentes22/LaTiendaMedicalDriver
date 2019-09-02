<?php
require_once('../../core/helpers/dashboard.php');
Dashboard::headerTemplate('Categorías');
?>
<div class="row">
    <!-- Formulario de búsqueda -->
    <form method="post" id="form-search" autocomplete="off">
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
        <a href='../../libraries/reportes/reportecategoria.php' class='btn waves-effect indigo tooltipped fantasmazul' data-tooltip='Reporte de Categoria' target="_blank"><i class='material-icons'>assignment</i></a>
    </div>
</div>
<!-- Tabla para mostrar los registros existentes -->
<table class="highlight">
    <thead>
        <tr>
            <th>ID</th>
            <th>NOMBRE</th>
            <th>IMAGEN</th>
            <th>ACCIÓN</th>
        </tr>
    </thead>
    <tbody id="tbody-read">
    </tbody>
</table>
<!-- Ventana para crear un nuevo registro -->
<div id="modal-create" class="modal">
    <div class="modal-content">
        <h4 class="center-align">Crear Nueva Categoria</h4>
        <form method="post" id="form-create" enctype="multipart/form-data" autocomplete="off">
            <div class="row">
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">note_add</i>
                    <input id="create_nombre" type="text" name="create_nombre" class="validate" required/>
                    <label for="create_nombre">Nombre</label>
                </div>
                <div class="file-field input-field col s12 m6">
                    <div class="btn waves-effect  brown tooltipped"  data-tooltip="Subir Foto">
                        <span><i class="material-icons">satellite</i></span>
                        <input id="create_archivo" type="file" name="create_archivo" required/>
                    </div>
                    <div class="file-path-wrapper">
                        <input type="text" class="file-path validate" placeholder="Seleccione una imagen de 500x500"/>
                    </div>
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
        <h4 class="center-align">Modificar categoría</h4>
        <form method="post" id="form-update" enctype="multipart/form-data" autocomplete="off">
            <input type="hidden" id="id_categoria" name="id_categoria"/>
            <input type="hidden" id="imagen_categoria" name="imagen_categoria"/>
            <div class="row">
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">subtitles</i>
                    <input id="update_nombre" type="text" name="update_nombre" class="validate" required/>
                    <label for="update_nombre">Nombre</label>
                </div>
                <div class="file-field input-field col s12 m6">
                    <div class="btn waves-effect  brown tooltipped"  data-tooltip="Actualizar foto">
                        <span><i class="material-icons">image</i></span>
                        <input id="update_archivo" type="file" name="update_archivo"/>
                    </div>
                    <div class="file-path-wrapper">
                        <input  id ="ranfla" name="ranfla" class="file-path validate" type="text" placeholder="Seleccione una imagen de 500x500"/>
                    </div>
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
Dashboard::footerTemplate('categorias.js');
?>
