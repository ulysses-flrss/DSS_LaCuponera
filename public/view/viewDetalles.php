<?php
    include_once($_SERVER['DOCUMENT_ROOT'].'/DSS_LaCuponera/public/config.php'); 
    include_once(PLUGIN_PATH);
    include_once(CONTROLLER_PATH.'OfertasController.php');
    $relativePath = "/DSS_LaCuponera/public";
    error_reporting(E_ALL ^ E_NOTICE);
    session_start();

    // if(isset($_SESSION['usuario'])){
    //     $userActual = $_SESSION['usuario'];
    //     if ($userActual == null) {
    //         var_dump($_SESSION['usuario']);
    //         header("location:index.php");
    //     }
    // } else {
    //     header("location:../index.php");
    // }

    //$controller = new OfertasController();
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=$relativePath?>/view/css/detalles-style.css"> 
    <title>  <?=$oferta_selected->getCodOferta()?> </title>
    <?= head() ?>
</head>
<body>
    <?= menu() ?>
    <div class='detallecupones-div'>
        <?php

            echo "
                    <div class='detallecupon-tarjeta'>
                        <h1>".$oferta_selected->getTitulo()."</h1>
                        <h2>Codigo: ".$oferta_selected->getCodOferta()."</h2>
                        <h3>Precio Regular: $".$oferta_selected->getPrecioRegular()."</h3>
                        <h3>Precio Oferta: $".$oferta_selected->getPrecioOferta()."</h3>
                        <p>Fecha de inicio: ".$oferta_selected->getInicioOferta()."</p>
                        <p>Fin de Oferta: ".$oferta_selected->getFinOferta()."</p>
                        <p>Fecha limite: ".$oferta_selected->getFechaLimiteCupon()."</p>
                        <p>Cantidad Limite: ".$oferta_selected->getCantidadLimiteCupon()."</p>
                        <p>Descripcion: ".$oferta_selected->getDecripcion()."</p>
                        <p>Estado: ".$oferta_selected->getEstado()."</p>
                        <p>Codigo de Empresa: ".$oferta_selected->getCodEmpresa()."</p>
                        <br>
                        <a href='OfertasController.php?accion_oferta=regresar' name='accion' value='regresar' class='button-a'>Regresar</a>
                    </div>";
        ?>
    </div>
    <?= footer() ?>
</body>
</html>