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
    <link rel="stylesheet" href="css/index-style.css">
    <title>Document</title>
    <?= head() ?>
</head>
<body>
    <?= menu() ?>
    <?= CONTROLLER_PATH . 'UsuarioController.php' ?>
    <form action="<?php CONTROLLER_PATH . 'UsuarioController.php' ?>" method="POST" class="">
        <div>
            <label for="">Correo:</label>
            <input type="text" name="correo" id="">
        </div>

        <div>
            <label for="">Password:</label>
            <input type="password" name="password" id="">
        </div>

        <div>
            <input class="button-primary" type="submit" value="Iniciar Sesión">
        </div>
    </form>
    <?= footer() ?>
</body>
</html>