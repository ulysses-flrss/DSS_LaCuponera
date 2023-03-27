<?php
    include_once($_SERVER['DOCUMENT_ROOT'].'/DSS_LaCuponera/config.php'); 
    include_once(PLUGIN_PATH);
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login-style.css">
    <title>Document</title>
    <?= head() ?>
</head>
<body>
    <?= menu() ?>
    <?= CONTROLLER_PATH . 'UsuarioController.php' ?>
    <h1>Hola</h1>
    <?= footer() ?>
</body>
</html>