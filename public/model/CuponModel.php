<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/DSS_LaCuponera/public/config.php');
require_once(MODEL_PATH.'ConexionModel.php');

class Cupon {
// Atributos
    private $cod_cupon;
    private $cod_oferta;
    private $cod_usuario;
    private $estado;
	private $cant;

    
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

	public function getCantidad(){
		return $this->cant;
	}

	public function setCantidad($cant){
		$this->cant = $cant;
		return $this;
	}



// Metodos
	public function registrarCompra($codCupon, $codOferta, $codUsuario, $estado){
		$sql = "INSERT INTO cupon (cod_cupon, cod_oferta, cod_usuario, estado) VALUES (:codCupon, :codOfer, :codUsu, :estado)";
		$conn = new Conexion();
		$dbh = $conn->getConexion();
		try{
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':codCupon', $codCupon);
			$stmt->bindParam(':codOfer', $codOferta);
			$stmt->bindParam(':codUsu', $codUsuario);
			$stmt->bindParam(':estado', $estado);
			if($stmt->execute()){
				return "OK";
			}else{
				return "Error al ingresar datos";
			}
		}catch (Exception $e) {
			return "Error: " . $e->getMessage();
			//return var_dump($usuario);
		}
	}

	public function obtenerOfertas(){
		$sql = "SELECT * FROM oferta";
		$conn = new Conexion();
		$dbh = $conn->getConexion();
		try{
			$stmt = $dbh->prepare($sql);
			if($stmt->execute()){
				$ofertas = $stmt->fetchAll(PDO::FETCH_ASSOC);
				return $ofertas;
			}else{
				return "Error";
			}
		}catch (Exception $e) {
			return "Error: " . $e->getMessage();
			//return var_dump($usuario);
		}
	}

	public function valNumCupon($codOferta){
		$sql = "SELECT * FROM oferta WHERE cod_oferta = :codOfer";
		$conn = new Conexion();
		$dbh = $conn->getConexion();
		try{
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':codOfer', $codOferta);
			if($stmt->execute()){
				$cant = $stmt->fetchAll(PDO::FETCH_ASSOC);
				return $cant;
			}else{
				return "Error";
			}
		}catch(Exception $e) {
			return "Error: " . $e->getMessage();
			//return var_dump($usuario);
		}
	}
}
	//






?>


