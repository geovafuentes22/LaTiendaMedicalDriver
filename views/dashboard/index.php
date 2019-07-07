<?php
require_once('../../core/helpers/dashboard.php');
Dashboard::headerTemplate('MedicalDriver');
?>

<div class="container">
    <div class="row">
        <form method="post" id="form-sesion">
            <div class="input-field col s12 m6 offset-m3">
                <i class="material-icons prefix">child_care</i>
                <input id="alias" type="text" name="alias" class="validate" required/>
                <label for="alias">Usuario</label>
            </div>
            <div class="input-field col s12 m6 offset-m3">
                <i class="material-icons prefix">eject</i>
                <input id="clave" type="password" name="clave" class="validate" required/>
                <label for="clave">Contraseña</label>
            </div>
            <div class="col s12 center-align">
                <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Ingresar"><i class="material-icons">arrow_upward</i></button>
            </div>
        </form>
    </div>
</div>
<?php
Dashboard::footerTemplate('index.js');
?>
