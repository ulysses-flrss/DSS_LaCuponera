<?php 

include_once($_SERVER['DOCUMENT_ROOT'].'/DSS_LaCuponera/config.php');
require_once(MODEL_PATH.'classOferta.php');


if(isset($_REQUEST['codigoCupon'])){
    $codigoCupon = isset($_REQUEST['codigoCupon'])?$_REQUEST['codigoCupon']:'';
} else {
    $codigoCupon = "";
}


class OfertasController {
       
    private $cupones;
    public $codCupon;

    public function __construct(){
        $this->codCupon = "";
        $this->cupones = new Oferta();
        $accion = isset($_REQUEST['accion'])?$_REQUEST['accion']:'';
        if($accion == ""){
            $this->verCupones();

        }else if($accion="verCupon"){
            $this->verCupon();
            
        }
    }
        
    public function verCupones(){
        $listar = $this->cupones->listarCupones();

        return $listar;
    }

    public function verCupon(){
        $listar = $this->cupones->listarCupon($this->codCupon);
        
        return $listar;
    }

}
?>