<?php 
session_start();
include_once($_SERVER['DOCUMENT_ROOT'].'/DSS_LaCuponera/public/config.php');
require_once(MODEL_PATH.'OfertaModel.php');

$accion = isset($_REQUEST['accion_oferta'])?$_REQUEST['accion_oferta']:'';
$codCupon = isset($_REQUEST['codigoCupon'])?$_REQUEST['codigoCupon']:'';

switch ($accion) {
    case '':
        $oferta = new Oferta;
        $ofertas = $oferta->listarCupones();
        return $ofertas;
        break;
    
    case 'verCupon':
        $oferta = new Oferta;
        $oferta_selected = $oferta->listarCupon($codCupon);
        require_once(VIEW_PATH.'viewDetalles.php');
        break;
        
    case 'regresar':
        $oferta = new Oferta;
        $ofertas = $oferta->listarCupones();
        header('location: ');
        break;


    default:
        return "HOLA";
        break;
}

?>