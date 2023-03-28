<?php 

include_once($_SERVER['DOCUMENT_ROOT'].'/DSS_LaCuponera/config.php');
require_once(MODEL_PATH.'classOferta.php');

class OfertasController {
       
    private $cupones;

    public function __construct(){

        $this->cupones = new Oferta();
        $accion = isset($_REQUEST['accion'])?$_REQUEST['accion']:'';
        /*$compra = isset($_REQUEST['compra'])?$_REQUEST['compra']:'';*/

        if($accion == ""){

            $this->verCupones();

        }
    }
        
    public function verCupones(){
        $listar = $this->cupones->listarCupones();

        return $listar;
    }

}
?>