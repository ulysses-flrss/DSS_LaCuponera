<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/DSS_LaCuponera/config.php');
include_once(PLUGIN_PATH);
include_once(CONTROLLER_PATH . 'OfertasController.php');
error_reporting(E_ALL ^ E_NOTICE);
session_start();

if (isset($_SESSION['usuario'])) {
    $userActual = $_SESSION['usuario'];
    if ($userActual == null) {
        var_dump($_SESSION['usuario']);
        header("location:index.php");
    }
} else {
    //header("location:../index.php");
    header("location:index.php");
}

$accion = "";
$controller = new OfertasController();

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="view/css/ofertas-style.css">
    <title>Document</title>
    <?= head() ?>
</head>

<body>
    <?= menu() ?>
<?php 

?>
    <div class='cupones-div'>
        <?php

        $cupones = $controller->verCupones();
        foreach ($cupones as $cupon) {
            if(isset($_SESSION['usuario'])){
                $boton = "<a href='controller/handler.php?accion=verCupon&codigoCupon=" . $cupon->getcodOferta() . "' class='button-primary'>Ver detalles</a>";
            }else{
                $boton = "";
            }
            echo "
                <div class='cupones-tarjeta'>
                    <h2>".$cupon->getTitulo()."</h2>
                    <h3>Precio Regular: " . $cupon->getPrecioRegular() . "</h3>
                    <h3>Precio Oferta:" . $cupon->getPrecioOferta() . "</h3>
                    <p>Fecha de inicio: " . $cupon->getInicioOferta() . "</p>
                    <p>Fecha Limite: " . $cupon->getFechaLimiteCupon() . "</p>
                    <p>Cantidad Limite de Cupones: ". $cupon->getCantidadLimiteCupon() ."</p>
                    <br>
                    <p>". $boton ."</p>

                </div>";
        }
        ?>
    </div>
    <?= footer() ?>
</body>

</html>