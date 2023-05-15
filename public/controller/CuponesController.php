<?php

use UsuarioController as GlobalUsuarioController;

use function PHPSTORM_META\map;

include_once($_SERVER['DOCUMENT_ROOT'] . '/DSS_LaCuponera/public/config.php');
include_once('../model/CuponModel.php');
require_once(MODEL_PATH . 'validaciones.php');

$accion = isset($_REQUEST['accion'])?$_REQUEST['accion']:'';

switch($accion){
    case 'Comprar':
        registrarCompra();
    break;
}

function mostrarDatosTabla() {
    $modelo = new Cupon();
    $datos = $modelo->obtenerOfertas();
    return $datos;
}


function registrarCompra(){
    require_once(MODEL_PATH . 'CuponModel.php');
    require_once(MODEL_PATH . 'validaciones.php');
    $errores = null;
    $num_errores = 0;
    $CodCupones = array();
    $cupones = new Cupon();
    $codUsu = isset($_POST['Usu']) ? $_POST['Usu'] : '';
    $codOferta = isset($_POST['ofertas']) ? $_POST['ofertas'] : '';
    $estado = 'Verificado';
    $cantidad = isset($_POST['cantidad']) ? $_POST['cantidad'] : '';
    $tarjeta = isset($_POST['tarjeta']) ? $_POST['tarjeta'] : '';
    $fechaExpe = isset($_POST['expiracion']) ? $_POST['expiracion'] : '';
    $cvv = isset($_POST['cvv']) ? $_POST['cvv'] : '';
    $valtar = Validacion::isNumTarjeta($tarjeta);
    $valExpi = Validacion::isFechaExpi($fechaExpe);
    $valCvv = Validacion::isCVV($cvv);
    $CantCupon = $cupones->valNumCupon($codOferta);
    $cantLimit = $CantCupon[0]['cantidadLimite_cupon'];
    $nombreEmpre = $CantCupon[0]['cod_empresa'];
    

    if($cantidad == "" || $codOferta == "" || $tarjeta == "" || $fechaExpe == "" || $cvv == ""){
        $num_errores++;
        $errores.= "<p>No pueden haber campos vacios</p>";
    }

    if($cantidad>$cantLimit){
        $errores .= "La cantidad de cupones es mayor a la cantidad de cupones disponibles";
    }
    
    // if ($tarjeta != "" || $valtar == "OK") {
    //     return "OK";

    // }else{
    //     $num_errores++;
    //     $errores .= "<p>$valtar</p>";
    // }

    if ($tarjeta == "" || $valExpi != "OK") {
        $num_errores++;
        $errores .= "<p>$valExpi</p>";
    }

    if ($tarjeta == "" || $valCvv != "OK") {
        $num_errores++;
        $errores .= "<p>$valCvv</p>";
    }

         // Paso 2a: Generar un número aleatorio de 7 dígitos
         $numero_aleatorio = rand(1000000, 9999999);
        
         // Paso 2b: Concatenar el código de la empresa ofertante y el número aleatorio
         $codigo_cupon = $nombreEmpre . $numero_aleatorio;

         $ingreso = $cupones->registrarCompra($codigo_cupon, $codOferta, $codUsu, $estado);


    // if ($num_errores > 0) {
    //     require_once(VIEW_PATH.'viewCompraCupon.php');
    //     return $errores;
    // }

    


    if ($ingreso == "OK") {
    //    Redireccion a Pagina Index
        header("location: ../view/viewCompraCupon.php");
    }
}
?>