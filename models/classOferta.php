<?php
class Oferta {
// Atributos
    private $cod_oferta;
    private $titulo;
    private $precio_regular;
    private $precio_oferta;
    private $inicio_oferta;
    private $fin_oferta;
    private $fechaLimite_cupon;
    private $cantidadLimite_cupon;
    private $decripcion;
    private $estado;
    private $cod_empresa;
    
// Getters y Setters
	public function getCodOferta() 
    {
		return $this->cod_oferta;
	}

	public function setCodOferta($cod_oferta)
	{
		$this->cod_oferta = $cod_oferta;
		return $this;
	}

	public function getTitulo() 
    {
		return $this->titulo;
	}

	public function setTitulo($titulo)
	{
		$this->titulo = $titulo;
		return $this;
	}

	public function getPrecioRegular() 
    {
		return $this->precio_regular;
	}

	public function setPrecioRegular($precio_regular)
	{
		$this->precio_regular = $precio_regular;
		return $this;
	}

	public function getPrecioOferta() 
    {
		return $this->precio_oferta;
	}

	public function setPrecioOferta($precio_oferta)
	{
		$this->precio_oferta = $precio_oferta;
		return $this;
	}

	public function getInicioOferta() 
    {
		return $this->inicio_oferta;
	}

	public function setInicioOferta($inicio_oferta)
	{
		$this->inicio_oferta = $inicio_oferta;
		return $this;
	}

	public function getFinOferta() 
    {
		return $this->fin_oferta;
	}

	public function setFinOferta($fin_oferta)
	{
		$this->fin_oferta = $fin_oferta;
		return $this;
	}

	public function getFechaLimiteCupon() 
    {
		return $this->fechaLimite_cupon;
	}

	public function setFechaLimiteCupon($fechaLimite_cupon)
	{
		$this->fechaLimite_cupon = $fechaLimite_cupon;
		return $this;
	}

	public function getCantidadLimiteCupon() 
    {
		return $this->cantidadLimite_cupon;
	}

	public function setCantidadLimiteCupon($cantidadLimite_cupon)
	{
		$this->cantidadLimite_cupon = $cantidadLimite_cupon;
		return $this;
	}

	public function getDecripcion() 
    {
		return $this->decripcion;
	}

	public function setDecripcion($decripcion)
	{
		$this->decripcion = $decripcion;
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

	public function getCodEmpresa() 
    {
		return $this->cod_empresa;
	}

	public function setCodEmpresa($cod_empresa)
	{
		$this->cod_empresa = $cod_empresa;
		return $this;
	}

// Metodos

    
}

?>