<?php 

include_once($_SERVER['DOCUMENT_ROOT'].'/DSS_LaCuponera/config.php');
require_once(MODEL_PATH.'classOferta.php');

// $codigoCupon = isset($_REQUEST['codigoCupon'])?$_REQUEST['codigoCupon']:'';
// if($codigoCupon != ""){
//     $oferta = new OfertasController();
// }

class OfertasController {
       
    private $cupones;

    public function __construct(){

        $this->cupones = new Oferta();
        $accion = isset($_REQUEST['accion'])?$_REQUEST['accion']:'';
       
        if($accion == ""){

            $this->verCupones();

        }else if($accion="verCupon"){
            //$this->verCupon($codigoCupon);
        }
    }
        
    public function verCupones(){
        $listar = $this->cupones->listarCupones();

        return $listar;
    }

    public function verCupon($codigoCupon){
        $listar = $this->cupones->listarCupon($codigoCupon);

        return $listar;
    }

}
?>