<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/categorias.php');

// Se comprueba si existe una acción a realizar, de lo contrario se muestra un mensaje de error
if (isset($_GET['action'])) {
	session_start();
	$categoria = new Categorias;
	$result = array('status' => 0, 'message' => null, 'exception' => null, 'session'=> 1);
	// Se verifica si existe una sesión iniciada como administrador para realizar las operaciones correspondientes
	if (isset($_SESSION['id_usuario'])) {
      //  require_once('sesioncaducada.php');
		switch ($_GET['action']) {
			case 'read':
				if ($result['dataset'] = $categoria->readCategoria()) {
					$result['status'] = 1;
				} else {
					$result['exception'] = 'No hay categorías registradas';
				}
				break;
			case 'search':
				$_POST = $categoria->validateForm($_POST);
				if ($_POST['search'] != '') {
					if ($result['dataset'] = $categoria->searchCategoria($_POST['search'])) {
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
				$_POST = $categoria->validateForm($_POST);
        		if ($categoria->setNombre($_POST['create_nombre'])) {
						if (is_uploaded_file($_FILES['create_archivo']['tmp_name'])) {
							if ($categoria->setfoto($_FILES['create_archivo'], null)) {
								if ($categoria->createCategoria()) {
									$result['id'] = Database::getLastRowId();
									$result['status'] = 1;
									if ($categoria->saveFile($_FILES['create_archivo'], $categoria->getRuta(), $categoria->getfoto())) {
										$result['message'] = 'Categoría creada correctamente';
									} else {
										$result['message'] = 'Categoría creada. No se guardó el archivo';
									}
								} else {
									$result['exception'] = 'Operación fallida';
								}
							} else {
								$result['exception'] = $categoria->getImageError();
							}
						} else {
							$result['exception'] = 'Seleccione una imagen';
						}
				} else {
					$result['exception'] = 'Nombre incorrecto';
				}
            	break;
            case 'get':
                if ($categoria->setId($_POST['id_categoria'])) {
                    if ($result['dataset'] = $categoria->getCategoria()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Categoría inexistente';
                    }
                } else {
                    $result['exception'] = 'Categoría incorrecta';
                }
            	break;
			case 'update':
				$_POST = $categoria->validateForm($_POST);
				if ($categoria->setId($_POST['id_categoria'])) {
					if ($categoria->getCategoria()) {
		                if ($categoria->setNombre($_POST['update_nombre'])) {
								if (is_uploaded_file($_FILES['update_archivo']['tmp_name'])) {
									if ($categoria->setfoto($_FILES['update_archivo'], $_POST['ranfla'])) {
										$archivo = true;
									} else {
										$result['exception'] = $categoria->getImageError();
										$archivo = false;
									}
								} else {
									if (!$categoria->setfoto(null, $_POST['ranfla'])) {
										$result['exception'] = $categoria->getImageError();
									}
									$archivo = false;
								}
								if ($categoria->updateCategoria()) {
									$result['status'] = 1;
									if ($archivo) {
										if ($categoria->saveFile($_FILES['update_archivo'], $categoria->getRuta(), $categoria->getfoto())) {
											$result['message'] = 'Categoría modificada correctamente';
										} else {
											$result['message'] = 'Categoría modificada. No se guardó el archivo';
										}
									} else {
										$result['message'] = 'Categoría modificada. No se subió ningún archivo';
									}
								} else {
									$result['exception'] = 'Operación fallida';
								}
						} else {
							$result['exception'] = 'Nombre incorrecto';
						}
					} else {
						$result['exception'] = 'Categoría inexistente';
					}
				} else {
					$result['exception'] = 'Categoría incorrecta';
				}
            	break;
            case 'delete':
				if ($categoria->setId($_POST['identifier'])) {
					if ($categoria->getCategoria()) {
						if ($categoria->deleteCategoria()) {
							$result['status'] = 1;
							if ($categoria->deleteFile($categoria->getRuta(), $_POST['filename'])) {
								$result['message'] = 'Categoría eliminada correctamente';
							} else {
								$result['message'] = 'Categoría eliminada. No se borró el archivo';
							}
						} else {
							$result['exception'] = 'Operación fallida';
						}
					} else {
						$result['exception'] = 'Categoría inexistente';
					}
				} else {
					$result['exception'] = 'Categoría incorrecta';
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
