<?php
session_start();
use UsuarioController as GlobalUsuarioController;

use function PHPSTORM_META\map;

include_once($_SERVER['DOCUMENT_ROOT'] . '/DSS_LaCuponera/public/config.php');

require_once(MODEL_PATH . 'validaciones.php');

$accion = isset($_REQUEST['accion'])?$_REQUEST['accion']:'';

switch($accion) {
    case '': case 'loginView':
        require_once(VIEW_PATH.'viewLogin.php');
        break;
    
    case 'registerView':
        require_once(VIEW_PATH.'viewRegister.php');
        break;

    case 'guestView':
        require_once(VIEW_PATH.'viewOfertas.php');
        break;


    case 'register':
        register();
        break;

    case 'login':
        login();
        break;

    case 'logout':
        logout();
        break;

    
}   

function login() {
    require_once(MODEL_PATH . 'UsuarioModel.php');

    $usuario = new Usuario;

    $errores = "";
    $num_errores = 0;
    $correo = isset($_POST['correo'])?$_POST['correo']:'';
    $password = isset($_POST['password'])?$_POST['password']:'';
    $valCorreo = Validacion::isCorreo($correo);

    if ($correo == '' || $password == '') {
        $errores .= "<p>Ningun campo puede quedar vacio</p>";
        require_once(VIEW_PATH.'viewLogin.php');
        return $errores;
    }

    if($valCorreo == "OK"){
        $usuario->setCorreo($correo);
    } else {
        $errores .= "<p>$valCorreo</p>";
        require_once(VIEW_PATH.'viewLogin.php');
        // var_dump($valCorreo);
        return $errores;
    }

    $hashed = $usuario->getHashedPassword($correo);
    // var_dump($hashed);
    if ($hashed == false) {
        $errores .= "<p>El correo no está asociado a ninguna cuenta</p>";
        require_once(VIEW_PATH.'viewLogin.php');
        return $errores;
    } else {
        $usuario->setPassword($hashed['password']);
        if (password_verify($password, $hashed['password'])) {
            $usuarioActual = $usuario->getUsuario($usuario->getCorreo(), $usuario->getPassword());
            $_SESSION['usuario'] = $usuarioActual;
            require_once(VIEW_PATH.'viewOfertas.php');
        } else {
            $errores .= "<p>Usuario o Contraseña incorrectas</p>";
            require_once(VIEW_PATH.'viewLogin.php');
            return $errores;
        }
    }
}


function register() {
    require_once(MODEL_PATH . 'UsuarioModel.php');
    require_once(MODEL_PATH . 'validaciones.php');

    $errores = null;
    $num_errores = 0;
    $usuario = new Usuario();
    $correo = isset($_POST['correo']) ? $_POST['correo'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $passwordConf = isset($_POST['passwordConfirm']) ? $_POST['passwordConfirm'] : '';
    $dui = isset($_POST['dui']) ? $_POST['dui'] : '';
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $apellido = isset($_POST['apellido']) ? $_POST['apellido'] : '';
    $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : '';
    $codEmpresa = isset($_POST['codEmpresa']) ? $_POST['codEmpresa'] : '';
    $codRol = isset($_POST['codRol']) ? $_POST['codRol'] : '';
    
    $valCorreo = Validacion::isCorreo($correo);
    $valDui = Validacion::isDui($dui);
    $valTelefono = Validacion::isTelefono($telefono);


        if ($correo == "" || $password == "" || $dui == "" || $nombre == "" || $apellido == "" || $telefono == "") {
            $num_errores++;
            $errores .= "<p>Ningun campo puede quedar vacio</p>";
        }

        if ($dui != "" && $valDui == "OK") {
            $usuario->setDui($dui);
        } else {
            $num_errores++;
            $errores .= "<p>$valDui</p>";
        }

        if ($telefono != "" && $valTelefono == "OK") {
            $usuario->setTelefono($telefono);
        } else {
            $num_errores++;
            $errores .= "<p>$valTelefono</p>";
        }

        if ($correo != "" && $valCorreo == "OK") {
            $usuario->setCorreo($correo);
        } else {
            $num_errores++;
            $errores .= "<p>$valCorreo</p>";
        }

        if ($password == $passwordConf) {
            $usuario->setPassword(password_hash($password, PASSWORD_BCRYPT));
        } else {
            $num_errores++;
            $errores .= "<p>Las contraseñas ingresadas son diferentes</p>";
        }
    
        $usuario->setNombres($nombre);
        $usuario->setApellidos($apellido);
        $usuario->setCodRol($codRol);
        $usuario->setCodEmpresa($codEmpresa);

    

    if ($num_errores > 0) {
        require_once(VIEW_PATH.'viewRegister.php');
        return $errores;
    }

    try {
        $result = $usuario->validarRegistro(
            null,
            $usuario->getCorreo(),
            $usuario->getPassword(),
            $usuario->getDui(),
            $usuario->getNombres(),
            $usuario->getApellidos(),
            $usuario->getTelefono(),
            null,
            $usuario->getCodRol()
        );
    } catch (Exception $e) {
        echo "
            <script>
                alert(" . $e->getMessage() . ")
            </script>
        ";
    }


    if ($result == "OK") {
    //    Redireccion a Pagina Index
        require_once(VIEW_PATH . 'viewLogin.php');
    } else {
    //    Mostrar mensaje de error de autentificación   
        require_once(VIEW_PATH . 'viewRegister.php');
    }
}

function logout() {
    $_SESSION['usuario'] = null;
    session_unset();
    session_destroy();
    header('location: index.php');
}

