<?php
class Cupon {
// Atributos
    private $cod_cupon;
    private $cod_oferta;
    private $cod_usuario;
    private $estado;
    
// Getters y Setters
	public function getCodCupon() 
    {
		return $this->cod_cupon;
	}

	public function setCodCupon($cod_cupon)
	{
		$this->cod_cupon = $cod_cupon;
		return $this;
	}

	public function getCodOferta() 
    {
		return $this->cod_oferta;
	}

	public function setCodOferta($cod_oferta)
	{
		$this->cod_oferta = $cod_oferta;
		return $this;
	}

	public function getCodUsuario() 
    {
		return $this->cod_usuario;
	}

	public function setCodUsuario($cod_usuario)
	{
		$this->cod_usuario = $cod_usuario;
		return $this;
	}

	public function getEstado() 
    {
		return $this->estado;
	}

	public function setEstado($estado)
	{
		$this->estado = $estado;
		return $this;
	}
}



?>


