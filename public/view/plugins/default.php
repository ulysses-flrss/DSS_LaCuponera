<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/DSS_LaCuponera/public/config.php');
function head() {
    $relativePath = "/DSS_LaCuponera/public";
    $head = <<<EOD
        <link rel="stylesheet" href="$relativePath/view/css/root-style.css" crossorigin="anoymous">
        <link rel="stylesheet" href="$relativePath/view/css/normalize.css" crossorigin="anoymous">
        <link rel="stylesheet" href="$relativePath/view/css/menu-style.css" crossorigin="anoymous">
        <link rel="stylesheet" href="https://kit.fontawesome.com/b5142e7f7e.css" crossorigin="anoymous">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script> 
        <script src="sweetalert2.min.js"></script>
        <link rel="stylesheet" href="sweetalert2.min.css">
        EOD;

    return $head;
}

function menu() {
    $relativePath = "/DSS_LaCuponera/public";
    return <<<EOD
        <nav>
            <ul class="menu">
                <li><img src="$relativePath/view/img/usuario.jpeg"></li>
                <li><a href="UsuarioController.php?accion=logout">Cerrar sesion</a></li>
                <li><a href="#">Cupones</a></i>
                <li><a href="#">Rubros</a></i>
                <li><img src="$relativePath/view/img/logo-bg-remove.png"></li>
            </ul>
        </nav>
    EOD;
}

function footer () {
    
}

?>
