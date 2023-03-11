<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/DSS_LaCuponera/config.php');
function head() {
    return <<<EOD
        <link rel="stylesheet" href=" <?php CSS_PATH ?>.'root.css' " crossorigin="anonymous">
        <link rel="stylesheet" href=" <?php CSS_PATH ?>.'menu.css' " crossorigin="anonymous">
        <link rel="stylesheet" href=" <?php CSS_PATH ?>.'normalize.css' " crossorigin="anonymous">
        <link rel="stylesheet" href="https://kit.fontawesome.com/b5142e7f7e.css" crossorigin="anoymous">

        EOD;
}

function menu() {

}

function footer () {

}

?>