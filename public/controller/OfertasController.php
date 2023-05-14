<?php 
// Inicia datos de sesion
session_start();

// Incluyendo archivo que facilita rutas
include_once($_SERVER['DOCUMENT_ROOT'].'/DSS_LaCuponera/public/config.php');

// Incluyendo Modelo de Oferta
require_once(MODEL_PATH.'OfertaModel.php');

// Obteniendo la accion que va realizar el usuario
$accion = isset($_REQUEST['accion_oferta'])?$_REQUEST['accion_oferta']:'';

// Obteniendo codigo del cupon si existe
$codCupon = isset($_REQUEST['codigoCupon'])?$_REQUEST['codigoCupon']:'';
$termino = isset($_REQUEST['termino'])?$_REQUEST['termino']:'';

switch ($accion) {
    case '': // Caso cuando se acaba de loguear o entra a la pagina de ofertas
        $oferta = new Oferta; // Nueva instancia de Oferta
        $ofertas = $oferta->listarCupones(); // Ejecutando el metodo del Modelo que lista TODOS los cupones
        return $ofertas; // Retornando el valor
        break;
    
    case 'verCupon': // Caso cuando da click en "Ver Detalles" de algún cupón
        $oferta = new Oferta; // Nueva instancia de Oferta
        $oferta_selected = $oferta->listarCupon($codCupon); // Ejecutando el metodo del Modelo que lista UN cupon
        require_once(VIEW_PATH.'viewDetalles.php'); // Mostrando los detalles de ese cupon
        break;
        
    case 'regresar': // Caso cuando (desde viewDetalles) da click en "Regresar"
        $oferta = new Oferta; // Nueva instancia de Oferta
        $ofertas = $oferta->listarCupones(); // Ejecutando metodo que lista TODO cupones
        require_once(VIEW_PATH. 'viewOfertas.php'); // Mostrando la vista de ofertas
        break;

    case 'buscar':
        $oferta = new Oferta;
        $ofertas = $oferta->buscarCupones($termino);
        require_once(VIEW_PATH. 'viewOfertas.php');
        break;


    default:
        return "HOLA";
        break;
}

?>