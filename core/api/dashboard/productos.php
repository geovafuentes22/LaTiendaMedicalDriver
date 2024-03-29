<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/productos.php');

// Se comprueba si existe una acción a realizar, de lo contrario se muestra un mensaje de error
if (isset($_GET['action'])) {
    session_start();
    $producto = new Productos;
    $result = array('status' => 0, 'message' => null, 'exception' => null,'session' => 1);
    // Se verifica si existe una sesión iniciada como administrador para realizar las operaciones correspondientes
	if (isset($_SESSION['id_usuario'])) {
        require_once('sesioncaducada.php');
        switch ($_GET['action']) {
            case 'read':
                if ($result['dataset'] = $producto->listProducto()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay productos registrados';
                }
                break;
            case 'search':
                $_POST = $producto->validateForm($_POST);
                if ($_POST['search'] != '') {
                    if ($result['dataset'] = $producto->searchProductos($_POST['search'])) {
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
                $_POST = $producto->validateForm($_POST);
                if ($producto->setNombre($_POST['create_nombre'])) {
                    if ($producto->setCodigo($_POST['create_codigo'])) {
                        if ($producto->setPrecio($_POST['create_precio'])) {
                            if ($producto->setCantidad($_POST['create_cantidad'])) {
                                 if ($producto->setDescripcion($_POST['create_descripcion'])) {
                                     if ($producto->setidgarantia($_POST['create_garantia'])) {
                                        if ($producto->setidcategoria($_POST['create_categoria'])) {
                                            if ($producto->setidestado(isset($_POST['create_estado']) ? 1 : 0)) {
                                                if (is_uploaded_file($_FILES['create_archivo']['tmp_name'])) {
                                                    if ($producto->setfoto($_FILES['create_archivo'], null)) {
                                                        if ($producto->createProducto()) {
                                                        $result['status'] = 1;
                                                        if ($producto->saveFile($_FILES['create_archivo'], $producto->getRuta(), $producto->getfoto())) {
                                                        $result['message'] = 'Producto creado correctamente';
                                                    } else {
                                                        $result['message'] = 'Producto creado. No se guardó el archivo';
                                                    }
                                                } else {
                                                    $result['exception'] = 'Operación fallida';
                                                }
                                            } else {
                                                $result['exception'] = $producto->getImageError();
                                            }
                                        } else {
                                            $result['exception'] = 'Seleccione una imagen';
                                        }
                                    } else {
                                        $result['exception'] = 'Estado incorrecto';
                                    }
                                }else{
                                    $result['exception'] = 'Categoria incorrecta sexooooo';
                                }
                            }else{                             
                                        $result['exception'] = 'Garantía incorrecta';
                                }
                        }else{
                                    $result['exception'] = 'Ingrese una descripcion';
                                }  
                      }else {
                                $result['exception'] = 'Ingrese una cantidad';
                            }
                 }else {
                            $result['exception'] = 'Precio incorrecto';
                        }
             }else {
                        $result['exception'] = 'Codigo Incorrecto';
                   }
         }else {
                    $result['exception'] = 'Nombre incorrecto';
                }
                break;
            case 'get':
                if ($producto->setId($_POST['id_producto'])) {
                    if ($result['dataset'] = $producto->getProducto()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Producto inexistente';
                    }
                } else {
                    $result['exception'] = 'Producto incorrecto';
                }
                break;
            case 'update':
                $_POST = $producto->validateForm($_POST);
                if ($producto->setId($_POST['id_producto'])) {
                    if ($producto->getProducto()) {
                        if ($producto->setNombre($_POST['update_nombre'])) {
                            if($producto->setCodigo($_POST['update_codigo'])){
                                if ($producto->setPrecio($_POST['update_precio'])) {
                                    if ($producto->setCantidad($_POST['update_cantidad'])) {
                                        if ($producto->setDescripcion($_POST['update_descripcion'])) {
                                            if ($producto->setidgarantia($_POST['update_garantia'])) {
                                                if ($producto->setidcategoria($_POST['update_categoria'])) {
                                                    if ($producto->setidestado(isset($_POST['update_estado']) ? 1 : 0)) {
                                                        if (is_uploaded_file($_FILES['update_archivo']['tmp_name'])) {
                                                            if ($producto->setfoto($_FILES['update_archivo'], $_POST['imagen_producto'])) {
                                                            $archivo = true;
                                                } else {
                                                    $result['exception'] = $producto->getImageError();
                                                    $archivo = false;
                                                }
                                            } else {
                                                if (!$producto->setfoto(null, $_POST['imagen_producto'])) {
                                                    $result['exception'] = $producto->getImageError();
                                                }
                                                $archivo = false;
                                            }
                                            if ($producto->updateProducto()) {
                                                $result['status'] = 1;
                                                if ($archivo) {
                                                    if ($producto->saveFile($_FILES['update_archivo'], $producto->getRuta(), $producto->getfoto())) {
                                                        $result['message'] = 'Producto modificado correctamente';
                                                    } else {
                                                        $result['message'] = 'Producto modificado. No se guardó el archivo';
                                                    }
                                                } else {
                                                    $result['message'] = 'Producto modificado. No se subió ningún archivo';
                                                }
                                            } else {
                                                $result['exception'] = 'Operación fallida';
                                            }
                                        } else {
                                            $result['exception'] = 'Estado incorrecto';
                                        }
                                    } else {
                                        $result['exception'] = 'Seleccione una categoría';
                                    }
                                }else{
                                    $result['exception'] = 'Seleccione una garantia';
                                }
                                }else {
                                    $result['exception'] = 'Descripción incorrecta';
                                } 
                            }else{
                                $result['exception'] = 'Cantidad incorrecta';
                            }
                            } else {
                                $result['exception'] = 'Precio incorrecto';
                            }
                        }else{
                            $result['exception'] = 'Codigo incorrecto';
                        }
                        } else {
                            $result['exception'] = 'Nombre incorrecto';
                        }
                    } else {
                        $result['exception'] = 'Producto inexistente';
                    }
                } else {
                    $result['exception'] = 'Producto incorrecto';
                }
                break;
            case 'delete':
                if ($producto->setId($_POST['identifier'])) {
                    if ($producto->getProducto()) {
                        if ($producto->deleteProducto()) {
                            $result['status'] = 1;
                            if ($producto->deleteFile($producto->getRuta(), $_POST['filename'])) {
                                $result['message'] = 'Producto eliminado correctamente';
                            } else {
                                $result['message'] = 'Producto eliminado. No se borró el archivo';
                            }
                        } else {
                            $result['exception'] = 'Operación fallida';
                        }
                    } else {
                        $result['exception'] = 'Producto inexistente';
                    }
                } else {
                    $result['exception'] = 'Producto incorrecto';
                }
                break;
                case 'cantidadP':
                    if($result['dataset'] = $producto->grafico1()){
                        $result['status'] = 1;
                    }else{
                        $result['exception'] = 'No se encontraron datos';
                    }
                break;
                
                case 'precioP':
                if($result['dataset'] = $producto->grafico2()){
                    $result['status'] = 1;
                }else{
                    $result['exception'] = 'No se encontraron datos';
                }
            break;

            case 'EstadoP':
            if($result['dataset'] = $producto->graficoEstado()){
                $result['status'] = 1;
            }else{
                $result['exception'] = 'No se encontraron datos';
            }
        break;

        case 'MayorP':
        if($result['dataset'] = $producto->graficoMayor()){
            $result['status'] = 1;
        }else{
            $result['exception'] = 'No se encontraron datos';
        }
    break; 
        default:
        }
        print(json_encode($result));} else {
        exit('Acceso no disponible');
    }
} else {
	exit('Recurso denegado');
}
?>