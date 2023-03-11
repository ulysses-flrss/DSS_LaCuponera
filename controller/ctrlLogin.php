<?php
    include_once($_SERVER['DOCUMENT_ROOT'].'/DSS_LaCuponera/config.php');
    

    $correo = isset($_POST['correo'])?$_POST['correo']:"";
    $password = isset($_POST['password'])?$_POST['password']:"";
    $accion = isset($_REQUEST['accion'])?$_REQUEST['accion']:"";

    if ($accion == "") {
        include_once(VIEW_PATH."viewLogin.php");
    }
    

?>