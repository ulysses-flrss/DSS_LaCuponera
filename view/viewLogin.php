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
    <link rel="stylesheet" href="view/css/login-style.css">
    <title>Document</title>
    <?= head() ?>
</head>
<body>
    <?= menu() ?>
    <main class="main-container">
        <img src="view/img/bg.jpeg" alt="">
        <form action="<?php CONTROLLER_PATH . 'UsuarioController.php' ?>" method="POST">
            <h1>La Cuponera</h1>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ratione, asperiores fugit odio nulla nihil laboriosam minima alias beatae ad, aliquam natus voluptatum doloribus consequuntur aut harum laborum rerum dignissimos ipsum.</p>
            <div class="row">
                <label for="" class="">Correo:</label>
                <input class="" type="text" name="correo" id="" placeholder="micorreo@dominio.com">
            </div>
    
            <div class="row">
                <label for="">Contraseña:</label>
                <input class="four columns" type="password" name="password" id="" placeholder="123456">
            </div>
    
            <div class="third-row">
                <button class="button-primary" type="submit" name="accion" value="login">Iniciar Sesión</button>
                <button href="viewRegister.php" class="button-a" type="submit" name="redireccion" value="register">No tengo cuenta</button>
            </div>
        </form>
    </main>
    <?= footer() ?>
</body>
</html>