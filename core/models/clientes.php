<?php
class Clientes extends Validator
{
	// Declaración de propiedades
	private $id = null;
	private $nombre = null;
	private $apellido = null;
	private $Dui = null;
	private $Correo = null;
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

	public function setNombre($value)
	{
		if($this->validateAlphanumeric($value, 1, 50)) {
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

	public function setApellido($value)
	{
		if($this->validateAlphanumeric($value, 1, 50)) {
			$this->apellido = $value;
			return true;
		} else {
			return false;
		}
	}
	public function getApellido()
	{
		return $this->apellido;
	}

	public function setDui($value)
	{
		if($this->ValidateAlphanumeric($value, 1, 50)) {
			$this->Dui = $value;
			return true;
		} else {
			return false;
		}
	}
	public function getDui()
	{
		return $this->Dui;
	}

	public function setCorreo($value)
	{
		if($this->validateEmail($value, 1, 50)) {
			$this->correo = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getCorreo()
	{
		return $this->correo;
	}
	// Metodos para el manejo del SCRUD
	public function readClientes()
	{
		$sql = 'SELECT id_cliente, nombre,apellido,Dui,correo FROM cliente ';
		$params = array(null);
		return Database::getRows($sql, $params);
	}

	public function searchCliente($value)
	{
		$sql = 'SELECT * FROM cliente WHERE nombre LIKE ? OR id_cliente LIKE ? ORDER BY nombre';
		$params = array("%$value%", "%$value%");
		return Database::getRows($sql, $params);
	}

	public function createCliente()
	{
		$sql = 'INSERT INTO cliente(nombre,apellido,Dui,correo) VALUES(?, ?, ?, ?)';
		$params = array($this->nombre, $this->apellido,$this->Dui,$this->correo);
		return Database::executeRow($sql, $params);
	}

	public function getCliente()
	{
		$sql = 'SELECT id_cliente, nombre,apellido,Dui,correo FROM cliente WHERE id_cliente = ?';
		$params = array($this->id);
		return Database::getRow($sql, $params);
	}

	public function updateCliente()
	{
		$sql = 'UPDATE cliente SET nombre = ?, apellido = ?, Dui = ?, correo = ? WHERE id_cliente = ?';
		$params = array($this->nombre, $this->apellido, $this->Dui, $this->correo,  $this->id);
		return Database::executeRow($sql, $params);
	}

	public function deleteCliente()
	{
		$sql = 'DELETE FROM cliente WHERE id_cliente = ?';
		$params = array($this->id);
		return Database::executeRow($sql, $params);
	}
}
?>
