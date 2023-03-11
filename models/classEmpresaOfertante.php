<?php
class EmpresaOfertante {
//Atributos
    private $cod_empresa;
    private $nombre;
    private $direccion;
    private $telefono;
    private $correo;
    private $comision;
    private $cod_rubro;
    
// Getters y Setters
	public function getCodEmpresa()
	{
		return $this->cod_empresa;
	}

	public function setCodEmpresa($cod_empresa)
	{
		$this->cod_empresa = $cod_empresa;

		return $this;
	}

	public function getNombre()
	{
		return $this->nombre;
	}

	public function setNombre($nombre)
	{
		$this->nombre = $nombre;

		return $this;
	}

	public function getDireccion()
	{
		return $this->direccion;
	}

	public function setDireccion($direccion)
	{
		$this->direccion = $direccion;

		return $this;
	}

	public function getTelefono()
	{
		return $this->telefono;
	}

	public function setTelefono($telefono)
	{
		$this->telefono = $telefono;

		return $this;
	}

	public function getCorreo()
	{
		return $this->correo;
	}

	public function setCorreo($correo)
	{
		$this->correo = $correo;

		return $this;
	}

	public function getComision()
	{
		return $this->comision;
	}

	public function setComision($comision)
	{
		$this->comision = $comision;

		return $this;
	}

	public function getCodRubro()
	{
		return $this->cod_rubro;
	}

	public function setCodRubro($cod_rubro)
	{
		$this->cod_rubro = $cod_rubro;

		return $this;
	}

// Metodos

}
?>