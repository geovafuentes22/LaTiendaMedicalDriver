<?php
require_once('../../core/helpers/commerce.php');
Commerce::headerTemplate('Acceder');
?>
<!-- Formularios para acceder -->
<div class="container">
	<h4 class="center-align">ACCEDER</h4>
	<ul class="tabs center-align">
		<li class="tab"><a href="#cuenta">CREAR CUENTA</a></li>
		<li class="tab"><a href="#sesion">INICIAR SESIÓN</a></li>
	</ul>
	<!-- Formulario para crear cuenta -->
	<div id="cuenta">
		<form method="post">
			<div class="row">
				<div class="input-field col s12 m6">
					<i class="material-icons prefix">account_box</i>
					<input type="text" id="nombres" name="nombres" class="validate">
					<label for="nombres">Nombres</label>
				</div>
				<div class="input-field col s12 m6">
					<i class="material-icons prefix">account_box</i>
					<input type="text" id="apellidos" name="apellidos" class="validate">
					<label for="apellidos">Apellidos</label>
				</div>
				<div class="input-field col s12 m6">
					<i class="material-icons prefix">email</i>
					<input type="email" id="correo" name="correo" class="validate">
					<label for="correo">Correo electrónico</label>
				</div>
				<div class="input-field col s12 m6">
					<i class="material-icons prefix">phone</i>
					<input type="text" id="telefono" name="telefono" class="validate">
					<label for="telefono">Teléfono</label>
				</div>
				<div class="input-field col s12 m6">
					<i class="material-icons prefix">security</i>
					<input type="password" id="clave1" name="clave1" class="validate">
					<label for="clave1">Contraseña</label>
				</div>
				<div class="input-field col s12 m6">
					<i class="material-icons prefix">security</i>
					<input type="password" id="clave2" name="clave2" class="validate">
					<label for="clave2">Confirmar contraseña</label>
				</div>
				<div class="input-field col s12">
					<i class="material-icons prefix">place</i>
					<textarea id="direccion" name="direccion" class="materialize-textarea"></textarea>
					<label for="direccion">Dirección</label>
				</div>
				<label class="center-align col s12">
					<input type="checkbox" id="condicion" name="condicion">
					<span>Acepto <a href="#terminos" class="modal-trigger">términos y condiciones</a></span>
				</label>
			</div>
			<div class="row center-align">
				<div class="col s12">
					<button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Registrar"><i class="material-icons">send</i></button>
				</div>
			</div>
		</form>
	</div>
	<!-- Formulario para iniciar sesión -->
	<div id="sesion">
		<form method="post">
			<div class="row">
				<div class="input-field col s12 m6 offset-m3">
					<i class="material-icons prefix">email</i>
					<input type="email" id="usuario" name="usuario" class="validate">
					<label for="usuario">Correo electrónico</label>
				</div>
				<div class="input-field col s12 m6 offset-m3">
					<i class="material-icons prefix">security</i>
					<input type="password" id="clave" name="clave" class="validate">
					<label for="clave">Contraseña</label>
				</div>
			</div>
			<div class="row center-align">
				<button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Ingresar"><i class="material-icons">send</i></button>
			</div>
		</form>
	</div>
</div>
<!-- Efecto parallax con una altura de 300px -->
<div class="parallax-container">
	<div class="parallax">
		<img id="parallax">
	</div>
</div>
<?php
Commerce::footerTemplate('account.js');
?>
