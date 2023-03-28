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
    <link rel="stylesheet" href="view/css/ofertas-style.css">
    <title>Document</title>
    <?= head() ?>
</head>
<body>
    <?= menu() ?>
    <?php

    $cupones = $controller->verCupones();

    foreach ($cupones as $cupon) {

        // Cuando definas el nombre de las clases en las etiquetas usa comillas simples ''
        echo "<div>
            <h1>".$cupon->getTitulo()."</h1>
            <p></p>
        </div>";
    }
    ?>
    <?= footer() ?>
</body>
</html>