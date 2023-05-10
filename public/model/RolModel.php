<?php
class Rol {
// Atributos
    private $cod_rol;
    private $rol;

// Getters y Setters
	public function getCodRol()
	{
		return $this->cod_rol;
	}

	public function setCodRol($cod_rol)
	{
		$this->cod_rol = $cod_rol;

		return $this;
	}

	public function getRol()
	{
		return $this->rol;
	}

	public function setRol($rol)
	{
		$this->rol = $rol;

		return $this;
	}
}

?>