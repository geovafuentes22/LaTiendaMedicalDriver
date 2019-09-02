<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/clientes.php');

//Se comprueba si existe una acción a realizar, de lo contrario se muestra un mensaje de error
if (isset($_GET['action'])) {
    session_start();
    $cliente = new Clientes();
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    //Se verifica si existe una sesión iniciada como administrador para realizar las operaciones correspondientes
    if (isset($_SESSION['id_cliente'])) {
        switch ($_GET['action']) {
            case 'logout':
                if (session_destroy()) {
                    header('location: ../../../views/commerce/acceder.php');
                } else {
                    header('location: ../../../views/commerce/index.php');
                }
                break;
            case 'readProfile':
                if ($cliente->setId($_SESSION['id_cliente'])) {
                    if ($result['dataset'] = $cliente->getCliente()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'cliente inexistente';
                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
                }
                break;
            case 'editProfile':
                if ($cliente->setId($_SESSION['id_cliente'])) {
                    if ($cliente->getCliente()) {
                        $_POST = $cliente->validateForm($_POST);
                        if ($cliente->setNombre($_POST['profile_nombres'])) {
                            if ($cliente->setApellido($_POST['profile_apellidos'])) {
                                if ($cliente->setCorreo($_POST['profile_correo'])) {
                                        if ($cliente->updateCliente()) {
                                            $_SESSION['correo'] = $cliente->getCorreo();
                                            $result['status'] = 1;
                                            $result['message'] = 'Perfil modificado correctamente';
                                     } else {
                                         $result['exception'] = 'Operación fallida';
                                     }
                                } else {
                                    $result['exception'] = 'Correo incorrecto';
                                }
                            } else {
                                $result['exception'] = 'Apellidos incorrectos';
                            }
                        } else {
                            $result['exception'] = 'Nombres incorrectos';
                        }
                    } else {
                        $result['exception'] = 'Usuario inexistente';
                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
                }
                break;
            case 'password':
                if ($cliente->setId($_SESSION['id_cliente'])) {
                    $_POST = $cliente->validateForm($_POST);
                    if ($_POST['clave_actual_1'] == $_POST['clave_actual_2']) {
                        if ($cliente->setClave($_POST['clave_actual_1'])) {
                            if ($cliente->checkPassword()) {
                                if ($_POST['clave_nueva_1'] == $_POST['clave_nueva_2']) {
                                    if ($cliente->setClave($_POST['clave_nueva_1'])) {
                                        if ($cliente->changePassword()) {
                                            $result['status'] = 1;
                                            $result['message'] = 'Contraseña cambiada correctamente';
                                        } else {
                                            $result['exception'] = 'Operación fallida';
                                        }
                                    } else {
                                        $result['exception'] = 'Clave nueva menor a 6 caracteres';
                                    }
                                } else {
                                    $result['exception'] = 'Claves nuevas diferentes';
                                }
                            } else {
                                $result['exception'] = 'Clave actual incorrecta';
                            }
                        } else {
                            $result['exception'] = 'Clave actual menor a 6 caracteres';
                        }
                    } else {
                        $result['exception'] = 'Claves actuales diferentes';
                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
                }
                break;
            case 'read':
                if ($result['dataset'] = $cliente->readClientes()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay Cliente registrados';
                }
                break;
            case 'search':
                $_POST = $cliente->validateForm($_POST);
                if ($_POST['search'] != '') {
                    if ($result['dataset'] = $usuario->searchCliente($_POST['search'])) {
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
                if ($cliente->setNombres($_POST['create_nombres'])) {
                    if ($cliente->setApellidos($_POST['create_apellidos'])) {
                        if ($cliente->setCorreo($_POST['create_correo'])) {
                                if ($_POST['create_clave1'] == $_POST['create_clave2']) {
                                    if ($cliente->setClave($_POST['create_clave1'])) {
                                        if ($cliente->createCliente()) {
                                            $result['status'] = 1;
                                            $result['message'] = 'Cliente creado correctamente';
                                        } else {
                                            $result['exception'] = 'Operación fallida';
                                        }
                                    } else {
                                        $result['exception'] = 'Clave menor a 6 caracteres';
                                    }
                                } else {
                                    $result['exception'] = 'Claves diferentes';
                                }
                        } else {
                            $result['exception'] = 'Correo incorrecto';
                        }
                    } else {
                        $result['exception'] = 'Apellidos incorrectos';
                    }
                } else {
                    $result['exception'] = 'Nombres incorrectos';
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
                        if ($cliente->setNombres($_POST['update_nombres'])) {
                            if ($cliente->setApellidos($_POST['update_apellidos'])) {
                                if ($cliente->setCorreo($_POST['update_correo'])) {
                                    if ($cliente->setAlias($_POST['update_alias'])) {
                                        if ($cliente->updateCliente()) {
                                            $result['status'] = 1;
                                            $result['message'] = 'Cliente modificado correctamente';
                                        } else {
                                            $result['exception'] = 'Operación fallida';
                                        }
                                    } else {
                                        $result['exception'] = 'Alias incorrecto';
                                    }
                                } else {
                                    $result['exception'] = 'Correo incorrecto';
                                }
                            } else {
                                $result['exception'] = 'Apellidos incorrectos';
                            }
                        } else {
                            $result['exception'] = 'Nombres incorrectos';
                        }
                    } else {
                        $result['exception'] = 'Cliente inexistente';
                    }
                } else {
                    $result['exception'] = 'Cliente incorrecto';
                }
                break;
            case 'delete':
                if ($_POST['identifier'] != $_SESSION['id_cliente']) {
                    if ($cliente->setId($_POST['identifier'])) {
                        if ($cliente->getCliente()) {
                            if ($cliente->deleteCliente()) {
                                $result['status'] = 1;
                                $result['message'] = 'Cliente eliminado correctamente';
                            } else {
                                $result['exception'] = 'Operación fallida';
                            }
                        } else {
                            $result['exception'] = 'Cliente inexistente';
                        }
                    } else {
                        $result['exception'] = 'Cliente incorrecto';
                    }
                } else {
                    $result['exception'] = 'No se puede eliminar a sí mismo';
                }
                break;
            default:
                exit('Acción no disponible log');
        }
    } else {
        switch ($_GET['action']) {
            case 'read':
                if ($cliente->readClientes()) {
                    
                } else {
                    $result['status'] = 2;
                    $result['exception'] = 'No existen cuentas registradas';
                }

               break;
            case 'register':
                $_POST = $cliente->validateForm($_POST);
                if ($cliente->setNombre($_POST['nombres'])) {
                    if ($cliente->setApellido($_POST['apellidos'])) {
                        if ($cliente->setCorreo($_POST['correo'])) {
                            if ($cliente->setDui($_POST['dui'])) {
                                if ($_POST['clave1'] == $_POST['clave2']) {
                                    if ($cliente->setClave($_POST['clave1'])) {
                                        if ($_POST['correo'] != $_POST['clave1']) {
                                            if ($cliente->createCliente()) {
                                                $result['status'] = 1;
                                                $result['message'] = 'Cliente registrado correctamente';
                                            } else {
                                                $result['exception'] = 'Operación fallida';
                                            }
                                        } else {
                                            $result['exception'] = 'El correo y la contraseña no pueden ser iguales';
                                        }
                                    } else {
                                        $result['exception'] = 'Clave menor a 6 caracteres';
                                    }
                                } else {
                                    $result['exception'] = 'Claves diferentes';
                                }
                            } else {
                                $result['exception'] = 'Alias incorrecto';
                            }
                        } else {
                            $result['exception'] = 'Correo incorrecto';
                        }
                    } else {
                        $result['exception'] = 'Apellidos incorrectos';
                    }
                } else {
                    $result['exception'] = 'Nombres incorrectos';
                }
                break;
            case 'login':
                $_POST = $cliente->validateForm($_POST);
                if ($cliente->setCorreo($_POST['correo'])) {
                    if ($cliente->checkCorreo()) {
                        if ($cliente->setClave($_POST['clave'])) {
                            if ($cliente->checkPassword()) {
                                $_SESSION['id_cliente'] = $cliente->getId();
                                $_SESSION['correo'] = $cliente->getCorreo();
                                $result['status'] = 1;
                                $result['message'] = 'Autenticación correcta';
                            } else {
                                $result['exception'] = 'Clave inexistente';
                            }
                        } else {
                            $result['exception'] = 'Clave menor a 6 caracteres';
                        }
                    } else {
                        $result['exception'] = 'Correo inexistente';
                    }
                } else {
                    $result['exception'] = 'Correo incorrecto';
                }
                break;
            default:
                exit('Acción no disponible');
        }
    }
	print(json_encode($result));
} else {
	exit('Recurso denegado');
}
?>