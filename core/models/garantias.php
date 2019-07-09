<?php
class Garantias extends Validator
{
	// Declaración de propiedades
	private $id = null;
	private $meses = null;
	private $idestado = null;

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

	public function getMeses()
	{
		return $this->meses;
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


	// Metodos para el manejo del SCRUD
	public function listGarantia()
	{
	 $sql= 'SELECT garantia.id_garantia,garantia.meses, garantia.estado, estados.id_estado, estados.estado FROM( garantia INNER JOIN estados on estados.id_estado=garantia.estado)';
	 $params = array(null);
	 return Database::getRows($sql, $params);
	}
	public function readGarantia()
	{
		$sql = 'SELECT id_garantia, meses,estado  FROM garantia ';
		$params = array(null);
		return Database::getRows($sql, $params);
	}

	public function searchGarantia($value)
	{
		$sql = 'SELECT * FROM garantia WHERE meses LIKE ? OR id_garantia LIKE ? ORDER BY meses';
		$params = array("%$value%", "%$value%");
		return Database::getRows($sql, $params);
	}

	public function createGarantia()
	{
		$sql = 'INSERT INTO garantia (meses,estado) VALUES(?, ?)';
		$params = array($this->meses, $this->idestado,);
		return Database::executeRow($sql, $params);
	}

	public function getGarantia()
	{
		$sql = 'SELECT id_garantia, meses,estado FROM garantia WHERE id_garantia = ?';
		$params = array($this->id);
		return Database::getRow($sql, $params);
	}

	public function updateGarantia()
	{
		$sql = 'UPDATE garantia SET meses = ?, estado = ? WHERE id_garantia = ?';
		$params = array($this->meses, $this->idestado,  $this->id);
		return Database::executeRow($sql, $params);
	}

	public function deleteGarantia()
	{
		$sql = 'DELETE FROM garantia WHERE id_garantia = ?';
		$params = array($this->id);
		return Database::executeRow($sql, $params);
	}

	public function grafico3()
	{
		$sql = 'SELECT id_garantia, meses FROM garantia';
		$params = array(null);
		return Database::getRows($sql, $params);
	}
}
?>
