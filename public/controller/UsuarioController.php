<?php
session_start();
use UsuarioController as GlobalUsuarioController;

use function PHPSTORM_META\map;

// Incluyendo archivo que facilita rutas
include_once($_SERVER['DOCUMENT_ROOT'] . '/DSS_LaCuponera/public/config.php');

// Incluyando archivo de validaciones 
require_once(MODEL_PATH . 'validaciones.php');

// Obteniendo la acción del usuario
$accion = isset($_REQUEST['accion'])?$_REQUEST['accion']:'';

switch($accion) {
    case '': case 'loginView': // Caso cuando entra por primera vez a la pagina o cuando le da "Ya tengo cuenta"
        require_once(VIEW_PATH.'viewLogin.php'); // Mostrar el Login
        break;
    
    case 'registerView': //  Caso cuando da click en "No tengo cuenta"
        require_once(VIEW_PATH.'viewRegister.php'); // Mostrar el registro de cliente
        break;

    case 'guestView': // Caso cuando da click "Entrar como invitado"
        require_once(VIEW_PATH.'viewOfertas.php'); // Mostrar ofertas
        break;


    case 'register': // Caso cuando le da click a "Registrarse" en "viewRegister.php"
        register(); // Metodo de registro
        break;

    case 'login': // Caso cuando le da click a "Iniciar Sesión" en "viewLogin.php"
        login(); // Metodo de inicio de sesión
        break;

    case 'logout': // Caso cuando le da click en "Cerrar Sesión"
        logout(); // Metodo de cierre de sesión
        break;

    
}   

function login() {
    require_once(MODEL_PATH . 'UsuarioModel.php'); // Importar el Modelo del Usuario

    $usuario = new Usuario; // Nueva insatncia de Usuario

    

    // Definiendo variables
    $correo = isset($_POST['correo'])?$_POST['correo']:'';
    $password = isset($_POST['password'])?$_POST['password']:'';
    
    // Gestión de errores
    $errores = ""; // Cadena que va tener todos los mensajes de error
    $num_errores = 0;
    $valCorreo = Validacion::isCorreo($correo); // Validando Correo
    
    // IF, si el 'correo' o 'password' están vacias
    if ($correo == '' || $password == '') { 
        $errores .= "<p>Ningun campo puede quedar vacio</p>"; // Concatenar a la cadena el mensaje de error
        require_once(VIEW_PATH.'viewLogin.php'); // Mostrar el login
        return $errores; // Retornas los mensaje de error
    }

    // IF, si el correo es valido
    if($valCorreo == "OK"){
        $usuario->setCorreo($correo); 
    } else {
        $errores .= "<p>$valCorreo</p>"; // Concatenar a la cadena el mensaje de error (definido en el mensaje de validaciones)
        require_once(VIEW_PATH.'viewLogin.php'); // Mostrar Login
        return $errores; // Retornar los mensajes de error
    }

    // Este codigo se ejecuta si el 'correo' y 'password' no están vacios y son validos

    $hashed = $usuario->getHashedPassword($correo); // Metodo que obtiene la contraseña Hasheada de la Base de Datos
    // IF, si no encuentra ninguna contraseña
    if ($hashed == false) {
        $errores .= "<p>El correo no está asociado a ninguna cuenta</p>"; // Concatenar a la cadena el mensaje de error
        require_once(VIEW_PATH.'viewLogin.php'); // Mostrar Login
        return $errores; // Retornar mensajes de error
    } else {
        // Se ejecuta si hay una contraseña asociada
        $usuario->setPassword($hashed['password']);
        if (password_verify($password, $hashed['password'])) { // Verifica si la contraseña que el usuario ingreso es igual a la contraseña hasheada
            $usuarioActual = $usuario->getUsuario($usuario->getCorreo(), $usuario->getPassword()); // Guarda en $usuarioActual TODA la información del usuario
            $_SESSION['usuario'] = $usuarioActual; // Guarda en una variable de sesión el objeto con la información del Usuario
            require_once(VIEW_PATH.'viewOfertas.php'); // Muestra las ofertas
        } else {
            $errores .= "<p>Usuario o Contraseña incorrectas</p>"; // Concatenar a la cadena el mensaje de error
            require_once(VIEW_PATH.'viewLogin.php'); // Mostrar el login
            return $errores; // Retornar mensajes de error
        }
    }
}


function register() {
    require_once(MODEL_PATH . 'UsuarioModel.php'); // Importar 
    require_once(MODEL_PATH . 'validaciones.php'); // Importar 

    $usuario = new Usuario(); // Instancia de Usuario

    // Definiendo campos del formulario
    $correo = isset($_POST['correo']) ? $_POST['correo'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $passwordConf = isset($_POST['passwordConfirm']) ? $_POST['passwordConfirm'] : '';
    $dui = isset($_POST['dui']) ? $_POST['dui'] : '';
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $apellido = isset($_POST['apellido']) ? $_POST['apellido'] : '';
    $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : '';
    $codEmpresa = isset($_POST['codEmpresa']) ? $_POST['codEmpresa'] : '';
    $codRol = isset($_POST['codRol']) ? $_POST['codRol'] : '';
    
    // Gestion de errores
    $errores = null;
    $num_errores = 0;
    $valCorreo = Validacion::isCorreo($correo);
    $valDui = Validacion::isDui($dui);
    $valTelefono = Validacion::isTelefono($telefono);

        // IF si alguno de los campos está vacio
        if ($correo == "" || $password == "" || $dui == "" || $nombre == "" || $apellido == "" || $telefono == "") {
            $num_errores++;
            $errores .= "<p>Ningun campo puede quedar vacio</p>";
        }

        // IF si DUI es valido
        if ($dui != "" && $valDui == "OK") {
            $usuario->setDui($dui);
        } else {
            $num_errores++;
            $errores .= "<p>$valDui</p>";
        }

        // IF si TELEFONO es valido
        if ($telefono != "" && $valTelefono == "OK") {
            $usuario->setTelefono($telefono);
        } else {
            $num_errores++;
            $errores .= "<p>$valTelefono</p>";
        }

        // IF si CORREO es valido
        if ($correo != "" && $valCorreo == "OK") {
            $usuario->setCorreo($correo);
        } else {
            $num_errores++;
            $errores .= "<p>$valCorreo</p>";
        }

        // IF para verificar si la contraseña se escribió correctamente en el campo de confirmación
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

