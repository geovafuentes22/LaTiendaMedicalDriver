<?php
/**
*	Clase para definir las plantillas de las páginas web del sitio privado.
*/
class Dashboard
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
					<title>Dashboard - '.$title.'</title>
					<link type="image/png" rel="icon" href="../../resources/img/MedicalDriverLogo.png"/>
					<link type="text/css" rel="stylesheet" href="../../resources/css/materialize.min.css"/>
					<link type="text/css" rel="stylesheet" href="../../resources/css/icons.css"/>
					<link type="text/css" rel="stylesheet" href="../../resources/css/dashboard.css"/>
					<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
				</head>
				<body>
		');
		// Se comprueba si existe una sesión para mostrar el menú de opciones, de lo contrario se muestra un menú vacío
		if (isset($_SESSION['id_usuario'])) {
			$filename = basename($_SERVER['PHP_SELF']);
			if ($filename != 'index.php' && $filename != 'register.php') {
				self::modals();
				print('
					<header>
						<div class="navbar-fixed">
							<nav class="black">
								<div class="nav-wrapper">
									<a href="main.php" class="brand-logo"><img src="../../resources/img/MedicalDriverLogo.png" height="60"></a>
									<a href="#" data-target="mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
									<ul class="right hide-on-med-and-down">
										<li><a href="clientes.php"><i class="material-icons left">wc</i>Clientes</a></li>
										<li><a href="productos.php"><i class="material-icons left">assignment</i>Productos</a></li>
										<li><a href="categorias.php"><i class="material-icons left">equalizer</i>Categorías</a></li>
										<li><a href="garantias.php"><i class="material-icons left">apps</i>Garantia</a></li>
										<li><a href="#" class="dropdown-trigger" data-target="dropdown"><i class="material-icons left">account_box</i> <b>'.$_SESSION['alias_usuario'].'</b></a></li>
										<li><a href="#" onclick="signOff()"><i class="material-icons">settings_power</i></a>

									</ul>
									<ul id="dropdown" class="dropdown-content">
										<li><a href="usuarios.php"><i class="material-icons left">contact_mail</i>Usuarios</a></li>
										<li><a href="#" onclick="modalProfile()"><i class="material-icons">whatshot</i>Editar perfil</a></li>
										<li><a href="#modal-password" class="modal-trigger"><i class="material-icons">loop</i>Cambiar clave</a></li>
									</ul>

								</div>
							</nav>
						</div>
						<ul class="sidenav" id="mobile">
						<li><a href="clientes.php"><i class="material-icons left">wc</i>Clientes</a></li>
						<li><a href="productos.php"><i class="material-icons left">assignment</i>Productos</a></li>
						<li><a href="categorias.php"><i class="material-icons left">equalizer</i>Categorías</a></li>
						<li><a href="garantias.php"><i class="material-icons left">apps</i>Garantia</a></li>
							<li><a class="dropdown-trigger" href="#" data-target="dropdown-mobile"><i class="material-icons">account_box</i> <b>'.$_SESSION['alias_usuario'].'</b></a></li>
							<li><a href="#" onclick="signOff()"><i class="material-icons">settings_power</i></a></li>
						</ul>
						<ul id="dropdown-mobile" class="dropdown-content">
							<li><a href="usuarios.php"><i class="material-icons left">contact_mail</i>Usuarios</a></li>
							<li><a href="#" onclick="modalProfile()"><i class="material-icons left">whatshot</i>Editar perfil</a></li>
							<li><a href="#modal-password" class="modal-trigger"><i class="material-icons left">loop</i>Cambiar clave</a></li>
						</ul>
					</header>
					<main class="container">
					<div auto><h3 class="center-align">Bienvenido a <br> Medical Driver</h3></div>
				');
			} else {
				header('location: main.php');
			}
		} else {
			$filename = basename($_SERVER['PHP_SELF']);
			if ($filename != 'index.php' && $filename != 'register.php') {
				header('location: index.php');
			} else {
				print('
					<header>
						<div class="navbar-fixed">
							<nav class="black">
								<div class="nav-wrapper">
								<a class="brand-logo" ><img src="../../resources/img/MedicalDriverLogo.png" height="60"></a>
								</div>
							</nav>
						</div>
					</header>
					<main class="container">
					<div auto><h3 class="center-align">Bienvenido a <br> Medical Driver</h3></div>
				');
			}
		}
			
	}


public static function footerTemplate($controller)
	{
		print('
					</main>
					<footer class="page-footer black">
						<div class="container">
							<div class="row">
								<div class="col s12 m6">
									<h5 class="white-text">Creadores</h5>
									<a class="white-text"><i class="material-icons left">business_center</i>
									Geovany Fuentes <br>
									Joel Novoa</a>
								</div>
								<div class="col s12 m6 right-align">
									<h5 class="white-text">Sitio Público</h5>
									<a class="White-text" href="../commerce/index.php""><i class="material-icons right">wb_cloudy</i> MedicalDriver</a>
								</div>
							</div>
						</div>
						<div class="footer-copyright">
							<div class="container">
								<span>MedicalDriver©, todos los derechos reservados.</span>
								<span class="white-text right">Asistentes Tecnicos  <a class="white-text text-accent-1"><b>MedicalDriver.Sv</b></a></span>
							</div>
						</div>
					</footer>
					<script type="text/javascript" src="../../libraries/jquery-3.2.1.min.js"></script>
					<script type="text/javascript" src="../../resources/js/materialize.min.js"></script>
					<script type="text/javascript" src="../../resources/js/sweetalert.min.js"></script>
					<script type="text/javascript" src="../../resources/js/dashboard.js"></script>
					<script type="text/javascript" src="../../core/helpers/validator.js"></script>
					<script type="text/javascript" src="../../core/helpers/components.js"></script>
					<script type="text/javascript" src="../../core/controllers/dashboard/account.js"></script>
					<script type="text/javascript" src="../../core/controllers/dashboard/'.$controller.'"></script>
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
			</div>
		');
	}
}
?>
