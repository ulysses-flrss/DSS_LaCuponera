<?php     
    error_reporting(E_ALL ^ E_NOTICE);
    session_start();
    include_once($_SERVER['DOCUMENT_ROOT'].'/DSS_LaCuponera/public/config.php');
    include_once(CONTROLLER_PATH."UsuarioController.php");

    if(isset($_SESSION['usuario'])){
        $userActual = $_SESSION['usuario'];
        if ($userActual == null) {
            var_dump($_SESSION['usuario']);
            header("location:index.php");
        }
    } else {
        
    }

?>