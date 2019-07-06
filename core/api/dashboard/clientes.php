<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/clientes.php');

// Se comprueba si existe una acción a realizar, de lo contrario se muestra un mensaje de error
if (isset($_GET['action'])) {
	session_start();
	$cliente = new Clientes;
	$result = array('status' => 0, 'message' => null, 'exception' => null);
	// Se verifica si existe una sesión iniciada como administrador para realizar las operaciones correspondientes
	if (isset($_SESSION['id_usuario'])) {
		switch ($_GET['action']) {
			case 'read':
				if($result['dataset']=$cliente->readClientes()){
					$result['status']=1;
				}
				else{
					$result['exception']='No hay información';
				}
			break;
			case 'search':
				$_POST = $cliente->validateForm($_POST);
				if ($_POST['search'] != '') {
					if ($result['dataset'] = $cliente->searchCliente($_POST['search'])) {
						$result['status'] = 1;
						$rows = count($result['dataset']);
						if ($rows > 1) {
							$result['message'] = 'Se encontraron '.$rows.' coincidencias';
						} else {
							$result['message'] = 'Solo existe una coincidencia';
						}
					} else {
						$result['exception'] = 'No hay coincidencias';
					}
				} else {
					$result['exception'] = 'Ingrese un valor para buscar';
				}
				break;
				case 'create':
				$_POST = $cliente->validateForm($_POST);
				if($cliente ->setNombre($_POST[	'create_nombre'])){

				}else {
					$result['exception']='Nombre Incorrecto mi amor';
				}
				break;
		}
	} else {
		exit('Acceso no disponible');
	}
	print(json_encode($result));
} else {
	exit('Recurso denegado');
}
?>
