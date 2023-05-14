<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/DSS_LaCuponera/public/config.php');
include_once(PLUGIN_PATH);
include_once(CONTROLLER_PATH . 'OfertasController.php');
error_reporting(E_ALL ^ E_NOTICE);
session_start();

// if (isset($_SESSION['usuario'])) {
//     $userActual = $_SESSION['usuario'];
//     if ($userActual == null) {
//         var_dump($_SESSION['usuario']);
//         header("location:index.php");
//     }
// } else {
//     //header("location:../index.php");
//     header("location:index.php");
// }
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

    <form action="<?php CONTROLLER_PATH . 'OfertasController.php' ?>" method="post">
        <input type="text" placeholder="Producto a buscar..." class="search-box" name="termino" id="termino">
        <button type="submit" name="accion_oferta" id="termino" value="buscar">Buscar</button>
    </form>
<?php 

?>
    <div class='cupones-div'>
        <?php
        foreach ($ofertas as $oferta) {
            echo "
                <div class='cupon-tarjeta'>
                    <h2>".$oferta->getTitulo()."</h2>
                    <h3>Precio Regular: " . $oferta->getPrecioRegular() . "</h3>
                    <h3>Precio Oferta:" . $oferta->getPrecioOferta() . "</h3>
                    <p>Fecha de inicio: " . $oferta->getInicioOferta() . "</p>
                    <p>Fecha Limite: " . $oferta->getFechaLimiteCupon() . "</p>
                    <p>Cantidad Limite de Cupones: ". $oferta->getCantidadLimiteCupon() ."</p>
                    <br>
                    <p><a href='controller/OfertasController.php?accion_oferta=verCupon&codigoCupon=" . $oferta->getcodOferta() . "' class='button-primary'>Ver detalles</a></p>
                </div>";
        }
        ?>
    </div>
    <?= footer() ?>
</body>

</html>