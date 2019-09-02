<?php
class Clientes extends Validator
{
	// Declaración de propiedades
	private $id = null;
	private $nombre = null;
	private $apellido = null;
	private $Dui = null;
	private $Correo = null;
	private $clave = null;
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

	public function setClave($value)
    {
        if ($this->validatePassword($value)) {
            $this->clave = $value;
            return true;
        } else {
            return false;
        }
    }

    public function getClave()
    {
        return $this->clave;
    }
	/*
	public function getClave()
	{
		return $this->Clave;
	}

	public function setClave($value)
	{
		if($this->ValidateAlphanumeric($value, 1, 50)) {
			$this->Dui = $value;
			return true;
		} else {
			return false;
		}
	}*/

	public function setCorreo($value)
	{
		if($this->validateEmail($value)) {
			$this->Correo = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getCorreo()
	{
		return $this->Correo;
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
		$sql = 'SELECT * FROM cliente WHERE nombre LIKE ? OR id_cliente LIKE ? OR Dui LIKE ? OR apellido LIKE ? ORDER BY nombre';
		$params = array("%$value%", "%$value%", "%$value%", "%$value%");
		return Database::getRows($sql, $params);
	}

	public function createCliente()
	{
		$hash = password_hash($this->clave, PASSWORD_DEFAULT);
		$sql = 'INSERT INTO cliente(nombre,apellido,Dui,correo, clave) VALUES(?, ?, ?, ?, ?)';
		$params = array($this->nombre, $this->apellido,$this->Dui,$this->Correo, $hash);
		return Database::executeRow($sql, $params);
	}

	public function getCliente()
	{
		$sql = 'SELECT id_cliente, nombre,apellido,correo FROM cliente WHERE id_cliente = ?';
		$params = array($this->id);
		return Database::getRow($sql, $params);
	}

	public function updateCliente()
	{
		$sql = 'UPDATE cliente SET nombre = ?, apellido = ?, correo = ? WHERE id_cliente = ?';
		$params = array($this->nombre, $this->apellido,  $this->Correo,  $this->id);
		return Database::executeRow($sql, $params);
	}

	public function deleteCliente()
	{
		$sql = 'DELETE FROM cliente WHERE id_cliente = ?';
		$params = array($this->id);
		return Database::executeRow($sql, $params);
	}

	public function changePassword()
	{
		$hash = password_hash($this->clave, PASSWORD_DEFAULT);
		$sql = 'UPDATE cliente SET clave = ? WHERE id_cliente = ?';
		$params = array($hash, $this->id);
		return Database::executeRow($sql, $params);
	}

	public function checkCorreo()
	{
		$sql = 'SELECT id_cliente FROM cliente WHERE correo = ?';
		$params = array($this->Correo);
		$data = Database::getRow($sql, $params);
		if ($data) {
			$this->id = $data['id_cliente'];
			return true;
		} else {
			return false;
		}
	}

	public function checkPassword()
	{
		$sql = 'SELECT clave FROM cliente WHERE id_cliente = ?';
		$params = array($this->id);
		$data = Database::getRow($sql, $params);
		if (password_verify($this->clave, $data['clave'])) {
			return true;
		} else {
			return false;
		}
	}
}
?>
