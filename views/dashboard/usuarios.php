<?php
require_once('../../core/helpers/dashboard.php');
Dashboard::headerTemplate('Usuarios');
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
    <a href='../../libraries/reportes/reporteusuario.php' class='btn waves-effect indigo tooltipped fantasmazul' data-tooltip='Reporte de Usuarios' target="_blank"><i class='material-icons'>assignment</i></a>
    </div>
</div>
<!-- Tabla para mostrar los registros existentes -->
<table class="highlight">
    <thead>
        <tr>
            <th>APELLIDOS</th>
            <th>NOMBRES</th>
            <th>CORREO</th>
            <th>USUARIO</th>
            <th>ACCIÓN</th>
        </tr>
    </thead>
    <tbody id="tbody-read">
    </tbody>
</table>
<!-- Ventana para crear un nuevo registro -->
<div id="modal-create" class="modal">
    <div class="modal-content">
        <h4 class="center-align">Creando el usuario</h4>
        <form method="post" id="form-create" autocomplete="off">
            <div class="row">
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">person</i>
                    <input id="create_nombres" type="text" name="create_nombres" class="validate" required/>
                    <label for="create_nombres">Nombres</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">person</i>
                    <input id="create_apellidos" type="text" name="create_apellidos" class="validate" required/>
                    <label for="create_apellidos">Apellidos</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">email</i>
                    <input id="create_correo" type="email" name="create_correo" class="validate" required/>
                    <label for="create_correo">Correo</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">person_pin</i>
                    <input id="create_alias" type="text" name="create_alias" class="validate" required/>
                    <label for="create_alias">Alias</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">security</i>
                    <input id="create_clave1" type="password" name="create_clave1" class="validate" required/>
                    <label for="create_clave1">Clave</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">security</i>
                    <input id="create_clave2" type="password" name="create_clave2" class="validate" required/>
                    <label for="create_clave2">Confirmar clave</label>
                </div>
            </div>
            <div class="row center-align">
            <a href="#" class="btn waves-effect red tooltipped modal-close" data-tooltip="Cancelar"><i class="material-icons">remove</i></a>
                <button type="submit" class="btn waves-effect black tooltipped" data-tooltip="Actualizar"><i class="material-icons">swap_vert</i></button>
            </div>
        </form>
    </div>
</div>
<!-- Ventana para modificar un registro existente -->
<div id="modal-update" class="modal">
    <div class="modal-content">
        <h4 class="center-align">Modificar usuario</h4>
        <form method="post" id="form-update">
            <input type="hidden" id="id_usuario" name="id_usuario"/>
            <div class="row">
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">person</i>
                    <input id="update_nombres" type="text" name="update_nombres" class="validate" required/>
                    <label for="update_nombres">Nombres</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">person</i>
                    <input id="update_apellidos" type="text" name="update_apellidos" class="validate" required/>
                    <label for="update_apellidos">Apellidos</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">email</i>
                    <input id="update_correo" type="email" name="update_correo" class="validate" required/>
                    <label for="update_correo">Correo</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">person_pin</i>
                    <input id="update_alias" type="text" name="update_alias" class="validate" required/>
                    <label for="update_alias">Alias</label>
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
Dashboard::footerTemplate('usuarios.js');
?>
