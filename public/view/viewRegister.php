<?php
    session_start();
    include_once($_SERVER['DOCUMENT_ROOT'] . '/DSS_LaCuponera/public/config.php');
    include_once(PLUGIN_PATH);
    include_once(CONTROLLER_PATH.'UsuarioController.php');
?>
<!--No molestes tan noche -->
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="view/css/register-style.css">
    <title>Registro</title>
    <?= head() ?>
</head>

<body>
    <main class="main-container">
        <img src="view/img/bg.jpeg" alt="">
        <div class="form-container">
        </div>

            <form action="<?php CONTROLLER_PATH . 'UsuarioController.php' ?>" method="POST">
                <h2> Crea tu cuenta </h2>

                <input type="hidden" name="codEmpresa" value="NULL">
                <input type="hidden" name="codRol" value="CLI">

                
                <div class="row error">
                    <?=isset($errores)?$errores:''?>
                </div>

                <div class="row">
                    <label for="" class="">DUI:</label>
                    <input class="" type="text" name="dui" id="" placeholder="12345678-9">
                </div>
                <div class="column">
                    <div class="row">
                        <label for="" class="">Nombres:</label>
                        <input class="" type="text" name="nombre" id="" placeholder="Carlos Alberto">
                    </div>
                    <div class="column error"></div>
                    <div class="row">
                        <label for="" class="">Apellidos:</label>
                        <input class="" type="text" name="apellido" id="" placeholder="Melendez Arevalo">
                    </div>
                </div>
                <div class="column">
                    <div class="row">
                        <label for="" class="">Teléfono:</label>
                        <input class="" type="text" name="telefono" id="" placeholder="7295-1065">
                    </div>
                    <div class="row">
                        <label for="" class="">Correo:</label>
                        <input class="" type="text" name="correo" id="" placeholder="correo@dominio.com">
                    </div>
                </div>
                <div class="column">
                    <div class="row">
                        <label for="" class="">Contraseña:</label>
                        <input class="" type="password" name="password" id="" placeholder="123456">
                    </div>
                    <div class="row">
                        <label for="" class="">Repita su contraseña:</label>
                        <input class="" type="password" name="passwordConfirm" id="" placeholder="123456">
                    </div>
                </div>
                <div class="third-row">
                    <button class="button-primary" type="submit" name="accion" value="register">Crear cuenta</button>
                    <button class="button-a" type="submit" name="accion" value="loginView">¿Tienes cuente? Inicia Sesión</button>
                </div>
            </form>
    </main>
    <?= footer() ?>
</body>

</html>