<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/clientes.php');

// Se comprueba si existe una acción a realizar, de lo contrario se muestra un mensaje de error
if (isset($_GET['action'])) {
	session_start();
	$cliente = new Clientes;
	$result = array('status' => 0, 'message' => null, 'exception' => null, 'session'=> 1);
	// Se verifica si existe una sesión iniciada como administrador para realizar las operaciones correspondientes
	if (isset($_SESSION['id_usuario'])) {
		require_once('sesioncaducada.php');
		switch ($_GET['action']) {
			case 'read':
				if ($result['dataset'] = $cliente->readClientes()) {
					$result['status'] = 1;
				} else {
					$result['exception'] = 'No hay clientes registrados';
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
        		if ($cliente->setNombre($_POST['create_nombre'])) {
					if ($cliente->setApellido($_POST['create_apellido'])) {
						if ($cliente->setDui($_POST['create_dui'])) {
							if ($cliente->setCorreo($_POST['create_correo'])) {
								if ($cliente->createCliente()) {
									$result['id'] = Database::getLastRowId();
									$result['status'] = 1;
										$result['message'] = 'Cliente creado correctamente';
								} else {
									$result['exception'] = 'Operación fallida';
								}
				}else {
					$result['exception'] = 'Correo Incorrecto';
				}
				}else {
					$result['exception'] = 'Dui Incorrecto';
				}
				}else {
					$result['exception'] = 'Apellidos Incorrectos';
				}
				} else {
					$result['exception'] = 'Nombres Incorrectos';
				}
				break;
			
			case 'get':
                if ($cliente->setId($_POST['id_cliente'])) {
                    if ($result['dataset'] = $cliente->getCliente()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Cliente inexistente';
                    }
                } else {
                    $result['exception'] = 'Cliente incorrecto';
                }
				break;
				
				case 'update':
				$_POST = $cliente->validateForm($_POST);
				if ($cliente->setId($_POST['id_cliente'])) {
					if ($cliente->getCliente()) {
		                if ($cliente->setNombre($_POST['update_nombre'])) {
							if ($cliente->setApellido($_POST['update_apellido'])) {
								if ($cliente->setDui($_POST['update_dui'])) {
									if ($cliente->setCorreo($_POST['update_correo'])) {
								if ($cliente->updateCliente()) {
									$result['status'] = 1;
											$result['message'] = 'Cliente modificada correctamente';
								} else {
									$result['exception'] = 'Operación fallida';
								}
							}else {
								$result['exception'] = 'Correo Incorrecto, Revise';
							}
						}else {
							$result['exception'] ='Dui Incorrecto, Revise por favor';
						}
						}else {
							$result['exception'] ='Apellidos Incorrectos';
						}
						} else {
							$result['exception'] = 'Nombre Incorrecto';
						}
					} else {
						$result['exception'] = 'Cliente inexistente';
					}
				} else {
					$result['exception'] = 'Cliente incorrecto';
				}
				break;

            case 'delete':
				if ($cliente->setId($_POST['identifier'])) {
					if ($cliente->getCliente()) {
						if ($cliente->deleteCliente()) {
							$result['status'] = 1;
								$result['message'] = 'Cliente eliminada correctamente';
						} else {
							$result['exception'] = 'Operación fallida';
						}
					} else {
						$result['exception'] = 'Cliente inexistente';
					}
				} else {
					$result['exception'] = 'Cliente incorrecta';
				}
            	break;
			default:
				exit('Acción no disponible');
		}
		print(json_encode($result));
	} else {
		exit('Acceso no disponible');
	}
} else {
	exit('Recurso denegado');
}
?>
