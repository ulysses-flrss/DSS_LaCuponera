<?php
    include_once($_SERVER['DOCUMENT_ROOT'].'/DSS_LaCuponera/public/config.php'); 
    include_once(PLUGIN_PATH);
    error_reporting(E_ALL ^ E_NOTICE);
    session_start();

    if(isset($_SESSION['usuario'])){
        $userActual = $_SESSION['usuario'];
        if ($userActual == null) {
            var_dump($_SESSION['usuario']);
            header("location:index.php");
        }
    } else {
        header("location:../index.php");
    }

    
    $accion = isset($_REQUEST['accion'])?$_REQUEST['accion']:'';
    $codCupon = isset($_REQUEST['codigoCupon'])?$_REQUEST['codigoCupon']:'';

    if ($accion=="verCupon") {
        include_once(CONTROLLER_PATH.'OfertasController.php');   
        $instancia = new OfertasController();    
        $instancia->codCupon = $codCupon;
        // var_dump($cupon->verCupon());
        require_once(VIEW_PATH."viewDetalles.php");
    }

    if ($accion == "logout") {
        include_once(CONTROLLER_PATH.'UsuarioController.php');
        $instancia = new UsuarioController();   
        // var_dump($cupon->verCupon());
        $instancia->logout();
    }
?>