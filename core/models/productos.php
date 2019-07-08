<?php
class Productos extends Validator
{
	// Declaración de propiedades
	private $id = null;
	private $nombre = null;
 	private $codigo = null;
 	private $precio = null;
	private $cantidad = null;
	private $descripcion = null;
	private $idgarantia = null;
	private $idcategoria = null;	 	
	private $idestado = null;
	private $foto = null;
	private $ruta = '../../../resources/img/productos/';

	// Métodos para sobrecarga de propiedades
	public function setId($value)
	{
		if ($this->validateId($value)) {
			$this->id = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getId()
	{
		return $this->id;
	}

	public function setnombre($value)
	{
		if ($this->validateAlphanumeric($value, 1, 50)) {
			$this->nombre = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getNombre()
	{
		return $this->nombre;
	}

	public function setcodigo($value)
	{
		if ($this->validateAlphanumeric($value, 1, 10)) {
			$this->codigo = $value;
			return true;
		} else {
			return false;
		}
	}

	public function gecodigo()
	{
		return $this->descripcion;
	}

	public function setPrecio($value)
	{
		if ($this->validateMoney($value)) {
			$this->precio = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getPrecio()
	{
		return $this->precio;
	}

	public function setcantidad($value)
	{
		if ($this->validateAlphanumeric($value, 1, 100)) {
			$this->cantidad = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getcantidad()
	{
		return $this->cantidad;
	}

	public function setdescripcion($value)
	{
		if ($this->validateAlphanumeric($value, 1, 50)) {
			$this->descripcion = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getdescripcion()
	{
		return $this->descripcion;
	}

	public function setidgarantia($value)
	{
		if ($this->validateId($value)) {
			$this->idgarantia = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getidgarantia()
	{
		return $this->idgarantia;
	}

	public function setidcategoria($value)
	{
		if ($this->validateId($value)) {
			$this->idcategoria = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getidcategoria()
	{
		return $this->idcategoria;
	}
		
	public function setidestado($value)
	{
		if ($value == '1' || $value == '0') {
			$this->idestado = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getidestado()
	{
		return $this->idestado;
	}

	public function setFoto($file, $name)
	{
		if ($this->validateImageFile($file, $this->ruta, $name, 500, 500)) {
			$this->foto = $this->getImageName();
			return true;
		} else {
			return false;
		}
	}

	public function getFoto()
	{
		return $this->foto;
	}
	public function getRuta()
	{
		return $this->ruta;
	}

	//Metodos para el manejo del SCRUD

	public function readProductos()
	{
		$sql = 'SELECT id_producto, nombre, codigo, precio, cantidad, descripcion, id_garantia,id_categoria,id_estado,foto FROM producto  ORDER BY nombre';
		$params = array(null);
		return Database::getRows($sql, $params);
	}

	public function searchProductos($value)
	{
		$sql = 'SELECT id_producto, nombre,  codigo, precio, cantidad, descripcion, id_garantia,id_categoria,foto FROM producto INNER JOIN categorias USING(id_categoria) WHERE nombre_producto LIKE ? OR descripcion_producto LIKE ? ORDER BY nombre_producto';
		$params = array("%$value%", "%$value%");
		return Database::getRows($sql, $params);
	}

	public function createProducto()
	{
		$sql = 'INSERT INTO producto(nombre,  codigo, precio, cantidad, descripcion, id_garantia,id_categoria,id_estado,foto) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$params = array($this->nombre, $this->codigo, $this->precio, $this->cantidad, $this->descripcion, $this->idgarantia, $this->idcategoria, $this->idestado, $this->foto);
		return Database::executeRow($sql, $params);
	}

	public function getProducto()
	{
		$sql = 'SELECT id_producto, nombre, codigo, precio, cantidad, descripcion, id_garantia,id_categoria,id_estado,foto FROM producto WHERE id_producto = ?';
		$params = array($this->id);
		return Database::getRow($sql, $params);
	}

	public function updateProducto()
	{
		$sql = 'UPDATE producto SET nombre = ?, codigo = ?, precio = ?, cantidad = ?, descripcion = ?, id_garantia = ?, id_categoria = ?, id_estado = ?,foto = ? WHERE id_producto = ?';
		$params = array($this->nombre, $this->codigo, $this->precio, $this->cantidad, $this->descripcion, $this->idgarantia, $this->idcategoria, $this->idestado, $this->foto, $this->id);
		return Database::executeRow($sql, $params);
	}

	public function deleteProducto()
	{
		$sql = 'DELETE FROM producto WHERE id_producto = ?';
		$params = array($this->id);
		return Database::executeRow($sql, $params);
	}
}
?>
