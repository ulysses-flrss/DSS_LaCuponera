<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/DSS_LaCuponera/config.php');
function head() {
    return <<<EOD
        <link rel="stylesheet" href="view/css/root-style.css" crossorigin="anoymous">
        <link rel="stylesheet" href="view/css/normalize.css" crossorigin="anoymous">
        <link rel="stylesheet" href="view/css/menu.css" crossorigin="anoymous">
        <link rel="stylesheet" href="https://kit.fontawesome.com/b5142e7f7e.css" crossorigin="anoymous">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="sweetalert2.min.js"></script>
        <link rel="stylesheet" href="sweetalert2.min.css">
        EOD;
}

function menu() {
    return <<<EOD
        <nav>
            
        </nav>
    EOD;
}

function footer () {
    
}

?>
