<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/garantias.php');

// Se comprueba si existe una acción a realizar, de lo contrario se muestra un mensaje de error
if (isset($_GET['action'])) {
	session_start();
	$garantia = new Garantias;
	$result = array('status' => 0, 'message' => null, 'exception' => null, 'session'=> 1);
	// Se verifica si existe una sesión iniciada como administrador para realizar las operaciones correspondientes
	if (isset($_SESSION['id_usuario'])) {
		require_once('sesioncaducada.php');
		switch ($_GET['action']) {
			case 'read':
				if ($result['dataset'] = $garantia->listGarantia()) {
					$result['status'] = 1;
				} else {
					$result['exception'] = 'No hay Garantías registradas';
				}
				break;
			case 'search':
				$_POST = $garantia->validateForm($_POST);
				if ($_POST['search'] != '') {
					if ($result['dataset'] = $garantia->searchGarantia($_POST['search'])) {
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
				$_POST = $garantia->validateForm($_POST);
        		if ($garantia->setMeses($_POST['create_meses'])) {
					if ($garantia->setidestado(isset($_POST['create_estado']) ? 1 : 0)) {
								if ($garantia->createGarantia()) {
									$result['id'] = Database::getLastRowId();
									$result['status'] = 1;
										$result['message'] = 'Garantía creada correctamente';
								} else {
									$result['exception'] = 'Operación fallida';
								}
					}else {
						$result['exception'] = ['Estado Incorrecto'];
					}
				} else {
					$result['exception'] = 'Meses incorrectos';
				}
				break;
			
			case 'get':
			
                if ($garantia->setId($_POST['id_garantia'])) {
                    if ($result['dataset'] = $garantia->getGarantia()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Garantía inexistente';
                    }
                } else {
                    $result['exception'] = 'Garantía incorrecta';
                }
				break;
				
			case 'update':
				$_POST = $garantia->validateForm($_POST);
				if ($garantia->setId($_POST['id_garantia'])) {
					if ($garantia->getGarantia()) {
		                if ($garantia->setMeses($_POST['update_meses'])) {
							if ($garantia->setidestado(isset($_POST['update_estado']) ? 1 : 0)) {
								if ($garantia->updateGarantia()) {
									$result['status'] = 1;
											$result['message'] = 'Garantia modificada correctamente';
								} else {
									$result['exception'] = 'Operación fallida';
								}
							}else {
								$result['exception'] ='Estado Incorrecto';
							}
						} else {
							$result['exception'] = 'Meses incorrectos';
						}
					} else {
						$result['exception'] = 'Garantía inexistente';
					}
				} else {
					$result['exception'] = 'Garantía incorrecta';
				}
				break;

            case 'delete':
				if ($garantia->setId($_POST['identifier'])) {
					if ($garantia->getGarantia()) {
						if ($garantia->deleteGarantia()) {
							$result['status'] = 1;
								$result['message'] = 'Garantia eliminada correctamente';
						} else {
							$result['exception'] = 'Operación fallida';
						}
					} else {
						$result['exception'] = 'Garantía inexistente';
					}
				} else {
					$result['exception'] = 'Garantía incorrecta';
				}
				break;

				case 'garantiaP':
                if($result['dataset'] = $garantia->grafico3()){
                    $result['status'] = 1;
                }else{
                    $result['exception'] = 'No se encontraron datos';
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
