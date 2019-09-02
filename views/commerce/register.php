<?php
require_once('../../core/helpers/commerce.php');
Commerce::headerTemplate('Registrarse');
?>
<!-- Formularios para acceder -->
<div class="container">
	<h4 class="center-align">Registrarse</h4>

	<!-- Formulario para crear cuenta -->
	<div id="cuenta">
		<form id="form-register" method="post" autocomplete="off">
			<div class="row">
				<div class="input-field col s12 m6">
					<i class="material-icons prefix">account_box</i>
					<input type="text" id="nombres" name="nombres" class="validate" required/>
					<label for="nombres">Nombres</label>
				</div>
				<div class="input-field col s12 m6">
					<i class="material-icons prefix">account_box</i>
					<input type="text" id="apellidos" name="apellidos" class="validate" required/>
					<label for="apellidos">Apellidos</label>
				</div>
				<div class="input-field col s12 m6">
					<i class="material-icons prefix">phone</i>
					<input type="text" id="dui" name="dui" class="validate" max-lenght="8" required/>
					<label for="dui">DUI</label>
				</div>
				<div class="input-field col s12 m6">
					<i class="material-icons prefix">email</i>
					<input type="email" id="correo" name="correo" class="validate" required/>
					<label for="correo">Correo electrónico</label>
				</div>
				<div class="input-field col s12 m6">
					<i class="material-icons prefix">security</i>
					<input type="password" id="clave1" name="clave1" class="validate" required/>
					<label for="clave1">Contraseña</label>
				</div>
				<div class="input-field col s12 m6">
					<i class="material-icons prefix">security</i>
					<input type="password" id="clave2" name="clave2" class="validate" required/>
					<label for="clave2">Confirmar contraseña</label>
				</div>
				<!--<div class="input-field col s12">
					<i class="material-icons prefix">place</i>
					<textarea id="direccion" name="direccion" class="materialize-textarea"></textarea>
					<label for="direccion">Dirección</label>
				</div>-->
				<label class="center-align col s12">
					<input type="checkbox" id="condicion" name="condicion">
					<span>Acepto <a href="#terminos" class="modal-trigger">términos y condiciones</a></span>
				</label>
				<div class="center-align col s12">
				<div class="g-recaptcha" data-sitekey="6LepKbUUAAAAAF27xkXtlib2d9h18mLzGI-U4_v7"></div>
				</div>
			</div>
			<div class="row center-align">
				<div class="col s12">
					<button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Registrar"><i class="material-icons">send</i></button>
				</div>
			</div>
		</form>
	</div>
    <?php
Commerce::footerTemplate('register.js');
?>