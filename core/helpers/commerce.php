<?php
/**
*	Clase para definir las plantillas de las páginas web del sitio público.
*/
class Commerce
{
	public static function headerTemplate($title)
	{
		session_start();
		ini_set('date.timezone', 'America/El_Salvador');
		print('
			<!DOCTYPE html>
			<html lang="es">
			<head>
				<meta charset="utf-8">
				<title>Medicaldriver - '.$title.'</title>
				<link type="image/png" rel="icon" 	href="../../resources/img/MedicalDriverLogo.png"/>
				<link type="text/css" rel="stylesheet" href="../../resources/css/materialize.min.css"/>
				<link type="text/css" rel="stylesheet" href="../../resources/css/icons.css"/>
				<link type="text/css" rel="stylesheet" href="../../resources/css/commerce.css"/>
				<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
			</head>
			<body>
		');
		if (isset($_SESSION['id_cliente'])) {
			$filename = basename($_SERVER['PHP_SELF']);
			if ($filename != 'login.php') {
				self::modals();
				print('
					<header>
						<div class="header">
						<div class="navbar-fixed">
						<nav class="black">
							<div class="nav-wrapper">
								<a href="index.php" class="brand-logo"><img src="../../resources/img/logo.png" height="60"></a>
								<a href="#" data-target="mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
								<ul class="right hide-on-med-and-down">
									<li><a href="index.php"><i class="material-icons left">view_module</i>Catálogo</a></li>
									<li><a href="#"><i class="material-icons left">shopping_cart</i>Compras</a></li>
									<li><a href="#" class="dropdown-trigger" data-target="dropdown"><i class="material-icons left">person</i><b>Mi cuenta - '.$_SESSION['correo'].'</b><i class="material-icons right">arrow_drop_down</i></a></li>
								</ul>
								<ul id="dropdown" class="dropdown-content">
									<li><a href="#" onclick="modalProfile()" class="blue-text"><i class="material-icons">account_circle</i>Editar perfil</a></li>
									<li><a href="#modal-password" class="modal-trigger blue-text"><i class="material-icons">lock</i>Cambiar contraseña</a></li>
									<li><a href="#" onclick="signOff()" class="blue-text"><i class="material-icons">exit_to_app</i>Cerrar sesión</a></li>
								</ul>
							</div>
						</nav>
					</div>
					<ul class="sidenav" id="mobile">
						<li><a href="index.php"><i class="material-icons left">view_module</i>Catálogo</a></li>
						<li><a href="#"><i class="material-icons left">shopping_cart</i>Compras</a></li>
						<li><a href="#" onclick="signOff()"><i class="material-icons left">person</i>Cerrar sesión</a></li>
					</ul>
				</header>
				');
			}
		} else {
			$filename = basename($_SERVER['PHP_SELF']);
			if ($filename != 'index.php' && $filename != 'register.php' && $filename != 'acceder.php') {
				header('location: index.php');
			} else {
				self::modals();
				print('
				<header>
					<div class="navbar-fixed">
						<nav class="black">
							<div class="nav-wrapper">
								<a href="index.php" class="brand-logo"><img src="../../resources/img/logo.png" height="60"></a>
								<a href="#" data-target="mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
								<ul class="right hide-on-med-and-down">
									<li><a href="index.php"><i class="material-icons left">view_module</i>Catálogo</a></li>
									<!--<li><a href="#"><i class="material-icons left">shopping_cart</i>Compras</a></li>-->
									<li><a href="acceder.php"><i class="material-icons left">person</i>Acceder</a></li>
								</ul>
							</div>
						</nav>
					</div>
					<ul class="sidenav" id="mobile">
						<li><a href="index.php"><i class="material-icons left">view_module</i>Catálogo</a></li>
						<li><a href="#"><i class="material-icons left">shopping_cart</i>Compras</a></li>
						<li><a href="acceder.php"><i class="material-icons left">person</i>Acceder</a></li>
					</ul>
				</header>
				');
			}
		}
		self::modals();
	}

	public static function footerTemplate($controller)
	{
		print('
				</main>
				<footer class="page-footer black">
					<div class="container">
						<div class="row">
							<div class="col s12 m6 l6">
								<h5 class="white-text">Nosotros</h5>
								<p>
									<blockquote><a href="#mision" class="modal-trigger white-text"><b>Misión</b></a> | <a href="#vision" class="modal-trigger white-text"><b>Visión</b></a> | <a href="#valores" class="modal-trigger white-text"><b>Valores</b></a></blockquote>
									<blockquote><a href="#terminos" class="modal-trigger white-text"><b>Términos y condiciones</b></a></blockquote>
								</p>
							</div>
							<div class="col s12 m6 l6">
								<h5 class="white-text">Contáctanos</h5>
								<p>
									<blockquote><a class="white-text" href="https://www.facebook.com/" target="_blank"><b>facebook</b></a> | <a class="white-text" href="https://twitter.com/" target="_blank"><b>twitter</b></a></blockquote>
									<blockquote><a class="white-text" href="https://www.instagram.com/" target="_blank"><b>instagram</b></a> | <a class="white-text" href="https://www.youtube.com/" target="_blank"><b>youtube</b></a></blockquote>
								</p>
							</div>
						</div>
					</div>
					<div class="footer-copyright">
						<div class="container">
							<span>© MedicalDriver, todos los derechos reservados.</span>
							<span class="grey-text text-lighten-4 right">Diseñado con <a class="red-text text-accent-1" href="http://materializecss.com/" target="_blank"><b>Materialize</b></a></span>
						</div>
					</div>
				</footer>
				<script type="text/javascript" src="../../libraries/jquery-3.2.1.min.js"></script>
				<script type="text/javascript" src="../../resources/js/materialize.min.js"></script>
				<script type="text/javascript" src="../../resources/js/sweetalert.min.js"></script>
				<script type="text/javascript" src="../../resources/js/commerce.js"></script>
				<script type="text/javascript" src="../../core/helpers/validator.js"></script>
				<script type="text/javascript" src="https://www.google.com/recaptcha/api.js" async defer></script>
				<script type="text/javascript" src="../../core/helpers/components.js"></script>
				<script type="text/javascript" src="../../core/controllers/commerce/'.$controller.'"></script>
				<script type="text/javascript" src="../../core/controllers/commerce/account.js"></script>
			</body>
			</html>
		');
	}
private function modals()
	{
		print('
			<div id="modal-profile" class="modal">
				<div class="modal-content">
					<h4 class="center-align">Editar perfil</h4>
					<form method="post" id="form-profile" autocomplete="off">
						<div class="row">
							<div class="input-field col s12 m6">
								<i class="material-icons prefix">pets</i>
								<input id="profile_nombres" type="text" name="profile_nombres" class="validate" required/>
								<label for="profile_nombres">Nombres</label>
							</div>
							<div class="input-field col s12 m6">
								<i class="material-icons prefix">perm_contact_calendar</i>
								<input id="profile_apellidos" type="text" name="profile_apellidos" class="validate" required/>
								<label for="profile_apellidos">Apellidos</label>
							</div>
							<div class="input-field col s12 m6">
								<i class="material-icons prefix">email</i>
								<input id="profile_correo" type="email" name="profile_correo" class="validate" required/>
								<label for="profile_correo">Correo</label>
							</div>
						</div>
						<div class="row center-align">
						<a href="#" class="btn waves-effect red tooltipped modal-close" data-tooltip="Cancelar"><i class="material-icons">remove</i></a>
						<button type="submit" class="btn waves-effect black tooltipped" data-tooltip="Guardar"><i class="material-icons">swap_vert</i></button>
						</div>
					</form>
				</div>
			</div>

			<div id="modal-password" class="modal">
				<div class="modal-content">
					<h4 class="center-align">Cambiar contraseña</h4>
					<form method="post" id="form-password" autocomplete="off">
						<div class="row center-align">
							<label>CLAVE ACTUAL</label>
						</div>
						<div class="row">
							<div class="input-field col s12 m6">
								<i class="material-icons prefix">sd_storage</i>
								<input id="clave_actual_1" type="password" name="clave_actual_1" class="validate" required/>
								<label for="clave_actual_1">Clave</label>
							</div>
							<div class="input-field col s12 m6">
								<i class="material-icons prefix">sd_storage</i>
								<input id="clave_actual_2" type="password" name="clave_actual_2" class="validate" required/>
								<label for="clave_actual_2">Confirmar clave</label>
							</div>
						</div>
						<div class="row center-align">
							<label>CLAVE NUEVA</label>
						</div>
						<div class="row">
							<div class="input-field col s12 m6">
								<i class="material-icons prefix">sentiment_very_satisfied</i>
								<input id="clave_nueva_1" type="password" name="clave_nueva_1" class="validate" required/>
								<label for="clave_nueva_1">Clave</label>
							</div>
							<div class="input-field col s12 m6">
								<i class="material-icons prefix">sentiment_very_satisfied</i>
								<input id="clave_nueva_2" type="password" name="clave_nueva_2" class="validate" required/>
								<label for="clave_nueva_2">Confirmar clave</label>
							</div>
						</div>
						<div class="row center-align">
						<a href="#" class="btn waves-effect red tooltipped modal-close" data-tooltip="Cancelar"><i class="material-icons">remove</i></a>
						<button type="submit" class="btn waves-effect black tooltipped" data-tooltip="Actualizar"><i class="material-icons">swap_vert</i></button>
						</div>
					</form>
				</div>
			</div>
			<!--<div id="modal-profile" class="modal">
			<div class="modal-content">
				<h4 class="center-align">Editar perfil</h4>
				<form method="post" id="form-profile">
					<div class="row">
						<div class="input-field col s12 m6">
							<i class="material-icons prefix">pets</i>
							<input id="profile_nombres" type="text" name="profile_nombres" class="validate" required/>
							<label for="profile_nombres">Nombres</label>
						</div>
						<div class="input-field col s12 m6">
							<i class="material-icons prefix">perm_contact_calendar</i>
							<input id="profile_apellidos" type="text" name="profile_apellidos" class="validate" required/>
							<label for="profile_apellidos">Apellidos</label>
						</div>
						<div class="input-field col s12 m6">
							<i class="material-icons prefix">email</i>
							<input id="profile_correo" type="email" name="profile_correo" class="validate" required/>
							<label for="profile_correo">Correo</label>
						</div>
						<div class="input-field col s12 m6">
							<i class="material-icons prefix">sentiment_satisfied</i>
							<input id="profile_alias" type="text" name="profile_alias" class="validate" required/>
							<label for="profile_alias">Alias</label>
						</div>
					</div>
					<div class="row center-align">
					<a href="#" class="btn waves-effect red tooltipped modal-close" data-tooltip="Cancelar"><i class="material-icons">remove</i></a>
					<button type="submit" class="btn waves-effect black tooltipped" data-tooltip="Guardar"><i class="material-icons">swap_vert</i></button>
					</div>
				</form>
			</div>
		</div>

		<div id="modal-password" class="modal">
			<div class="modal-content">
				<h4 class="center-align">Cambiar contraseña</h4>
				<form method="post" id="form-password">
					<div class="row center-align">
						<label>CLAVE ACTUAL</label>
					</div>
					<div class="row">
						<div class="input-field col s12 m6">
							<i class="material-icons prefix">sd_storage</i>
							<input id="clave_actual_1" type="password" name="clave_actual_1" class="validate" required/>
							<label for="clave_actual_1">Clave</label>
						</div>
						<div class="input-field col s12 m6">
							<i class="material-icons prefix">sd_storage</i>
							<input id="clave_actual_2" type="password" name="clave_actual_2" class="validate" required/>
							<label for="clave_actual_2">Confirmar clave</label>
						</div>
					</div>
					<div class="row center-align">
						<label>CLAVE NUEVA</label>
					</div>
					<div class="row">
						<div class="input-field col s12 m6">
							<i class="material-icons prefix">sentiment_very_satisfied</i>
							<input id="clave_nueva_1" type="password" name="clave_nueva_1" class="validate" required/>
							<label for="clave_nueva_1">Clave</label>
						</div>
						<div class="input-field col s12 m6">
							<i class="material-icons prefix">sentiment_very_satisfied</i>
							<input id="clave_nueva_2" type="password" name="clave_nueva_2" class="validate" required/>
							<label for="clave_nueva_2">Confirmar clave</label>
						</div>
					</div>
					<div class="row center-align">
					<a href="#" class="btn waves-effect red tooltipped modal-close" data-tooltip="Cancelar"><i class="material-icons">remove</i></a>
					<button type="submit" class="btn waves-effect black tooltipped" data-tooltip="Actualizar"><i class="material-icons">swap_vert</i></button>
					</div>
				</form>
			</div>
		</div>-->
		');
	}
}
?>
