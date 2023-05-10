<?php
    include_once($_SERVER['DOCUMENT_ROOT'].'/DSS_LaCuponera/config.php'); 
    include_once(PLUGIN_PATH);
    include_once(CONTROLLER_PATH.'OfertasController.php');

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

    //$controller = new OfertasController();
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../view/css/detalles-style.css">
    <link rel="stylesheet" href="../view/css/root-style.css" crossorigin="anoymous">
    <link rel="stylesheet" href="../view/css/normalize.css" crossorigin="anoymous">
    <link rel="stylesheet" href="../view/css/menu-style.css" crossorigin="anoymous">
    <link rel="stylesheet" href="https://kit.fontawesome.com/b5142e7f7e.css" crossorigin="anoymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
    <title>Document</title>
        
</head>
<body>
    <?=menu()?>
    <div class='detallecupon-div'>
        <?php
        $cupon = $instancia->verCupon();
        // var_dump($cupon);  

            echo "
                    <div class='detallecupon-tarjeta'>
                    <h1>".$cupon->getTitulo()."</h1>
                    <h2>Codigo: ".$cupon->getCodOferta()."</h2>
                    <h3>Precio Regular: $".$cupon->getPrecioRegular()."</h3>
                    <h3>Precio Oferta: $".$cupon->getPrecioOferta()."</h3>
                    <p>Fecha de inicio: ".$cupon->getInicioOferta()."</p>
                    <p>Fin de Oferta: ".$cupon->getFinOferta()."</p>
                    <p>Fecha limite: ".$cupon->getFechaLimiteCupon()."</p>
                    <p>Cantidad Limite: ".$cupon->getCantidadLimiteCupon()."</p>
                    <p>Descripcion: ".$cupon->getDecripcion()."</p>
                    <p>Estado: ".$cupon->getEstado()."</p>
                    <p>Codigo de Empresa: ".$cupon->getCodEmpresa()."</p>
                    <br>
                    <a href='controller/handler.php' name='accion' value='regresar' class='button-a'>Regresar</a>
                    </div>";
    
        ?>
    </div>
    <?= footer() ?>
</body>
</html>