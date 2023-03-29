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
                    <h2>".$cupon[0]->getTitulo()."</h2>
                    <h2>Codigo: ".$cupon[0]->getCodOferta()."</h2>
                    <h3>Precio Regular: ".$cupon[0]->getPrecioRegular()."</h3>
                    <h3>Precio Oferta:".$cupon[0]->getPrecioOferta()."</h3>
                    <p>Fecha de inicio: ".$cupon[0]->getInicioOferta()."</p>
                    <p>Fin de Oferta: ".$cupon[0]->getFinOferta()."</p>
                    <p>Fecha limite: ".$cupon[0]->getFechaLimiteCupon()."</p>
                    <p>Cantidad Limite: ".$cupon[0]->getCantidadLimiteCupon()."</p>
                    <p>Descripcion: ".$cupon[0]->getDecripcion()."</p>
                    <p>Estado: ".$cupon[0]->getEstado()."</p>
                    <p>Codigo de Empresa: ".$cupon[0]->getCodEmpresa()."</p>
                    <br>
                    <a href='view/viewOfertas.php' class='button-a'>Regresar</a>
                    </div>";
    
        ?>
    </div>
    <?= footer() ?>
</body>
</html>