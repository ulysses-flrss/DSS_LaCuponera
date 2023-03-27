<?php 
    $url = $_SERVER['REQUEST_URI'];
    $url = explode($url, '/');
    include_once($_SERVER['DOCUMENT_ROOT'].'/DSS_LaCuponera/config.php');
    include_once(CONTROLLER_PATH."UsuarioController.php");
    $controller = new UsuarioController();
?>