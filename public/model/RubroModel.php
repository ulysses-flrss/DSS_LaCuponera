<?php
class Rubro {
// Atributos
    private $cod_rubro;
    private $rubro;

// Getters y Setters
	public function getCodRubro()
	{
		return $this->cod_rubro;
	}

	public function setCodRubro($cod_rubro)
	{
		$this->cod_rubro = $cod_rubro;
		return $this;
	}

	public function getRubro()
	{
		return $this->rubro;
	}

	public function setRubro($rubro)
	{
		$this->rubro = $rubro;
		return $this;
	}

// Metodos
}