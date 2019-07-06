<?php
class Categorias extends Validator
{
	// Declaración de propiedades
	private $id = null;
	private $meses = null;
	private $estado = null;

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

	public function setMeses($value)
	{
		if($this->validateAlphanumeric($value, 1, 50)) {
			$this->meses = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getNombre()
	{
		return $this->nombre;
	}

	public function setfoto($file, $name)
	{
		if ($this->validateImageFile($file, $this->ruta, $name, 500, 500)) {
			$this->foto = $this->getImageName();
			return true;
		} else {
			return false;
		}
	}

	public function getfoto()
	{
		return $this->foto;
	}

	public function getRuta()
	{
		return $this->ruta;
	}

	// Metodos para el manejo del SCRUD
	public function readCategoria()
	{
		$sql = 'SELECT id_categoria, nombre, foto FROM categoria ';
		$params = array(null);
		return Database::getRows($sql, $params);
	}

	public function searchCategoria($value)
	{
		$sql = 'SELECT * FROM categoria WHERE nombre LIKE ? OR id_categoria LIKE ? ORDER BY nombre';
		$params = array("%$value%", "%$value%");
		return Database::getRows($sql, $params);
	}

	public function createCategoria()
	{
		$sql = 'INSERT INTO categoria(nombre,foto) VALUES(?, ?)';
		$params = array($this->nombre, $this->foto,);
		return Database::executeRow($sql, $params);
	}

	public function getCategoria()
	{
		$sql = 'SELECT id_categoria, nombre,foto FROM categoria WHERE id_categoria = ?';
		$params = array($this->id);
		return Database::getRow($sql, $params);
	}

	public function updateCategoria()
	{
		$sql = 'UPDATE categoria SET nombre = ?, foto = ? WHERE id_categoria = ?';
		$params = array($this->nombre, $this->foto,  $this->id);
		return Database::executeRow($sql, $params);
	}

	public function deleteCategoria()
	{
		$sql = 'DELETE FROM categoria WHERE id_categoria = ?';
		$params = array($this->id);
		return Database::executeRow($sql, $params);
	}
}
?>
