<?php
require_once('../../core/helpers/commerce.php');
Commerce::headerTemplate('Acceder');
?>
<!-- Formularios para acceder -->
<div class="container">
	<h4 class="center-align">ACCEDER</h4>
	<div id="sesion">
		<form id="form-sesion" method="post">
			<div class="row">
				<div class="input-field col s12 m6 offset-m3">
					<i class="material-icons prefix">email</i>
					<input id="correo" type="email" name="correo" class="validate">
					<label for="correo">Correo electrónico</label>
				</div>
				<div class="input-field col s12 m6 offset-m3">
					<i class="material-icons prefix">security</i>
					<input  id="clave" type="password"name="clave" class="validate">
					<label for="clave">Contraseña</label>
				</div>
			</div>
			<div class="row center-align">
				<p>¿No tienes una cuenta? </p> <a href="register.php">Registrate aquí</a>
				<button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Ingresar"><i class="material-icons">send</i></button>
			</div>
		</form>
	</div>
</div>
<?php
Commerce::footerTemplate('index.js');
?>
