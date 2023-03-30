<?php
    include_once($_SERVER['DOCUMENT_ROOT'].'/DSS_LaCuponera/config.php'); 
    include_once(PLUGIN_PATH);
    include_once(CONTROLLER_PATH.'OfertasController.php');

    $controller = new OfertasController();
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/detalles-style.css">
    <title>Document</title>
    <?= head() ?>
</head>
<body>
    <div class='detallecupon-div'>
        <?php
        $cupon = $controller->verCupon();

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
                    <a href='view/viewOfertas.php' class='button-a'>Regresar</a>
                    </div>";
    
        ?>
    </div>
    <?= footer() ?>
</body>
</html>