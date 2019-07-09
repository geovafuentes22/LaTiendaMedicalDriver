<?php
require_once('../../core/helpers/dashboard.php');
Dashboard::headerTemplate('Clientes');
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
        <a href='../../libraries/reportes/reportecliente2.php' class='btn waves-effect indigo tooltipped fantasmazul' data-tooltip='Reporte de Producto'><i class='material-icons'>assignment</i></a>
    </div>
</div>
<!-- Tabla para mostrar los registros existentes -->
<table class="highlight">
    <thead>
        <tr>
            <th>ID</th>
            <th>NOMBRE</th>
            <th>APELLIDO</th>
            <th>DUI</th>
            <th>CORREO</th>
            <th>EDICION</th>
        </tr>
    </thead>
    <tbody id="tbody-read">
    </tbody>
</table>
<!-- Ventana para crear un nuevo registro -->
<div id="modal-create" class="modal">
    <div class="modal-content">
        <h4 class="center-align">Crear nuevo Cliente</h4>
        <form method="post" id="form-create" enctype="multipart/form-data">
            <div class="row">
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">person_add</i>
                    <input id="create_nombre" type="text" name="create_nombre" class="validate" required/>
                    <label for="create_nombre">Nombre</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">person</i>
                    <input id="create_apellido" type="text" name="create_apellido" class="validate" required/>
                    <label for="create_apellido">Apellido</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">plus_one</i>
                    <input id="create_dui" type="text" name="create_dui" class="validate"  maxlength="9" required/>
                    <label for="create_dui">Dui</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">polymer</i>
                    <input type="email"  id="create_correo" name="create_correo" class="validate" required>
                    <label for="create_correo">Correo</label>
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
        <h4 class="center-align">Modificar Cliente</h4>
        <form method="post" id="form-update" enctype="multipart/form-data">
            <input type="text" id="id_cliente" name="id_cliente"/>
            <div class="row">
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">subtitles</i>
                    <input id="update_nombre" type="text" name="update_nombre" class="validate" required/>
                    <label for="update_nombre">Nombre</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">subtitles</i>
                    <input id="update_apellido" type="text" name="update_apellido" class="validate" required/>
                    <label for="update_apellido">Apellido</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">subtitles</i>
                    <input id="update_dui" type="text" name="update_dui" class="validate" required/>
                    <label for="update_dui">Dui</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">subtitles</i>
                    <input id="update_correo" type="text" name="update_correo" class="validate" required/>
                    <label for="update_correo">Correo</label>
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
Dashboard::footerTemplate('clientes.js');
?>
